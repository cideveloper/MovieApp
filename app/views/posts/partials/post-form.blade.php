{{ Form::open(['route' => ['posts.store']]) }}
  @include('layouts.partials.errors')
  <div class="form-group">
    {{ Form::textarea('post', '', ['class' => 'form-control', 'placeholder' => 'Add Post.........']) }}
  </div>
  <button type="submit" class="btn btn-danger">Submit Post</button>
{{ Form::close() }}