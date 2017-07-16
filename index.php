<?php
/**
 * @description:QQ登录示例
 * @Author: Xie Ming
 * @Date: 2017/7/16
 */
namespace woshixm\qqlogin;

use woshixieming\login\qqClinet;

class index {

    /**
     * @Description:demo
     */
    public function index(){
        $qq=new qqClinet();
        $url=$qq->qq_login();
        header('Location:'.$url);
    }


    /**
     * @Description:回调地址
     */
    public function callback(){

        $qq=new qqClinet();
        //用户授权后,获取access_token
        $accessToken=$qq->qq_callback();
        $openId=$qq->get_openid();
    }
}