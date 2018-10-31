<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

//登录
    public function login(Request $request){
        if($request->isMethod("post")) {
            //验证
            $data = $this->validate($request, [
                "name" => "required",
                "password" => "required"
            ]);
            //验证账号和密码是否有误
            if (Auth::attempt(["name" => $request->post("name"), "password" => $request->post("password")])) {
                //登录成功
                return redirect()->intended(route("user.index")->with("success", "登录成功"));
            } else {
                //登录失败
                return redirect()->back()->withInput()->with("danger", "账号和密码错误");

            }
        }

        return view("user.login");
    }




    public function index(Request $request){

        $users=User::all();
        //显示视图并传递数据
        return view("user.index",compact("users"));
    }

    //注册
    public function zc(Request $request){

        //判断提交方式
        if($request->isMethod("post")){
            //验证
            $this->validate($request,[
                "name"=>"required|unique:users",
                "password"=>"required|min:6|onfirmed",
                "img"=>"required",
                "captcha"=>"required|captcha"],
                [
                    "captcha.required" => '验证码不能为空',
                    "captcha.captcha" => '验证码有误',
            ]);
            //接收数据
            $data=$request->post();
            //上传图片
            $data['img']=$request->file("img")->store("images","image");

//           dd($data);
            //添加


            User::create($data);
            //跳转
            return redirect("/user/index");

        }
        //显示视图
        return view("user.zc");
    }


    //修改
    public function edit(Request $request,$id){

        //通过id找到对象
        $user=User::find($id);

        //判断提交方式
        if($request->isMethod("post")){
            //验证
            $this->validate($request,[
                "password" => "required|confirmed",
                ]);
            //接收数据
            $data=$request->post();
            //判断是否重新上传图片
            if($request->file("img")!==null){

                $data['img']=$request->file("img")->store("images","image");
            }else{
                $data['img']=$user->img;
            }

//           dd($data);
            //修改
            $user->update($data);
            //跳转
            return redirect("/user/index");

        }
        //显示视图
        return view("user.edit",compact("user"));
    }


    //删除
    public function del($id){

        $user=User::find($id);
        $img=$user["img"];

        if($user->delete()){
            //删除保存的图片
            @unlink($img);
            //跳转
            return redirect("/user/index");
        }

    }




}
