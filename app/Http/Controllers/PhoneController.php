<?php

namespace App\Http\Controllers;

use App\Phone;
use App\User;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $phones = Phone::latest()->paginate(5);

        return view('phone.index', compact('phones'));
    }


    public function create()
    {
        $users = User::all();

        return view('phone.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required|unique:phones',
            'user_id' => 'required',
        ]);


        Phone::create($request->all());

        return redirect()->route('phone.create')
            ->with(['message' => 'Phone Info Saved Successfully']);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $users = User::all();

        $phone = Phone::with('user')->find($id);

        return view('phone.edit',compact('phone','users'));
    }


    public function update(Request $request, $id)
    {
        $phone = Phone::find($id);

        $this->validate($request, [
            'phone' => 'required|unique:phones,phone,'.$phone->id,
        ]);

        $phone->phone = $request->phone;
        $phone->user_id = $request->user_id;

        $phone->save();


        return redirect()->route('phone.index')
            ->with(['message' => 'Phone Info Updated Successfully']);
    }


    public function destroy($id)
    {
        $phone = Phone::findOrFail($id);

        $phone->delete();

        return redirect()->route('phone.index')
            ->with(['message' => 'Phone Info Deleted Successfully']);
    }
}
