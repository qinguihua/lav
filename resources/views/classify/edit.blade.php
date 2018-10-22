@extends("layouts.main")
@section("content")

    <form action="" method="post">
        {{ csrf_field() }}

        名称:<input type="text" name="name" value="{{$classify->name}}">
        <input type="submit" value="修改">

    </form>


@endsection