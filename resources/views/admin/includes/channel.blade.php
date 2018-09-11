<!--========================== start create channel =============================== -->

<div class="modal fade" id="newChannel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" >Create New Channel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('channels.store') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Title </label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Add Channel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--========================== end create channel =============================== -->
