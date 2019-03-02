<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Department;
use Caffeinated\Shinobi\Models\Role;
use App\Http\Traits\ImageManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUser;

class UserController extends Controller
{
  use ImageManager;

    public function index(Request $request)
    {
      if (!$request->has('search')) {
        return view('users.index')->with(['users'=> User::orderBy('id','DES')->paginate(10) ]);
      }
      $users = User::search($request->search)->paginate(10);
      $users->withPath("?search={$request->search}");
      return view('users.index')->with(['users'=> $users, 'search' => $request->search ]);
    }

    public function create()
    {
      return view('users.create')->with(['departments' => Department::all() ,'roles' => Role::all(), 'user' => new User, 'show_PASS'=> 0]);
    }

    public function store(Request $request)
    {
      $this->validateUser($request);

      if ($request->has('avatar')) {
        $image = $this->uploadImage($request->file('avatar'));
      }
      $password = str_random(8);
      $user = User::create([
        'name'          => ucwords(mb_strtolower( $request->name )),
        'email'         => mb_strtolower( $request->email ),
        'password'      => Hash::make($password),
        'department_id' => $request->department_id,
        'avatar'        => $request->has('avatar') ? $image : null
      ]);

      $user->roles()->attach($request->role_id);

      $this->sendMailCreateUser($user,$password);

      return back()->with('message', "El usuario <strong> {$request->name} </strong> fue cargado correctamente");
    }

    public function show(User $user)
    {
        return view('users.show')->with(['user' => $user ]);
    }

    public function edit(User $user)
    {
      return view('users.edit')->with(['departments' => Department::all() ,'roles' => Role::all(), 'user' => $user, 'show_PASS'=> 0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function sendMailCreateUser(User $user, $password)
    {
      Mail::to($user->email)->send(new NewUser($user, $password));
    }

    protected function validateUser(Request $request)
    {
      $request->validate([
        'name'          => 'required|max:191',
        'email'         => 'required|unique:users|max:191',
        'department_id' => 'required|integer',
        'role_id'       => 'required|integer',
        'avatar'        => 'image|mimes:jpeg,png,jpg'
      ]);
    }
}
