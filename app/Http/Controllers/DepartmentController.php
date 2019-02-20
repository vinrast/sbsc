<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    public function validator($request)
    {
      $request->validate([
          'name'        => 'required|unique:departments|max:191',
          'description' => 'nullable'
      ]);
    }

    public function index()
    {
        $departments = Department::paginate(30);

        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create', ['department' => new Department() ]);
    }

    public function store(Request $request)
    {
      $this->validator($request);

      Department::create([
        'name'        => ucwords(mb_strtolower( $request->name )),
        'description' => ucfirst(mb_strtolower( $request->description ))
      ]);

      return back()->with('message', "El departamento {$request->name} fue cargado correctamente");
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
        $department->update([
          'name'        => ucwords(mb_strtolower( $request->name )),
          'description' => ucfirst(mb_strtolower( $request->description ) )
        ]);

        return redirect()->route('departamentos')->with('message',"Departamento {$department->name} actualizado con exito");
    }

    public function destroy(Department $department)
    {
        //
    }
}
