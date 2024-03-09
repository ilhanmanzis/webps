<?php 

class Logout extends Controller {
    public function index(){
        if(isset($_SESSION['admin'])){
            session_start();
            session_unset();
            session_destroy();
            header('location:' . BASEURL . '/login');
        }else{
            $this->view('login/index');
        }
    }
}

?>