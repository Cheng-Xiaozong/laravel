<form class="form-horizontal" method="post" action="{{url('student/sv')}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="name">
    <button type="submit" class="btn btn-primary">提交</button>
</form>
@if (count($errors) > 0)
    {{dd($errors)}}
    <script>
        alert("{{$errors->first()}}");
    </script>
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif