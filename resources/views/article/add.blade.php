@extends("layouts.main")
@section("content")

    <form action="" method="post">
        {{ csrf_field() }}

        标题:<input type="text" name="title"><br/>
        作者:<input type="text" name="author"><br/>
        内容:<textarea name="content" id="" cols="30" rows="10"></textarea><br/>

        分类:
        <select name="classify_id">

            @foreach($results as $result)
            <option value="{{$result->id}}">{{$result->name}}</option>
             @endforeach

        </select><br/>

        <input type="submit" value="添加">

    </form>


@endsection