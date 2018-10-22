<?php

namespace App\Http\Controllers;

use App\Models\Classify;
use Illuminate\Http\Request;

class ClassifyController extends Controller
{
    //得到所有数据
    public function index(){
        $classifys=Classify::all();
        //显示视图并传递数据
        return view("classify.index",compact("classifys"));
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
            if(Classify::create($data)){
                //跳转列表
                return redirect("/classify/index");
            }

        }else{

            //显示视图
            return view("classify.add");
        }
    }


    //修改
    public function edit(Request $request,$id){
        //通过id找对象
        $classify=Classify::find($id);

        //判断提交方式
        if($request->isMethod("post")){

            //接收数据
            $data=$request->post();
            //数据入库
            if($classify->update($data)){
                //跳转列表
                return redirect("/classify/index");
            }

        }else{

            //显示视图
            return view("classify.edit",compact("classify"));
        }
    }

    //删除
    public function del($id){

        //通过id找到对象
        $classify=Classify::find($id);

        if($classify->delete()){
            //跳转
            return redirect("/classify/index");
        }

    }



}
