@extends('core::Public/Base')

@section('content')
  @foreach ($categories as $category)
  <div class="row">
    <div class="span12">
      <a href='{{ route('blog.show', $category->slug) }}' title='{{ $category->title }}'><h2>{{ $category->title }}</h2></a>
      <p><small>Posted
        on {{ $category->created_at }}
        @if ($category->updated_at != '0000-00-00 00:00:00')
        (last updated at {{ $category->updated_at }})
        @endif
      </small></p>
      <p>{{ $category->excerpt }}</p>
    </div>
  </div>
  <hr />
  @endforeach

@stop