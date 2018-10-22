@extends("layouts.main")
@section("content")

    <form action="" method="post">
        {{ csrf_field() }}

        名称:<input type="text" name="name">
             <input type="submit" value="添加">

    </form>


@endsection