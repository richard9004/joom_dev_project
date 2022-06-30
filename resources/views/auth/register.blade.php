@extends('layouts.app')
@section('content')
@section('title', 'Register')

<div class="row">
    <div class="col-sm-6">
    <h1>Register</h1>

<form method="post" action="{{ route('register') }}">
    @csrf
  <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control p_input" value="{{ old('name') }}">
    @if ($errors->has('name'))
    <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
  </div>
  <div class="form-group">
    <label>Email </label>
    <input type="email" name="email" class="form-control p_input" value="{{ old('email') }}">
    @if ($errors->has('email'))
    <span class="text-danger">{{ $errors->first('email') }}</span>
    @endif
  </div>
  <div class="form-group">
    <label>Password </label>
    <input type="password" name="password" class="form-control p_input">
    @if ($errors->has('password'))
    <span class="text-danger">{{ $errors->first('password') }}</span>
    @endif
  </div>
 

  <div>
    <button type="submit" class="btn btn-primary enter-btn">Register</button>
  </div>

  <p class="sign-up">Don't have an Account?<a href="{{ route('register') }}"> Sign Up</a></p>
</form>
    </div>
</div>


@endsection