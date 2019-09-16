@extends('welcome')

@section('title')
    Manage Post
@endsection

@section('content')


    <div class="card card-info mt-5" style="height: auto; width: 1000px; margin-left: 60px">

        <div class="card-header row">
            <h1 class="card-title text-center col-9" style="margin-left: 100px">Manage Post</h1>

            <a class="btn btn-success" href="{{route('post.create')}}" style="margin-top:-5px">Add Post</a>
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
                    <th>Title</th>
                    <th>Body</th>
                    <th>Action</th>

                </tr>

                @php($i=1)
                @foreach($posts as $post)


                    <tr>
                        <td>{{$i++}}</td>

                        @if($post->user)
                            <td>{{$post->user->name}}</td>
                        @else
                            <td>Not Available</td>
                        @endif

                        <td>{{$post->title}}</td>

                        <td> {{str_limit($post->body,20)}}</td>



                        <td>

                            <div class="row">

                                <div class="col-sm-8" style="margin-top: 3px">
                                    <a href="{{route('post.edit',$post->id)}}"
                                       class="fa fa-edit btn btn-info"></a>
                                </div>

                                <div class="col-sm-4" style="margin-left: -10px">
                                    <form action="{{route('post.destroy',$post->id)}}"
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
                {{ $posts->links() }}
            </div>

            <div style="margin-left: 430px">

            </div>

        </div>


    </div>

@endsection
