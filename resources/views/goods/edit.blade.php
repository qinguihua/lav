@extends("layouts.main")
@section("content")

    <form action="" method="post">
        {{ csrf_field() }}

        名称:<input type="text" name="name" value="{{$goods->name}}">
        <input type="submit" value="修改">

    </form>


@endsection