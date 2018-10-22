@extends("layouts.main")

@section("content")

<a href="/goods/add" class="btn btn-info">添加</a>
<table class="table table-hover" >
    <tr>
        <th>id</th>
        <th>名称</th>
        <th>操作</th>
    </tr>
    @foreach($goods as $goods)

    <tr>
        <td>{{$goods->id}}</td>
        <td>{{$goods->name}}</td>
        <td>
            <a href="{{route("goods.edit",$goods->id)}}" class="btn btn-success">编辑</a>
            <a href="{{route("goods.del",$goods->id)}}" class="btn btn-danger">删除</a>
        </td>
    </tr>
        @endforeach

</table>
    {{--{{$bokes->links()}}--}}
@endsection