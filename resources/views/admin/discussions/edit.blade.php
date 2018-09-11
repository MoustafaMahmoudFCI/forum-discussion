@extends('admin.layouts.layout')

@section('content')
@if(count($errors ) > 0)
  @foreach($errors->all() as $error)
    <div class="alert alert-danger">  {{ $error }}   </div>
  @endforeach
@endif
<div class="card">
    <div class="card-header bg-light"><h3 class="text-center">Edit : {{ $d->title }}</h3></div>
    <div class="card-body">
      <form class="" action="{{ route('discussion.update', ['id'=>$d->id]) }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" value="{{ $d->title }}">
        </div>

        <div class="form-group">
          <label for="question">Ask a question </label>
          <textarea class="form-control" name="question" rows="8" cols="80">{{ $d->content }}</textarea>
        </div>
        <div class="form-group text-center">
          <input type="submit" class="btn btn-info" name="" value="Update discussion">
        </div>
      </form>
    </div>
</div>

@endsection
