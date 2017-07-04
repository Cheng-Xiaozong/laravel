{{--if的使用--}}
@if($name=="王小二")
    我是王小二
    @elseif($name=="王二小")
    我是王二小
    @else
    我是谁？
@endif

<br/>

@if(in_array($name,$arr))
    在
    @else
    不在
@endif

<br/>
{{--unless 可以理解为if的取反--}}
@unless($name!='王小二')
    取反我才会执行，虽然我是王小二
@endunless
<br/>

{{--循环的使用--}}
@for($i=0;$i<5;$i++)
    <span>{{$i}}</span>
@endfor

@foreach($students as $student)
    <p>{{$student->name}} {{$student->age}} {{$student->updated_at}}</p>
@endforeach

{{--如果有数据则遍历出来，没有就执行下面的代码--}}
@forelse($nullarr as $nullar)
    {{$nullar}}
@empty
    我是空数组
@endforelse
