@extends('common.layouts')

@section('content')
   @include('common.validator')
   <!-- 自定义内容区域 -->
   <div class="panel panel-default">
       <div class="panel-heading">学生详情</div>

       <table class="table table-bordered table-striped table-hover">
           <tbody>
           <tr>
               <td width="50%">ID</td>
               <td>{{$client->id}}</td>
           </tr>
           <tr>
               <td>姓名</td>
               <td>{{$client->name($client->name)}}</td>
           </tr>
           <tr>
               <td>年龄</td>
               <td>{{$client->age}}</td>
           </tr>
           <tr>
               <td>性别</td>
               <td>{{$client->sex($client->sex)}}</td>
           </tr>
           <tr>
               <td>添加日期</td>
               <td>{{date('Y年m月d日 H:i:s',$client->created_at)}}</td>
           </tr>
           <tr>
               <td>最后修改</td>
               <td>{{date('Y年m月d日 H:i:s',$client->updated_at)}}</td>
           </tr>
           </tbody>
       </table>
   </div>
@stop