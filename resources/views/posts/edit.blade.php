@extends('layouts.app')
@section('title')
    Edit
@endsection
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form style="width: 70%; margin: auto;" method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" type="text" value="{{ $post->title }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ $post->description }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Post Creator</label>
            <select name="postCreator" class="form-control">
            @foreach ($users as $user)
                <option @selected($post->user_id==$user->id) value="{{$user->id}}" >{{$user->name}}</option>
            @endforeach
                
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
@endsection
