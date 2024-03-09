<?php

class Admin extends Controller{
    public function index(){
        header('location:' . BASEURL . '/');
    }
    public function getadmin(){
        if($this->model('Admin_model')->getadmin($_POST['username'],$_POST['password'])==true){
            header('location:' . BASEURL . '/admin/operator');
            exit;
        }else{
            Flasher::setFlash('Username & Password', 'Salah','','danger');
            header('location:' . BASEURL . '/login');
            exit;
        }
    }

    public function operator(){
        if(isset($_SESSION['admin'])){
            $data['operator'] = $this->model('Operator_model')->getAllOperator();
            $data['sift'] = $this->model('Sift_model')->getAllSIft();
            $this->view('login/operator', $data);
        }else{
            header('location:' . BASEURL . '/login'); 
        }
    }

    public function saveoperator(){
        if(isset($_SESSION['admin'])){
            if($this->model('Admin_model')->saveOperator($_POST['id_operator'],$_POST['id_sift'])==true){    
                header('location:' . BASEURL . '/');
            }else{
                header('location:' . BASEURL . '/admin/operator');
            }
        }else{
            header('location:' . BASEURL . '/login'); 
        }
    }
}

?>