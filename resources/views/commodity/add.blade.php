@extends("layouts.main")
@section("content")

    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        名称:<input type="text" name="title"><br/>
        分类:
        <select name="goods_id">

            @foreach($results as $result)
            <option value="{{$result->id}}">{{$result->name}}</option>
             @endforeach

        </select><br/>
        价格:<input type="text" name="price"><br/>
        详情:<input type="text" name="details"><br/>

             <input type="file" id="inputPassword3" name="img" >

        上架:<input type="radio" name="status" value="1">是
             <input type="radio" name="status" value="0">否<br/>

        <input type="submit" value="添加">

    </form>


@endsection