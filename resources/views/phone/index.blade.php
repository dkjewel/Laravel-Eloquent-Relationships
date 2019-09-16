@extends('welcome')

@section('title')
    Manage Phone
@endsection

@section('content')


    <div class="card card-info mt-5" style="height: auto; width: 1000px; margin-left: 60px">

        <div class="card-header row">
            <h1 class="card-title text-center col-9" style="margin-left: 100px">Manage Phone</h1>

            <a class="btn btn-success" href="{{route('phone.create')}}" style="margin-top:-5px">Add Phone</a>
        </div>


        <!-- Success Msg-->
        <h3 class="text-center text-success"> {{Session::get('message')}}</h3>


        <!-- Card Body-->
        <div class="card-body table-responsive p-0 text-center">
            <table class="table table-hover">
                <tbody>


                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Action</th>

                </tr>

                @php($i=1)
                @foreach($phones as $phone)


                    <tr>
                        <td>{{$i++}}</td>

                        @if($phone->user)
                            <td>{{$phone->user->name}}</td>
                        @else
                            <td>Not Available</td>
                        @endif

                        <td>{{$phone->phone}}</td>

                        <td>

                            <div class="row">

                                <div class="col-sm-8" style="margin-top: 3px">
                                    <a href="{{route('phone.edit',$phone->id)}}"
                                       class="fa fa-edit btn btn-info"></a>
                                </div>

                                <div class="col-sm-4" style="margin-left: -40px">
                                    <form action="{{route('phone.destroy',$phone->id)}}"
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
                {{ $phones->links() }}
            </div>

            <div style="margin-left: 430px">

            </div>

        </div>


    </div>

@endsection
