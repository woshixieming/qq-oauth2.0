<?php
namespace woshixieming\login;
/* PHP SDK
 * @version 2.0.0
 * @author connect@qq.com
 * @editor Xie Ming 2017-07-16
 * @copyright © 2013, Tencent Corporation. All rights reserved.
 */

class Recorder{
    private static $data;
    private $inc;
    private $error;

    public function __construct(){
        $this->error = new ErrorCase();

        //-------读取配置文件
        $this->inc = config('qq_oauth_config');

        if(empty($this->inc)){
            $this->error->showError("20001");
        }

        if(empty($_SESSION['qq_user_data'])){
            self::$data = array();
        }else{
            self::$data = $_SESSION['qq_user_data'];
        }
    }

    public function write($name,$value){
        self::$data[$name] = $value;
    }

    public function read($name){
        if(empty(self::$data[$name])){
            return null;
        }else{
            return self::$data[$name];
        }
    }

    public function readInc($name){
        if(empty($this->inc[$name])){
            return null;
        }else{
            return $this->inc[$name];
        }
    }

    public function delete($name){
        unset(self::$data[$name]);
    }

    function __destruct(){
        $_SESSION['qq_user_data'] = self::$data;
    }
}
