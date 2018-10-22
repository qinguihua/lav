<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    //获取所有数据
    public function index(){
        $goods=Goods::all();
        return view("goods.index",compact("goods"));
    }

    //添加
    public function add(Request $request){

        //判断提交方式
        if($request->isMethod("post")){
            //验证，如果没有通过验证，就返回添加页面
            $this->validate($request,[
                "name"=>"required",
            ]);

            //接收数据
            $data=$request->post();
            //数据入库
            if(Goods::create($data)){
                //跳转列表
                return redirect("/goods/index");
            }

        }else{

            //显示视图
            return view("goods.add");
        }
    }


    //修改
    public function edit(Request $request,$id){
        //通过id找对象
        $goods=Goods::find($id);
        //判断提交方式
        if($request->isMethod("post")){

            //接收数据
            $data=$request->post();
            //数据入库
            if($goods->update($data)){
                //跳转列表
                return redirect("/goods/index");
            }

        }else{

            //显示视图
            return view("goods.edit",compact("goods"));
        }
    }


    //删除
    public function del($id){

        //通过id找到对象
        $goods=Goods::find($id);

        if($goods->delete()){
            //跳转
            return redirect("/goods/index");
        }

    }



}
