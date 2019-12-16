@extends('layouts.app')

@section('content')
  <!--Main layout-->
      {!! Form::model($article, ['method' => 'PUT', 'route' => ['article.update', $article->id], 'files' => true,]) !!}

   `` @include('article.form')
      
      {!! Form::submit(trans('Update'), ['class' => 'btn btn-warning']) !!}
      {!! Form::close() !!}

      @endsection