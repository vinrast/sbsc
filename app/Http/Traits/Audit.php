<?php

namespace App\Http\Traits;
use Illuminate\Support\Facades\Auth;
use App\Models\Permission;
use App\Models\Audit as ModelAudit;
use App\Models\Department;
use Caffeinated\Shinobi\Models\Role;

trait Audit
{
  public $user_auth;

  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware(function ($request, $next) {
      $this->user_auth = Auth::user()->email;

      return $next($request);
    });
  }

  public function creations($place, $register)
  {
    ModelAudit::create([
      'action_id' => 6,
      'place_id'  => $place,
      'user'      => $this->user_auth ,
      'register'  => $register
    ]);
  }

  public function updates($place, $register, $values)
  {
    $test = '';
    foreach ($values as $key => $value) {
      if ($key !== 'updated_at') {
        $test .= $key.": ".$value."<br>";
      }
    }


    ModelAudit::create([
      'action_id'      => 7,
      'place_id'       => $place,
      'user'           => $this->user_auth,
      'register'       => $register,
      'update_values'  => $test
    ]);
  }

  public function getPermisssionsUpdates($place, $register, $permissions)
  {
    $att = Permission::whereIn('id', $permissions['attached'])->get();
    $deta = Permission::whereIn('id', $permissions['detached'])->get();
    $attached = 'Permisos Agregados: ';
    foreach ($att as $at) {
      $attached .= $at->name."<br>";
    }

    $detached = 'Permisos Eliminados: ';
    foreach ($deta as $de) {
      $detached .= $de->name."<br>";
    }

    if (!empty($att) || !empty($deta)) {
      ModelAudit::create([
        'action_id'      => 7,
        'place_id'       => $place,
        'user'           => $this->user_auth,
        'register'       => $register,
        'update_values'  => $attached."<br>".$detached
      ]);
    }
  }

  public function destroyed($place, $register)
  {
    ModelAudit::create([
      'action_id'      => 8,
      'place_id'       => $place,
      'user'           => $this->user_auth,
      'register'       => $register
    ]);
  }

  public function updateUser($request, $user)
  {
    $inputs =[];

    if ($request->name != $user->name ) {
      $inputs['nombre'] = $request->name;
    }
    if ($request->email != $user->email ) {
      $inputs['email'] = $request->email;
    }
    if ($request->department_id != $user->department_id) {
      $inputs['departamento'] = Department::where('id', $request->department_id)->pluck('name')->first();
    }
    if ($request->role_id != $user->roles->first()->id) {
      $inputs['rol'] = Role::where('id', $request->role_id)->pluck('name')->first();
    }

    if (!empty($inputs)) {
      $test = '';
      foreach ($inputs as $key => $value) {
        $test .= $key.": ".$value."<br>";
      }

      ModelAudit::create([
        'action_id'      => 7,
        'place_id'       => 11,
        'user'           => $this->user_auth,
        'register'       => $user->email,
        'update_values'  => $test
      ]);
    }
  }

  public function updateIndicator($request, $indicator)
  {
    $inputs =[];

    if ($request->target != $indicator->target ) {
      $inputs['objetivo'] = $request->target;
    }
    if ($request->performance_threshold != $indicator->performance_threshold ) {
      $inputs['umbral'] = $request->performance_threshold;
    }

    if (!empty($inputs)) {
      $test = '';
      foreach ($inputs as $key => $value) {
        $test .= $key.": ".$value."<br>";
      }

      ModelAudit::create([
        'action_id'      => 7,
        'place_id'       => 12,
        'user'           => $this->user_auth,
        'register'       => $indicator->name,
        'update_values'  => $test
      ]);
    }
  }

  public function auditResults($query)
  {
    ModelAudit::create([
      'action_id'      => 7,
      'place_id'       => 13,
      'user'           => $this->user_auth,
      'register'       => $query->indicator->name." ({$query->date->format('m-Y')})",
      'update_values'  => "Resultado: ".$query->result_format
    ]);
  }
}
