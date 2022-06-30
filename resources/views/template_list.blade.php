@extends('layouts.app')
@section('content')
@section('title', 'Template Listing')
<div class="well well-lg">
<h1>Listing Templates</h1>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
  <p><a class="btn btn-primary btn-lg" href="{{ url('/create-new-template') }}" role="button">Add New Template</a></p>
</div>



  <!-- Table -->
  <div class="col-sm-6">
  <table class="table table-responsive-lg">
        <tr>
            <th>Template ID</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
        @foreach ($templates as $template)
            <tr>
               <td>{{$template->id}}</td>
               <td>{{$template->title}}</td>
               <td><a class="btn btn-primary btn-sm" href="{{ url('/edit-template', $template->id) }}" >Edit</a> | <a class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
        @endforeach
    </table>
    @if(count($templates) == 0)
    <tr>
       <td colspan="3">No Records Found</td>
    </tr>
    @endif
    {!! $templates->links() !!}
  </div>
 
    




@endsection