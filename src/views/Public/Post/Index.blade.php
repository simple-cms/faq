@extends('core::Public/Base')

@section('content')
<div class="container">
  <div class="row">
    @foreach ($posts as $post)
    <div class="col-md-12">
      <a href='{{ route(config('post.postURL') .'.show', $post->slug) }}' title='{{ $post->title }}'><h2>{{ $post->title }}</h2></a>
      <p>{{ $post->excerpt }}</p>
    </div>
    @endforeach
  </div>
</div>
@stop