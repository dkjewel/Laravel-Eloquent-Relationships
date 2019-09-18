@extends('welcome')

@section('title')
    Manage Tag
@endsection

@section('content')


    <div class="card card-info mt-5" style="height: auto; width: 1000px; margin-left: 60px">

        <div class="card-header row">
            <h1 class="card-title text-center col-9" style="margin-left: 100px">Manage Tag</h1>

            <a class="btn btn-success" href="{{route('tag.create')}}" style="margin-top:-5px">Add Tag</a>
        </div>


        <!-- Success Msg-->
        <h3 class="text-center text-success"> {{Session::get('message')}}</h3>


        <!-- Card Body-->
        <div class="card-body table-responsive p-0 text-center">
            <table class="table table-hover">
                <tbody>


                <tr>
                    <th>SL</th>
                    <th>Tag Name</th>
                    <th>Action</th>

                </tr>

                @php($i=1)
                @foreach($tags as $tag)


                    <tr>
                        <td>{{$i++}}</td>

                        <td>{{$tag->name}}</td>


                        <td>

                            <div class="row">

                                <div class="col-sm-8" style="margin-top: 3px">
                                    <a href="{{route('tag.edit',$tag->id)}}"
                                       class="fa fa-edit btn btn-info"></a>
                                </div>

                                <div class="col-sm-4" style="margin-left: -10px">
                                    <form action="{{route('tag.destroy',$tag->id)}}"
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
                {{ $tags->links() }}
            </div>

            <div style="margin-left: 430px">

            </div>

        </div>


    </div>

@endsection
