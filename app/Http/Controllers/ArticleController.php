<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Classify;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //获取所有数据
    public function index(Request $request){

        $articles=Article::all();
        //显示视图
        return view("article.index",compact("articles"));

    }

    //添加
    public function add(Request $request){
        if($request->isMethod("post")){

            //验证，如果没有通过验证，就返回添加页面
            $this->validate($request,[
                "title"=>"required",
                "author"=>"required",
                "content"=>"required",
                "classify_id"=>"required",
            ]);

            //接收数据
            $data=$request->post();
            //将数据入库
            if(Article::create($data)){
                //跳转
                return redirect("/article/index");
            }

        }else{

            $results=Classify::all();
            //显示视图并传递数据
            return view("article.add",compact("results"));

        }
    }


    //修改
    public function edit(Request $request,$id){

        //通过id找到对象
        $article=Article::find($id);

        if($request->isMethod("post")){

            //接收数据
            $data=$request->post();
            //将数据入库
            if($article->update($data)){
                //跳转
                return redirect("/article/index");
            }

        }else{

            $results=Classify::all();
            //显示视图并传递数据
            return view("article.edit",compact("article","results"));

        }
    }


    //删除
    public function del($id){

        $article=Article::find($id);

        if($article->delete()){
            //跳转
            return redirect("/article/index");
        }

    }


}
