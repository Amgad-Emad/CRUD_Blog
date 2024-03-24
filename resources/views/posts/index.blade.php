@extends('layouts.app')
@section('title')
    Posts
@endsection
@section('content')
    <div class="mt-4">
        <div class="text-center">
            <a href="{{route('posts.create')}}" type="button" class="btn btn-success">Create Post</a>
            <a href="{{route('user.create')}}" type="button" class="btn btn-primary">Create User</a>
        </div>

        <table class="table mt-4 m-auto text-center" style="width: 80%">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Atcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>
                        <a href="{{route('posts.show',$post->id)}}" type="button" class="btn btn-info">View</a>
                        <a href="{{route('posts.edit',$post->id)}}" type="button" class="btn btn-primary">Edit</a>

                        <form style="display:inline;" action="{{route('posts.destroy',$post->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>

                        </form>
                    </td>
                </tr>
                @endforeach
                
                

            </tbody>
        </table>
    </div>
    @endsection

