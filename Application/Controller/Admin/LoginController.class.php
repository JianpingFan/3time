<?php

class LoginController extends PlatformController{
        //后台登陆:
       public function loginAction(){
            $this->display('index.html');
       }
       
       //登陆验证:public function checkLoginAction(){
        public function checkAction(){
            
            //更换SESSION存放位置
          
        //>>1.接收请求参数

        $username = isset($_POST['admin_mail'])?$_POST['admin_mail']:'';
        $password = isset($_POST['admin_passwd'])?md5($_POST['admin_passwd']):'';
        //验证登陆;
        $adminModel = new adminModel();
        $result=$adminModel->check($username,$password);
    
        //>>3.根据验证的结果选择视图
         if($result){
               new SessionDBTool();
            //保持登录信息
              $_SESSION['isLogin'] = 'yes';
              $condition="admin_mail = '{$username}'";
              $rows = $adminModel->getAdmin_group($condition);
              //将登录的管理员的组id保存到session中
              $_SESSION['admin_group'] = $rows[0]['admin_group'];
            //登录成功之后直接跳转到后台
            $this->redirect('index.php?p=Admin&c=Admin&a=admin');
        }else{
            //跳转到登录页面
             // $this->display('index.html');
              $this->redirect('index.php?p=Admin&c=Login&a=login','用户名或者密码出错!',2);
        }
    }
}