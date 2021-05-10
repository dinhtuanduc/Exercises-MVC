<?php
class AuthController{
    public function index(){
        include_once "Views/index.php";
    }
    public function login(){
        include_once "Views/account/login.php";
    }
    public function handle(){

        if (isset($_REQUEST['username']) && isset($_REQUEST['psw'])){
            $username = $_REQUEST['username'];
            $password =md5($_REQUEST['psw']);
            $model = new AuthModel();
            $result = $model->Handle($username,$password);
            if ($result > 0){
                $_SESSION['login'] = 'complete';
                header('location: index.php?controller=auth&action=index');
                exit();
            }else{
                $_SESSION['action'] = 'Đăng nhập thất bại';
                header('location: index.php?controller=auth&action=login');
                exit();
            }
        }
    }
    public function register(){
        include_once "Views/account/register.php";
    }
    public function check_username(){
        if (isset($_REQUEST['username'])){
            $username = $_REQUEST['username'];
            $model = new AuthModel();
            $result = $model->check_username($username);
            echo $result;
        }
    }
    public function store(){
        $fullname = isset($_REQUEST['fullname']) ? $_REQUEST['fullname'] : '';
        $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : '';
        $psw =md5(isset($_REQUEST['psw']) ? $_REQUEST['psw'] : '');
        $gender = isset($_REQUEST['gender']) ? $_REQUEST['gender'] : '';
        $age = isset($_REQUEST['age']) ? $_REQUEST['age'] : '';
        $address = isset($_REQUEST['address']) ? $_REQUEST['address'] : '';
        if (!empty($fullname) & !empty($username) & !empty($psw) & !empty($gender) & !empty($age) & !empty($address)){
            $model = new AuthModel();
            $model->store($fullname, $username, $psw, $gender, $age, $address);
            $_SESSION['status'] = 'Thêm mới tài khoản thành công';
            header('location: index.php?controller=auth&action=register');
            exit();
        }
    }
    public function logout(){
        session_unset();
        session_destroy();
        header('location: index.php?controller=auth&action=login');
        exit();
    }
}