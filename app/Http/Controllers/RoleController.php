<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {

        $roles = Role::latest()->paginate(5);

        return view('role.index',compact('roles'));
    }


    public function create()
    {
        return view('role.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles',
        ]);


        Role::create($request->all());

        return redirect()->route('role.create')
            ->with(['message' => 'Role Info Saved Successfully']);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $role = Role::find($id);

        return view('role.edit',compact('role'));
    }


    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        $this->validate($request, [
            'name' => 'required|unique:roles,name,'.$role->id,
        ]);

        $role->name = $request->name;
        $role->save();

        return redirect()->route('role.index')
            ->with(['message' => 'Role Info Updated Successfully']);
    }


    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        return redirect()->route('role.index')
            ->with(['message' => 'Role Info Deleted Successfully']);
    }
}
