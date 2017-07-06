@extends('common.layouts')

@section('content')
    @include('common.message')
    <!-- 自定义内容区域 -->
    <div class="panel panel-default">
        <div class="panel-heading">顾客列表</div>
        <table class="table table-striped table-hover table-responsive">
            <thead>
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>年龄</th>
                <th>性别</th>
                <th>添加时间</th>
                <th>更新时间</th>
                <th width="120">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <th scope="row">{{$client->id}}</th>
                    <td>{{$client->name($client->name)}}</td>
                    <td>{{$client->age}}</td>
                    <td>{{$client->sex($client->sex)}}</td>
                    <td>{{date('Y-m-d H:i:s',$client->created_at)}}</td>
                    <td>{{date('Y-m-d H:i:s',$client->updated_at)}}</td>
                    <td>
                        <a href="{{url('client/detail',['id'=>$client->id])}}">详情</a>
                        <a href="{{url('client/edit',['id'=>$client->id])}}">修改</a>
                        <a onclick="if(confirm('你确定要删除吗？') == false) return false" href="{{url('client/delete',['id'=>$client->id])}}">删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- 分页  -->
    <div>
        <div class="pull-right">
            {{$clients->render()}}
        </div>
    </div>
@stop