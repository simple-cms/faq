@extends('core::Public/Base')

@section('content')
  <h2>{{ $category->title }}</h2>
  <p><small>Posted
    on {{ $category->created_at }}
    @if ($category->updated_at != '0000-00-00 00:00:00')
    (last updated at {{ $category->updated_at }})
    @endif
  </small></p>
  <blockquote>{{ $category->excerpt }}</blockquote>
  {{ $category->content }}
  <hr />
@stop