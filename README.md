# qq-oauth2.0

 
######QQ登录OAuth2.0总体处理流程如下：  
> Step1：申请接入，获取appid和apikey；  
Step2：开发应用，并设置协作者帐号进行测试联调；  
Step3：放置QQ登录按钮；  
Step4：通过用户登录验证和授权，获取Access Token；  
Step5：通过Access Token获取用户的OpenID；  
Step6：调用OpenAPI，来请求访问或修改用户授权的资源。  


######全局参数配置

    'qq_oauth_config' => [
        'appid' => '',
        'appkey' => '',
        'callback' => '',
        'scope' => 'get_user_info',
        'errorReport' => true
    ]

######修改Recorder.php的参数配置:

    public function __construct(){
        $this->error = new ErrorCase();
        
        //-------读取配置文件
        $this->inc = config('qq_oauth_config');
        if(empty($this->inc)){
            $this->error->showError("20001");
        }

        if(empty(session('QC_userData'))){
            self::$data = array();
        }else{
            self::$data = session('QC_userData');
        }
    }
    
######调用:

1、获取授权地址:

    $qq=new qqClinet();
    $url=$qq->qq_login();
    header('Location:'.$url);
    
2、获取Access Token和OpenID
    
    $qq=new qqClinet();
    //用户授权后,获取access_token
    $accessToken=$qq->qq_callback();
    $openId=$qq->get_openid();