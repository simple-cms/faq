@extends('core::Public/Base')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>{{ $post->title }}</h2>
      <p><small>{{ $post->category !== null ? '<i class="fa fa-archive"></i> '. $post->category->title .'.' : '' }} <i class="fa fa-clock-o"></i> {{ $post->created_at->format('jS F Y') }}</small></p>
      <blockquote>{{ $post->excerpt }}</blockquote>
      {!! $post->content !!}
      <hr />
    </div>
  </div>
</div>
@stop