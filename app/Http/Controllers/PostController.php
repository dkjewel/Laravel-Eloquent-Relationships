<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(5);

        return view('post.index', compact('posts'));
    }


    public function create()
    {
        $users = User::all();
        $tags = Tag::all();

        return view('post.create', compact('users', 'tags'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = new Post();

        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();

        $post->tags()->attach($request->tags);


//        Post::create($request->all());


        return redirect()->route('post.create')
            ->with(['message' => 'Post Info Saved Successfully']);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {

        $users = User::all();
        $tags = Tag::all();

        $post = Post::with('user','tags')->find($id);


        return view('post.edit', compact('post', 'users','tags'));
    }


    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $this->validate($request, [
            'user_id' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);

        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();

        $post->tags()->sync($request->tags);


        return redirect()->route('post.index')
            ->with(['message' => 'Post Info Updated Successfully']);
    }


    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->tags()->detach();
        
        $post->delete();

        return redirect()->route('post.index')
            ->with(['message' => 'Post Info Deleted Successfully']);
    }
}
