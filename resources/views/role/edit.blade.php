@extends('welcome')

@section('title')
    Update Role
@endsection

@section('content')

    <div class="card card-info" style="height: auto; width: 1000px; margin-left: 50px;margin-top: 20px">

        <!-- Card Header-->
        <div class="card-header row">
            <h1 class="card-title text-center col-8" style="margin-left: 130px">Update Course</h1>

        </div>

        <!-- Success Msg-->
        <h3 class="text-center text-success"> {{Session::get('message')}}</h3>

        <!-- Card Body-->
        <form action="{{route('role.update',$role->id)}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            @method("PATCH")
            <div class="card-body">

                <div class="form-group ml-5 row">
                    <label class="col-sm-2 control-label">Role Name</label>
                    <div class="col-sm-10">
                        <input value="{{$role->name}}" type="text" name="name" class="form-control"/>
                        <span class="text-danger"> {{$errors->has('name') ? $errors->first('name'):''}} </span>

                    </div>
                </div>

            </div>

            <!-- Card Footer-->
            <div class="card-footer">
                <button type="submit" class="btn btn-info" style="margin-left: 380px">Update User Info</button>
            </div>
            <a href="{{route('role.index')}}" class="btn"
               style="margin-left: 435px;background-color: #841b0f; color: #eaf3ce">Return</a>


        </form>

    </div>

@endsection
