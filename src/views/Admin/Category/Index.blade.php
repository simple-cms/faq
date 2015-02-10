@extends('core::Admin/Base')

@section('content')
<aside class="right-side">
  <section class="content-header">
    <h1>
      {{ trans('blog::category.plural') }}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.dashboard') }}</a></li>
      <li><a href="{{ route(config('core.adminURL') .'.'. config('category.categoryURL') .'.index') }}">{{ trans('blog::category.plural') }}</a></li>
      <li class="active">{{ trans('blog::category.singular') }} {{ trans('core::core.list') }}</li>
    </ol>
  </section>

  <section class="content">

    @include('core::Admin/Partials/FlashMessages')

    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs pull-right">
            <li><a href="#help" data-toggle="tab">{{ trans('core::core.help') }}</a></li>
            <li class="active"><a href="#basic" data-toggle="tab">{{ trans('blog::category.plural') }}</a></li>
            <li class="pull-left header"><i class="fa fa-envelope"></i> {{ trans('blog::category.singular') }} {{ trans('core::core.list') }}</li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              {{ trans('core::core.actions') }} <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route(config('core.adminURL') .'.'. config('category.categoryURL') .'.create') }}"><i class="fa fa-pencil-square-o"></i> {{ trans('core::core.create') }} {{ trans('blog::category.singular') }}</a></li>
              </ul>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="basic">
            	<table id="catgories" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>{{ trans('core::core.title') }}</th>
                    <th>{{ trans('core::core.status') }}</th>
                    <th>{{ trans('core::core.updated') }}</th>
                    <th>{{ trans('core::core.actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                @if(count($categories))
                  @foreach($categories as $category)
                  <tr>
                    <td><a href="{{ route(config('core.adminURL') .'.'. config('category.categoryURL') .'.edit', [$category->id]) }}">{{ $category->title }}</a></td>
                    <td>!!{{ $category->status }}!!</td>
                    <td>{{ $category->updated_at->diffForHumans() }}</td>
                    <td>
                    {!! Form::open(['route' => [config('core.adminURL') .'.'. config('category.categoryURL') .'.destroy', $category->id], 'method' => 'delete']) !!}
                      <div class="btn-group">
                        <a href="{{ route(config('core.adminURL') .'.'. config('category.categoryURL') .'.edit', [$category->id]) }}" class="btn btn-info">{{ trans('core::core.edit') }}</a>
                        <a href="{{ route(config('category.categoryURL') .'.show', [$category->slug]) }}" class="btn btn-success" target="_blank">{{ trans('core::core.preview') }}</a>
                        {!! Form::submit(trans('core::core.destroy'), ['class' => 'btn btn-danger']) !!}
                      </div>
                    {!! Form::close() !!}
                    </td>
                  </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="4">{!! trans('core::core.missing', ['model' => trans('blog::category.plural'), 'link' => link_to_route(config('core.adminURL') .'.'. config('category.categoryURL') .'.create', 'click here')]) !!}</td>
                  </tr>
                @endif
                </tbody>
                <tfoot>
                  <tr>
                    <th>{{ trans('core::core.title') }}</th>
                    <th>{{ trans('core::core.status') }}</th>
                    <th>{{ trans('core::core.updated') }}</th>
                    <th>{{ trans('core::core.actions') }}</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="tab-pane" id="help">
              The European languages are members of the same family. Their separate existence is a myth.
              For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
              in their grammar, their pronunciation and their most common words. Everyone realizes why a
              new common language would be desirable: one could refuse to pay expensive translators. To
              achieve this, it would be necessary to have uniform grammar, pronunciation and more common
              words. If several languages coalesce, the grammar of the resulting language is more simple
              and regular than that of the individual languages.
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</aside>
@stop