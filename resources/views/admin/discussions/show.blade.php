@extends('admin.layouts.layout')

@section('content')
@foreach($errors->all() as $error)
  <div class="alert alert-danger">
      {{ $error }}
  </div>
@endforeach
  <div class="discussion">
      <div class="card border-info">
          <div class="card-header">
            <img src="{{ asset($d->user->avatar) }}" width="60px" height="60px" alt="{{ $d->slug }}">
            <span>{{ $d->user->name }}</span>
            <b>( {{ $d->user->points }} Ps)</b>
            <span> ,  {{ $d->created_at->diffForHumans() }}</span>

            @if($d->isHasBestAnswer())
              <a class="btn btn-warning btn-sm pull-right" href="">Closed </a>
            @else
              <a class="btn btn-info btn-sm pull-right" href="">Open </a>
              @if($d->is_being_watched_by_auth_user())
                <a class="btn btn-outline-warning btn-sm pull-right" style="margin-right:5px" href="{{ route('discussion.stop_watch',['id'=>$d->id]) }}"><i class="fa fa-eye"></i> UnWatch </a>
              @else
                <a class="btn btn-outline-info btn-sm pull-right" style="margin-right:5px" href="{{ route('discussion.watch',['id'=>$d->id]) }}"><i class="fa fa-eye"></i> Watch </a>
              @endif
            @endif
           </div>

          <div class="card-body ">
            <h5 class="card-title text-center">{!! $d->title !!}</h5><hr>
            <p class="card-text text-center">{!! $d->content !!}</p>

            @if($best_answer)
            <hr class="best-answer-hr">
            <h3 class="best-answer">the best answer</h3>
                  <!-- start best answer -->
                    <div class="card border-teal">
                        <div class="card-header bg-teal text-white ">
                          <img src="{{ asset($best_answer->user->avatar) }}" width="60px" height="60px" alt="{{ $best_answer->user->name }}">
                          <span>{{ $best_answer->user->name }}</span>
                          <b>, ( {{ $best_answer->user->points }} Ps)</b>
                          <a class="pull-right ">  {{ $best_answer->created_at->diffForHumans() }}</a>
                         </div>

                        <div class="card-body text-center">
                          <p class="card-text">{!! $best_answer->content !!}</p>
                        </div>
                        <div class="card-footer text-muted">
                          @if($best_answer->is_liked_by_auth_user())
                            <a href="{{ route('reply.unlike' , ['id'=>$best_answer->id ]) }}" class="btn btn-warning btn-xs "  >
                               UnLike <span class="badge  badge-light">{{ $best_answer->likes->count() }}</span>
                             </a>
                          @else
                            <a href="{{ route('reply.like' , ['id'=>$best_answer->id ]) }}" class="btn btn-info btn-xs "  >
                               Like <span class="badge badge-light">{{ $best_answer->likes->count() }}</span>
                             </a>
                          @endif
                        </div>
                    </div>

                  <!-- end best answer -->
            @endif
          </div>
          <div class="card-footer text-muted">
            {{ $d->replies->count() }} Replies
            @if($d->user->id == Auth::id())
              @if(!$d->isHasBestAnswer())
                <a href="{{ route('discussion.edit', ['id'=>$d->id]) }}" class="btn btn-outline-danger btn-sm pull-right" style="margin-right:5px;"> edit</a>
              @endif
            @endif
          </div>
      </div>

      @foreach($d->replies as $r )
        <div class="card border-info">
            <div class="card-header">
              <img src="{{ asset($r->user->avatar) }}" width="60px" height="60px" alt="{{ $r->user->name }}">
              <span>{{ $r->user->name }}</span>
              <span>( {{ $r->user->points }} Ps)</span>
              @if(!$best_answer)
                @if(Auth::id() == $d->user->id )
                <a href="{{ route('discussion.best.answer' ,['id'=>$r->id]) }}" class="btn btn-outline-success btn-sm pull-right">Mark as the best answer</a>
                @endif
              @endif
             </div>

            <div class="card-body text-center">
              <p class="card-text">{{ $r->content }}</p>
            </div>
            <div class="card-footer text-muted">
              @if($r->is_liked_by_auth_user())
                <a href="{{ route('reply.unlike' , ['id'=>$r->id ]) }}" class="btn btn-warning btn-xs "  >
                   UnLike <span class="badge  badge-light">{{ $r->likes->count() }}</span>
                 </a>
              @else
                <a href="{{ route('reply.like' , ['id'=>$r->id ]) }}" class="btn btn-info btn-xs "  >
                   Like <span class="badge badge-light">{{ $r->likes->count() }}</span>
                 </a>
              @endif
              <a class="pull-right text-muted" >{{ $r->created_at->diffForHumans() }}</a>
            </div>
        </div>
      @endforeach

      @if(!$d->isHasBestAnswer())
      <div class="card border-warning">
          <div class="card-header">  Leave a reply ... </div>
          <div class="card-body text-center">
            <form class="" action="{{ route('discussion.reply' , ['id'=>$d->id]) }}" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                <textarea class="form-control" name="reply" rows="8" cols="80"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-warning pull-right" value="Leave Reply">
              </div>
            </form>
          </div>
      </div>
  </div>
  @endif
@endsection
