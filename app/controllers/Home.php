<?php 

class Home extends Controller {
    public function index(){
        if(isset($_SESSION['admin'])){
            $this->view('template/header');
            $this->view('home/index');
            $this->view('template/footer');
        }else{
            header('location:' . BASEURL . '/login');
        }
    }
}

?>