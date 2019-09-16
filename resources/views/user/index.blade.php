@extends('welcome')

@section('title')
    Manage Course
@endsection

@section('content')


    <div class="card card-info mt-5" style="height: auto; width: 1000px; margin-left: 60px">

        <div class="card-header row">
            <h1 class="card-title text-center col-9" style="margin-left: 100px">Manage Course</h1>

            <a class="btn btn-success" href="{{route('user.create')}}" style="margin-top:-5px">Add Course</a>
        </div>


        <!-- Success Msg-->
        <h3 class="text-center text-success"> {{Session::get('message')}}</h3>


        <!-- Card Body-->
        <div class="card-body table-responsive p-0 text-center">
            <table class="table table-hover">
                <tbody>


                <tr>
                    <th>SL</th>
                    <th>User Name</th>
                    <th>User Post Count</th>
                    <th>User Phone</th>
                    <th>Action</th>

                </tr>

                @php($i=1)
                @foreach($users as $user)


                    <tr>
                        <td>{{$i++}}</td>


                        <td>{{$user->name}}</td>

                        @if($user->posts)
                            <td>{{$user->posts->count()}}</td>
                        @else
                            <td>Not Available</td>
                        @endif


                        @if($user->phone)
                            <td>{{$user->phone->phone}}</td>
                        @else
                            <td>Not Available</td>
                        @endif



                        <td>

                            <div class="row">

                                <div class="col-sm-8" style="margin-top: 3px">
                                    <a href="{{route('user.edit',$user->id)}}"
                                       class="fa fa-edit btn btn-info"></a>
                                </div>

                                <div class="col-sm-4" style="margin-left: -10px">
                                    <form action="{{route('user.destroy',$user->id)}}"
                                          method="post">
                                        {{ csrf_field() }}
                                        @method('DELETE')

                                        <button type="submit" class="fa fa-trash btn btn-danger"></button>

                                    </form>
                                </div>


                            </div>


                        </td>
                    </tr>

                @endforeach

                </tbody>

            </table>
            <div style="margin-left: 430px">
                {{ $users->links() }}
            </div>

            <div style="margin-left: 430px">

            </div>

        </div>


    </div>

@endsection
