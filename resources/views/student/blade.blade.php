{{--继承父模板--}}
@extends('layouts')

{{--重写父模板--}}
@section('header')
    重写头部
@stop

{{--在模板中声明的yield不能继承父模板的内容--}}
@section('content')
    <p>我是内容，只能重写，不能继承</p>
    <!--1.模板中输出变量，两个花括号即可-->
    <p>{{$name}}</p>
    <!--2.模板中使用php代码-->
    <p>{{time()}}</p>
    <p>{{date('Y-m-d H:i:s',time())}}</p>
    <p>{{in_array($name,$arr)?'true':'false'}}</p>
    <p>{{var_dump($arr)}}</p>
    <p>{{isset($name)?$name:'default'}}</p>
    <p>{{$name1 or 'default'}}</p>  {{--短语法，相当于上面的用法--}}
    <!--3.原样输出，加@就不会被编译-->
    <p>@{{isset($name)?$name:'default'}}</p>
    <!--4.模板中的注释-->
    {{--这就是模板中的注释，在浏览器中无法查看--}}
    <!--这种是html注释，在浏览器中可以查看到-->
    <!--5.引入子视图include-->
    <p>@include('student/common1')</p>
    <p>@include('student/common2',['msg'=>'我可以传值给子模板'])</p>
@stop

{{--重写父模板--}}
@section('footer')
    @parent
    重写并继承底部
@stop

