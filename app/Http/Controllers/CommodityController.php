<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommodityController extends Controller
{
    //获取所有数据
    public function index(Request $request){

//        $commoditys=Commodity::all();
        $query=Commodity::orderBy("id");

//        接收数据
        $cateId=$request->get("goods_id");
        $keyword=$request->get("keyword");
        $maxPrice=$request->get("maxPrice");
        $minPrice=$request->get("minPrice");



        if ($keyword!==null){

            $query->where("title","like","%{$keyword}%");
        }

        if ($cateId!==null){
            $query->where("goods_id",$cateId);
        }

        if ($maxPrice!=0 && $minPrice!=0){
            $query->where("price",">=","$minPrice");
            $query->where("price","<=","$maxPrice");

        }

        $commoditys=$query->paginate(10);

        $results=Goods::all();

        //显示视图并传递数据
        return view("commodity.index",compact("commoditys","results"));
    }


    //添加
    public function add(Request $request){
        if($request->isMethod("post")){

            //验证，如果没有通过验证，就返回添加页面
            $this->validate($request,[
                "title"=>"required",
                "goods_id"=>"required",
                "price"=>"required",
                "details"=>"required",
                "status"=>"required",
            ]);

            //接收数据
            $data=$request->post();
            //上传图片
            $data['img']=$request->file("img")->store("images","image");
            //将数据入库
            if(Commodity::create($data)){
                //跳转
                return redirect("/commodity/index");
            }

        }else{

            $results=Goods::all();
            //显示视图并传递数据
            return view("commodity.add",compact("results"));

        }
    }


    //修改
    public function edit(Request $request,$id){
        //通过id找到对象
        $commodity=Commodity::find($id);

        if($request->isMethod("post")){

            //接收数据
            $data=$request->post();

            if($request->file("img")!==null){

                $data['img']=$request->file("img")->store("images","image");
            }else{
                $data['img']=$commodity->img;
            }

            //将数据入库
            if($commodity->update($data)){
                //跳转
                return redirect("/commodity/index");
            }

        }else{

            $results=Goods::all();
            //显示视图并传递数据
            return view("commodity.edit",compact("results","commodity"));

        }
    }


    //删除
    public function del($id){

        $commodity=Commodity::find($id);
        $img=$commodity["img"];
        if($commodity->delete()){
            @unlink($img);
            //跳转
            return redirect("/commodity/index");
        }

    }

    //查看
    public function check($id){
        //dd($id);
        DB::table("commodities")->where('id',$id)->increment('num',1);
        //跳转
        return redirect("/commodity/index");

    }



}
