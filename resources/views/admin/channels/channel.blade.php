@extends('admin.layouts.layout')

@section('content')
  <div class="forum">
    @foreach($discussion as $d )
      <div class="card border-info">
          <div class="card-header">
            <img src="{{ asset($d->user->avatar) }}" width="60px" height="60px" alt="{{ $d->slug }}">
            <span>{{ $d->user->name }}</span>
            <span> , {{ $d->created_at->diffForHumans() }}</span>
            <a class="btn btn-secondary btn-sm pull-right" style="margin-left:5px;" href="{{ route('discussion.show',['slug'=>$d->slug]) }}">View </a>
            @if($d->isHasBestAnswer())
              <a class="btn btn-warning btn-sm pull-right" href="">Closed </a>
            @else
              <a class="btn btn-info btn-sm pull-right" href="">Open </a>
            @endif
           </div>

          <div class="card-body text-center">
            <h5 class="card-title">{{ $d->title }}</h5>
            <p class="card-text">{{ str_limit($d->content , 150) }}</p>
          </div>
          <div class="card-footer text-muted">
            {{ $d->replies->count() }} Replies
          </div>
      </div>
    @endforeach
    <div class="">
        {{ $discussion->links() }}
    </div>
  </div>
@endsection
