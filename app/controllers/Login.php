<?php 

class Login extends Controller {
    public function index(){
        if(isset($_SESSION['admin'])){
            header('location:' . BASEURL . '/');
        }else{
            $this->view('login/index');
        }
    }
}

?>