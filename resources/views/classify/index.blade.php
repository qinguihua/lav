@extends("layouts.main")

@section("content")

<a href="/classify/add" class="btn btn-info">添加</a>
<table class="table table-hover" >
    <tr>
        <th>id</th>
        <th>名称</th>
        <th>操作</th>
    </tr>
    @foreach($classifys as $classify)

    <tr>
        <td>{{$classify->id}}</td>
        <td>{{$classify->name}}</td>
        <td>
            <a href="{{route("classify.edit",$classify->id)}}" class="btn btn-success">编辑</a>
            <a href="{{route("classify.del",$classify->id)}}" class="btn btn-danger">删除</a>
        </td>
    </tr>
        @endforeach

</table>
    {{--{{$bokes->links()}}--}}
@endsection