@extends("layouts.main")

@section("content")

    <div>

            <a href="/commodity/add" class="btn btn-info">添加</a>

            <form class="navbar-form navbar-right" >
                <div class="form-group">
                    <select name="goods_id" class="form-control">
                        <option value="">请选择分类</option>
                        @foreach($results as $result)
                        <option value="{{$result->id}}">{{$result->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2">价格</label>
                    <input type="text" class="form-control" id="exampleInputName2" placeholder="最高价" name="maxPrice">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail2">-</label>
                    <input type="text" class="form-control" id="exampleInputEmail2" placeholder="最低价" name="minPrice">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail2" placeholder="请输入关键字" name="keyword">
                    <button type="submit" class="btn btn-default">搜索</button>
                </div>
            </form>

    </div>

<table class="table table-hover" >
    <tr>
        <th>id</th>
        <th>商品名称</th>
        <th>商品分类</th>
        <th>商品价格</th>
        <th>是否上架</th>
        <th>商品详情</th>
        <th>商品图片</th>
        <th>浏览次数</th>
        <th>操作</th>
    </tr>

    @foreach($commoditys as $commodity)
    <tr>
        <td>{{$commodity->id}}</td>
        <td>{{$commodity->title}}</td>
        <td>{{$commodity->goods->name}}</td>
        <td>{{$commodity->price}}</td>
        <td>{{$commodity->status}}</td>
        <td>{{$commodity->details}}</td>
        <td><img src="/{{$commodity->img}}" alt="" width="100px"></td>
        <td>{{$commodity->num}}</td>
        <td>
            <a href="{{route("commodity.check",$commodity->id)}}" class="btn btn-success">查看</a>
            <a href="{{route("commodity.edit",$commodity->id)}}" class="btn btn-success">编辑</a>
            <a href="{{route("commodity.del",$commodity->id)}}" class="btn btn-danger">删除</a>
        </td>
    </tr>
    @endforeach

</table>

@endsection