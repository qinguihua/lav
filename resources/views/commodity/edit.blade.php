@extends("layouts.main")
@section("content")

    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        名称:<input type="text" name="title" value="{{$commodity->title}}"><br/>
        分类:
        <select name="goods_id">

            @foreach($results as $result)
                <option value="{{$result->id}}" <?php if ($result["id"]===$commodity["goods_id"]) echo 'selected=selected'?>>{{$result->name}}</option>
            @endforeach

        </select><br/>
        价格:<input type="text" name="price" value="{{$commodity->price}}"><br/>
        上架:<input type="radio" name="status" value="1" <?php if ($commodity->status==1) echo 'checked'?>>是
             <input type="radio" name="status" value="0" <?php if ($commodity->status==0) echo 'checked'?>>否<br/>
        详情:<input type="text" name="details" value="{{$commodity->details}}"><br/>
        <input type="file" id="inputPassword3" name="img" >

        <input type="submit" value="修改">

    </form>


@endsection