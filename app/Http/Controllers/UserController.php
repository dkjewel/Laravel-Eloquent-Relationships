<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {

        $users = User::latest()->paginate(5);

        return view('user.index', compact('users'));

    }


    public function create()
    {
        return view('user.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users',
        ]);


        User::create($request->all());

        return redirect()->route('user.create')
            ->with(['message' => 'User Info Saved Successfully']);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit',compact('user'));
    }


    public function update(Request $request, $id)
    {

        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required|unique:users,name,'.$user->id,
        ]);

        $user->name = $request->name;
        $user->save();

        return redirect()->route('user.index')
            ->with(['message' => 'User Info Updated Successfully']);
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('user.index')
            ->with(['message' => 'User Info Deleted Successfully']);
    }
}
