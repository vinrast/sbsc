<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\Audit;

class DepartmentController extends Controller
{
  use Audit;

    public function validator($request)
    {
      $request->validate([
          'name'        => 'required|unique:departments|max:191',
          'description' => 'nullable'
      ]);
    }

    public function index()
    {
        return view('departments.index', compact('departments'))->with(['departments' => Department::orderBy('id','DES')->paginate(10)]);
    }

    public function create()
    {
      return view('departments.create', ['department' => new Department() ]);
    }

    public function store(Request $request)
    {
      $this->validator($request);
      DB::transaction(function() use ($request) {
          $register =  Department::create([
                          'name'        => ucwords(mb_strtolower( $request->name )),
                          'description' => $request->description ? ucfirst(mb_strtolower( $request->description )): null
                       ]);

          $this->creations(9, $register->name);
      });

      return back()->with('message', "El departamento <strong> {$request->name} </strong> fue cargado correctamente");
    }

    public function edit(Department $department)
    {
      return view('departments.edit', ['department' => $department ]);
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => [
              'required',
               Rule::unique('departments')->ignore($department->id),
              'max:191'
             ],
            'description' => 'nullable'
        ]);

        DB::transaction(function() use ($request, $department) {
          $department->update([
            'name'        => ucwords(mb_strtolower( $request->name )),
            'description' => $request->description ? ucfirst(mb_strtolower( $request->description )): null
          ]);

          if ($department->getChanges()) {
            $this->updates(9, $department->name, $department->getChanges());
          }
        });

        return redirect()->route('departamentos')->with('message',"Departamento <strong>{$department->name}</strong> actualizado con exito");
    }

    public function destroy(Department $department)
    {
        DB::transaction(function() use ($department) {
          $name = Department::findOrFail($department->id);
          $name->delete();
          $this->destroyed(9, $department->name);
        });

        return back()->with('message', "El departamento <strong>{$department->name}</strong> fue borrado correctamente");
    }
}
