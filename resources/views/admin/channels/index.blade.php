@extends('admin.layouts.layout')

@section('content')
@if(count($errors ) > 0)
  @foreach($errors->all() as $error)
    <div class="alert alert-danger">  {{ $error }}   </div>
  @endforeach
@endif
<div class="card card-default channel">
    <div class="card-heading"><h3 class="text-center">Channel List</h3></div>
    <div class="card-body">
      <table class="table table-striped text-center">
        <thead class="thead-green">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($channels as $channel)
          <tr>
            <th scope="row">{{  $channel->id }}</th>
            <td>{{ $channel->title }}</td>
            <td><a class="btn btn-info btn-sm" href=" {{ route('channels.edit',['id'=>$channel->id]) }} "> <i class="fa fa-pencil"></i> Edit</a></td>
            <td>
              <form class="" action="{{ route('channels.destroy', ['channels'=>$channel->id ]) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" class="btn btn-danger btn-sm"  name="button"> <i class="fa fa-trash"></i> Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection
