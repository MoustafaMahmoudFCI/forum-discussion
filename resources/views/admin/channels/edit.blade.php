@extends('admin.layouts.layout')

@section('content')
@if(count($errors ) > 0)
  @foreach($errors->all() as $error)
    <div class="alert alert-danger">  {{ $error }}   </div>
  @endforeach
@endif
<div class="card card-default channel">
    <div class="card-heading"><h3 class="text-center">Edit Channel</h3></div>
    <div class="card-body">
      <form action="{{ route('channels.update',['channel'=>$channel->id]) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Title </label>
          <input type="text" name="title" class="form-control" value="{{ $channel->title }}">
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-info" value="Update Channel">
        </div>
      </form>
    </div>
</div>

@endsection
