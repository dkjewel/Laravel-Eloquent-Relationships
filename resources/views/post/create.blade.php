@extends('welcome')

@section('title')
    Add Post
@endsection

@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
@endpush


@section('content')

    <div class="card card-info" style="height: auto; width: 1000px; margin-left: 50px;margin-top: 20px">

        <!-- Card Header-->
        <div class="card-header row">
            <h1 class="card-title text-center col-8" style="margin-left: 130px">Add Post</h1>

            <a class="btn btn-success" href="{{route('post.index')}}" style="margin-top:-5px;margin-left: 31px">Manage
                Post</a>
        </div>

        <!-- Success Msg-->
        <h3 class="text-center text-success"> {{Session::get('message')}}</h3>

        <!-- Card Body-->
        <form action="{{route('post.store')}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="card-body">

                <div class="form-group ml-5 row">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">

                        <select class="form-control" name="user_id">

                            <option value="">Select Your Name</option>

                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach

                        </select>
                        <span class="text-danger"> {{$errors->has('user_id') ? $errors->first('user_id'):''}} </span>

                    </div>
                </div>

                <div class="form-group ml-5 row">
                    <label class="col-sm-2 control-label">Tag Name</label>
                    <div class="col-sm-10">

                        <select class="form-control select2-multi" name="tags[]" multiple>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
{{--                        <span class="text-danger"> {{$errors->has('tag_id') ? $errors->first('tag_id'):''}} </span>--}}

                    </div>
                </div>

                <div class="form-group ml-5 row">
                    <label class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control"/>
                        <span class="text-danger"> {{$errors->has('title') ? $errors->first('title'):''}} </span>

                    </div>
                </div>

                <div class="form-group ml-5 row">
                    <label class="col-sm-2 control-label">Body</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="body"></textarea>
                        <span class="text-danger"> {{$errors->has('body') ? $errors->first('body'):''}} </span>

                    </div>
                </div>

            </div>

            <!-- Card Footer-->
            <div class="card-footer">
                <button type="submit" class="btn btn-info" style="margin-left: 380px">Add Post Info</button>
            </div>

        </form>

    </div>

@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>


    <script>
        $('.select2-multi').select2();
    </script>
@endpush
