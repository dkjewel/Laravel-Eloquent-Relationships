<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::latest()->paginate(5);

        return view('tag.index', compact('tags'));
    }


    public function create()
    {
        return view('tag.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:tags',
        ]);


        Tag::create($request->all());

        return redirect()->route('tag.create')
            ->with(['message' => 'Tag Info Saved Successfully']);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('tag.edit',compact('tag'));
    }



    public function update(Request $request, $id)
    {

        $tag = Tag::find($id);

        $this->validate($request, [
            'name' => 'required|unique:tags,name,'.$tag->id,
        ]);

        $tag->name = $request->name;
        $tag->save();

        return redirect()->route('tag.index')
            ->with(['message' => 'Tag Info Updated Successfully']);
    }


    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);

        $tag->delete();

        return redirect()->route('tag.index')
            ->with(['message' => 'Tag Info Deleted Successfully']);
    }
}
