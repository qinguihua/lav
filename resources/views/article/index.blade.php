@extends("layouts.main")

@section("content")

<a href="/article/add" class="btn btn-info">添加</a>
<table class="table table-hover" >
    <tr>
        <th>id</th>
        <th>标题</th>
        <th>作者</th>
        <th>内容</th>
        <th>分类</th>
        <th>操作</th>
    </tr>
    @foreach($articles as $article)

    <tr>
        <td>{{$article->id}}</td>
        <td>{{$article->title}}</td>
        <td>{{$article->author}}</td>
        <td>{{$article->content}}</td>
        <td>{{$article->classify->name}}</td>
        <td>
            <a href="{{route("article.edit",$article->id)}}" class="btn btn-success">编辑</a>
            <a href="{{route("article.del",$article->id)}}" class="btn btn-danger">删除</a>
        </td>
    </tr>
        @endforeach

</table>
    {{--{{$bokes->links()}}--}}
@endsection