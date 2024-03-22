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
    public function editoperator(){
        if(isset($_SESSION['admin'])){
            if($this->model('Admin_model')->editOperator($_POST['operator'],$_POST['sift'])==true){    
                header('location:' . BASEURL . '/');
            }else{
                header('location:' . BASEURL . '/admin/operator');
            }
        }else{
            header('location:' . BASEURL . '/login'); 
        }
    }

    public function setting(){
        if(isset($_SESSION['admin'])){
            $data['operatorSession'] = $this->model('Operator_model')->getOperator($_SESSION['operator']);
            $data['siftSession'] = $this->model('Sift_model')->getSift($_SESSION['sift']);
            $data['operator'] = $this->model('Operator_model')->getAllOperator();
            $data['sift'] = $this->model('Sift_model')->getAllSift();
            $data['admin'] = $this->model('Admin_model')->getDataAdmin($_SESSION['admin']);
            $this->view('template/header', $data);
            $this->view('admin/setting',$data);
            $this->view('template/footer');
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

    public function editdataadmin(){
        if(isset($_SESSION['admin'])){
            if($this->model('Admin_model')->editAdmin($_POST['id_admin'],$_POST['username'],$_POST['password'])>0){
                Flasher::setFlash('Data Admin', 'berhasil','diubah','success');
                header('location:' . BASEURL . '/admin/setting');
                exit;    
            }else{
                Flasher::setFlash('Data Admin', 'gagal','diubah','danger');
                header('location:' . BASEURL . '/admin/setting');
                exit;
            }
        }else{
            header('location:' . BASEURL . '/login'); 
        }
    }
}

?>