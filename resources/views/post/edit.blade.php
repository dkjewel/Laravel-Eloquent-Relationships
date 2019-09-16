@extends('welcome')

@section('title')
    Update Post
@endsection

@section('content')

    <div class="card card-info" style="height: auto; width: 1000px; margin-left: 50px;margin-top: 20px">

        <!-- Card Header-->
        <div class="card-header row">
            <h1 class="card-title text-center col-8" style="margin-left: 130px">Update Post</h1>

        </div>

        <!-- Success Msg-->
        <h3 class="text-center text-success"> {{Session::get('message')}}</h3>

        <!-- Card Body-->
        <form action="{{route('post.update',$post->id)}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            @method("PATCH")
            <div class="card-body">


                <div class="form-group ml-5 row">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">

                        <select class="form-control" name="user_id">


                            @if($post->user)
                                <option value="{{$post->user->id}}">{{$post->user->name}}</option>
                            @endif

                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach

                        </select>
                        <span class="text-danger"> {{$errors->has('user_id') ? $errors->first('user_id'):''}} </span>

                    </div>
                </div>

                <div class="form-group ml-5 row">
                    <label class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input value="{{$post->title}}" type="text" name="title" class="form-control"/>
                        <span class="text-danger"> {{$errors->has('title') ? $errors->first('title'):''}} </span>

                    </div>
                </div>

                <div class="form-group ml-5 row">
                    <label class="col-sm-2 control-label">Body</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="body" >{{$post->body}}</textarea>
                        <span class="text-danger"> {{$errors->has('body') ? $errors->first('body'):''}} </span>

                    </div>
                </div>

            </div>

            <!-- Card Footer-->
            <div class="card-footer">
                <button type="submit" class="btn btn-info" style="margin-left: 380px">Update Post Info</button>
            </div>
            <a href="{{route('post.index')}}" class="btn"
               style="margin-left: 435px;background-color: #841b0f; color: #eaf3ce">Return</a>


        </form>

    </div>

@endsection
