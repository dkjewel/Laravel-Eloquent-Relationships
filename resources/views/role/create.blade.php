@extends('welcome')

@section('title')
    Add Role
@endsection

@section('content')

    <div class="card card-info" style="height: auto; width: 1000px; margin-left: 50px;margin-top: 20px">

        <!-- Card Header-->
        <div class="card-header row">
            <h1 class="card-title text-center col-8" style="margin-left: 130px">Add Role</h1>

            <a class="btn btn-success" href="{{route('role.index')}}" style="margin-top:-5px;margin-left: 31px">Manage
                Role</a>
        </div>

        <!-- Success Msg-->
        <h3 class="text-center text-success"> {{Session::get('message')}}</h3>

        <!-- Card Body-->
        <form action="{{route('role.store')}}" method="POST" class="form-horizontal" >
            {{ csrf_field() }}

            <div class="card-body">

                <div class="form-group ml-5 row">
                    <label class="col-sm-2 control-label">Role Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control"/>
                        <span class="text-danger"> {{$errors->has('name') ? $errors->first('name'):''}} </span>

                    </div>
                </div>

            </div>

            <!-- Card Footer-->
            <div class="card-footer">
                <button type="submit" class="btn btn-info" style="margin-left: 380px">Add Role Info</button>
            </div>

        </form>

    </div>

@endsection
