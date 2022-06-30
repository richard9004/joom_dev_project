@extends('layouts.app')
@section('content')
@section('title', 'Create New Template')
<style>
    #email_template{
        white-space: pre-wrap;
    }
    </style>
<div class="row">
    <div class="col-sm-6">
    <h1>Create New Template</h1>

<form method="post" action="{{ route('save-template') }}">
    @csrf
  <div class="form-group">
    <label>Title </label>
    <input type="text" name="title" class="form-control p_input" value="{{ old('title') }}">
    @if ($errors->has('title'))
    <span class="text-danger">{{ $errors->first('title') }}</span>
    @endif
  </div>
  <div class="form-group">
    <label>Email Template</label>
    <span> ( Use Hash Tags, Will be replaced by Name Email and Phone number )</span><br/>
    <b>#name</b> <b> #email</b> <b> #phone_number</b>
    <textarea class="form-control" rows="10" id="email_template" name="email_template"></textarea>
    @if ($errors->has('email_template'))
    <span class="text-danger">{{ $errors->first('email_template') }}</span>
    @endif
  </div>
  <div>
    <button type="submit" class="btn btn-primary enter-btn">Save Template</button>
  </div>

</form>
    </div>
</div>


@endsection