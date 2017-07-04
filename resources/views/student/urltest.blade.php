{{--继承父模板--}}
@extends('layouts')

{{--重写父模板--}}
@section('header')
    重写头部
@stop

{{--在模板中声明的yield不能继承父模板的内容--}}
@section('content')
  <p><a href="{{url('student/urltest')}}">url()</a></p>
  <p><a href="{{action('StudentController@UrlTest')}}">action()</a></p>
  <p><a href="{{route('urltest')}}">route()</a></p>
@stop

{{--重写父模板--}}
@section('footer')
    @parent
    重写并继承底部
@stop

