@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 100vh;">
    <form action="{{ route('user.login') }}" class="col-md-6 border p-4" method="POST">
        @csrf
        <div class="form-group">
            <label for="name" class="col-form-label-lg">Your Name</label>
            <input class="form-control" id="name" name="name" type="text" placeholder="Name">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email" class="col-form-label-lg">Your Email</label>
            <input class="form-control" id="email" name="email" type="email" placeholder="Email">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password" class="col-form-label-lg">Password</label>
            <input class="form-control" id="password" name="password" type="password" placeholder="Password">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mt-4">
            <button class="btn btn-lg btn-primary" type="submit" name="sendMe">Registration</button>
        </div>
    </form>
</div>
@endsection
