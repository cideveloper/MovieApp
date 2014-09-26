@extends('layouts.full')

@section('sidebar')
  @parent

@stop

@section('content')
  <div class="row">
    <div class="col-sm-8">
      <p>This is my body content.</p>
    </div>
    <div class="col-sm-4">
      @if ($currentUser)

        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias ab a enim, minus aperiam, vel tempora provident. Eaque numquam repudiandae similique, obcaecati aspernatur, deserunt quas maiores voluptatibus tempora hic fuga!

      @endif
    </div>
  </div>

@stop