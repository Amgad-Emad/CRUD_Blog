@extends('layouts.app')
@section('title')
    CreateUser
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
    <form style="width: 70%; margin: auto;" method="POST" action="{{route('user.store')}}">
        @csrf
        <div class="mb-3">
            <label class="form-label">name</label>
            <input name="name" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">email</label>
            <textarea name="email" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">password</label>
            <input name="password" class="form-control" rows="3"></input>
        </div>
        <button  class="btn btn-success">Submit</button>
    </form>
@endsection
