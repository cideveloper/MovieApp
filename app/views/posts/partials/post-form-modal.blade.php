<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      {{ Form::open(['route' => ['posts.store']]) }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Add Post</h4>
        </div>
        <div class="modal-body">
            @include('layouts.partials.errors')
            <div class="form-group">
              {{ Form::textarea('post', '', ['class' => 'form-control', 'placeholder' => 'Add Post.........']) }}
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit Post</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      {{ Form::close() }}
    </div>
  </div>
</div>