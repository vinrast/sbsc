<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\Audit;

class RoleController extends Controller
{
    use Audit;

    public $user_auth;

    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware(function ($request, $next) {
        $this->user_auth = Auth::user()->email;

        return $next($request);
      });

    }

    protected function getSpecialPermissionList()
    {
      $special = [
      (object)['name'   => 'Acceso Total',
               'value'  => 'all-access',
               'id'     =>  1
         ],
      (object)['name'   => 'Acceso Restringido',
                'value' => 'no-access',
                'id'    => 2
          ],
      ];

      return $special;
    }

    public function index()
    {
      return view('roles.index')->with(['roles' => Role::orderBy('id','DES')->paginate(10)]);
    }

    public function create()
    {

      return view('roles.create')->with(['permissions' => Permission::all(),
                                         'role'        => new Role,
                                         'specials'    => $this->getSpecialPermissionList()
                                        ]);
    }

    public function store(Request $request)
    {
      $request->validate([
          'name'        => 'required|unique:roles|max:191',
          'description' => 'nullable',
          'special'     => 'nullable',
          'permissions' => 'required'
      ],[
        'permissions.required' => 'Debe marcar al menos un permiso'
      ]);
      DB::transaction(function() use ($request) {
        $role = Role::create([
          'name'        => ucwords(mb_strtolower( $request->name )),
          'slug'        => mb_strtolower( $request->name ),
          'description' => $request->description ? ucfirst(mb_strtolower( $request->description )) : null ,
          'special'     => $request->special ? mb_strtolower($request->special) : null
        ]);

        $role->permissions()->attach($request->permissions);
        $this->creations(10, $this->user_auth, $role->name);
      });

      return back()->with('message', "El rol <strong> {$request->name} </strong> fue cargado correctamente");;
    }

    public function edit(Role $role)
    {
      return view('roles.edit')->with(['permissions' => Permission::all(),
                                         'role'      => $role,
                                         'specials'  => $this->getSpecialPermissionList()
                                      ]);
    }

    public function update(Request $request, Role $role)
    {
      $request->validate([
          'name' => [
            'required',
             Rule::unique('roles')->ignore($role->id),
            'max:191'
           ],
          'description' => 'nullable',
          'special'     => 'nullable',
          'permissions' => 'required'
      ],[
        'permissions.required' => 'Debe marcar al menos un permiso'
      ]);

      $role->update([
        'name'        => ucwords(mb_strtolower( $request->name )),
        'slug'        => mb_strtolower( $request->name ),
        'description' => $request->description ? ucfirst(mb_strtolower( $request->description )) : null ,
        'special'     => $request->special ? mb_strtolower($request->special) : null
      ]);

      $role->permissions()->sync($request->permissions);

      return redirect()->route('roles')->with('message',"Rol <strong>{$role->name}</strong> actualizado con exito");
    }

    public function destroy(Role $role)
    {
      DB::transaction(function() use ($role) {
        Role::destroy($role->id);
        $this->destroyed(10, $this->user_auth, $role->name);
      });
      return back()->with('message', "El rol <strong>{$role->name}</strong> fue borrado correctamente");
    }
}
