<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Department;
use Caffeinated\Shinobi\Models\Role;
use App\Http\Traits\ImageManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Mail\NewUser;
use App\Mail\UpdateEmailUser;

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
      return view('users.create')->with(['departments' => Department::all() ,
                                         'roles' => Role::all(),
                                         'user' => new User,
                                         'show_PASS'=> 0]);
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

      Mail::to($user->email)->send(new NewUser($user, $password));

      return back()->with('message', "El usuario <strong> {$request->name} </strong> fue cargado correctamente");
    }

    public function show(User $user)
    {
        return view('users.show')->with(['user' => $user ]);
    }

    public function edit(User $user)
    {
      return view('users.edit')->with(['departments' => Department::all() ,
                                       'roles' => Role::all(),
                                       'user' => $user, 'show_PASS'=> 0]);
    }

    public function update(Request $request, User $user)
    {
        $this->validateUser($request, $user);


        if ($request->has('avatar')) {
          $this->deleteImage($user->avatar);
          $image = $this->uploadImage($request->file('avatar'));
          $user->avatar =$image;
        }

        if($request->email != $user->email){
          $password = str_random(8);
          $user->password = Hash::make($password);
          Mail::to($request->email)->send(new UpdateEmailUser($user, $password, $request->email));

          if ($user->id == $request->user()->id) {
            $request->session()->flush();
          }
        }

        $user->name  = ucwords(mb_strtolower( $request->name ));
        $user->email = mb_strtolower( $request->email );
        $user->department_id = $request->department_id;
        $user->save();

        $user->roles()->sync($request->role_id);


        return redirect()->route('usuarios')->with('message',"Usuario <strong>{$user->name}</strong> actualizado con exito");

    }

    public function destroy(User $user)
    {
      $this->deleteImage($user->avatar);
      $name = User::findOrFail($user->id);
      $name->delete();

      return back()->with('message', "El usuario <strong>{$user->name}</strong> fue borrado correctamente");
    }

    public function profile()
    {
      $user = Auth::user();
      return view('users.profile')->with(['departments' => Department::all() ,
                                          'roles' => Role::all(),
                                          'user' => $user ?? new User, 'show_PASS'=> 1]);
    }

    public function updateProfile(Request $request, User $user)
    {
      $this->validateUser($request, $user);

      if ($request->has('avatar')) {
        $this->deleteImage($user->avatar);
        $image = $this->uploadImage($request->file('avatar'));
        $user->avatar =$image;
      }

      if ($request->password) {
        $user->password = Hash::make($request->password);
      }

      $user->name  = ucwords(mb_strtolower( $request->name ));
      if ($request->has('department_id')) {
        $user->department_id = $request->department_id ;
      }

      if ($request->has('role_id')) {
        $user->roles()->sync($request->role_id);
      }

      if($request->email != $user->email){
        $password = str_random(8);
        $user->password = $request->password ? Hash::make($request->password): Hash::make($password);
        Mail::to($request->email)->send(new UpdateEmailUser($user,
                                                            $request->password ? $request->password: $password,
                                                            $request->email));
        $request->session()->flush();
      }
      $user->email = mb_strtolower( $request->email );
      $user->save();

      $route = back()->with('message', "El perfil fue actualizado correctamente");

      if (!$request->user()) {
        $route = redirect()->route('home');
      }
      return $route;
    }


    protected function validateUser(Request $request,User $user = null)
    {
      $request->validate([
        'name'          => 'required|max:191',
        'email'         => [
                             $user ? Rule::unique('users')->ignore($user->id) : Rule::unique('users'),
                             'required',
                             'max:191'
                           ],
        'department_id' => $request->has('department_id') ? 'required|integer': 'nullable',
        'role_id'       => $request->has('role_id') ? 'required|integer': 'nullable',
        'avatar'        => 'image|mimes:jpg,png,jpeg'
      ]);
    }
}
