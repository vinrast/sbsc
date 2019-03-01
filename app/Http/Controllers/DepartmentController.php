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
        return view('departments.index', compact('departments'))->with(['departments' => Department::orderBy('id','DES')->paginate(10)]);
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
        'description' => $request->description ? ucfirst(mb_strtolower( $request->description )): null
      ]);

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
        
        $department->update([
          'name'        => ucwords(mb_strtolower( $request->name )),
          'description' => $request->description ? ucfirst(mb_strtolower( $request->description )): null
        ]);

        return redirect()->route('departamentos')->with('message',"Departamento <strong>{$department->name}</strong> actualizado con exito");
    }

    public function destroy(Department $department)
    {
        $name = Department::findOrFail($department->id);
        $name->delete();

        return back()->with('message', "El departamento <strong>{$department->name}</strong> fue borrado correctamente");
    }
}
