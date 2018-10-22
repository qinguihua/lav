@extends("layouts.main")

@section("content")

 <a href="/user/zc" class="btn btn-info">添加</a>
 <table class="table table-hover">
    <tr>
        <th>id</th>
        <th>用户名</th>
        <th>密码</th>
        <th>图片</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->password}}</td>
        <td>
            <img src="/{{$user->img}}" alt="" width="100px">
        </td>
        <td>
            <a href="{{route("user.edit",$user->id)}}" class="btn btn-success">编辑</a>
            <a href="{{route("user.del",$user->id)}}" class="btn btn-danger">删除</a>
        </td>
    </tr>
    @endforeach
</table>

@endsection