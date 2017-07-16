<?php


        $array=[
            'appid' => '',
            'appkey' => '',
            'callback' => '',
            'scope' => 'get_user_info',
            'errorReport' => true
        ];

        $qq=new woshixieming\login\qqClinet();
        var_dump($qq);
exit();
        //返回访问url
        $url=$qq->qq_login();
var_dump($url);