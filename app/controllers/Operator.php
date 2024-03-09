<?php

class Operator extends Controller{
    public function index(){
        if(isset($_SESSION['admin'])){
            $data['operator'] = $this->model('Operator_model')->getAllOperator();
            $this->view('template/header');
            $this->view('operator/index', $data);
            $this->view('template/footer');
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

    //mengambil data spesifik
    public function getoperator(){
        if(isset($_SESSION['admin'])){
            $this->model('Operator_model')->getOperator($_POST['id_operator']);
        }else{
            header('location:' . BASEURL . '/login');
        }
        
    }

    //menambahkan data
    public function create(){
        if(isset($_SESSION['admin'])){
            if($this->model('Operator_model')->createDataOperator($_POST)>0){
                Flasher::setFlash('Data operator', 'berhasil','ditambahkan','success');
                header('location:' . BASEURL . '/operator');
                exit;
            }else{
                Flasher::setFlash('Data operator', 'gagal','ditambahkan','danger');
                header('location:' . BASEURL . '/operator');
                exit;
            }
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

    //menghapus data
    public function delete($id){
        if(isset($_SESSION['admin'])){
            if($this->model('Operator_model')->deleteDataOperator($id)>0){
                Flasher::setFlash('Data operator', 'berhasil','dihapus','success');
                header('location:' . BASEURL . '/operator');
                exit;
            }else{
                Flasher::setFlash('Data operator', 'gagal','dihapus','danger');
                header('location:' . BASEURL . '/operator');
                exit;
            }
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

    //update data
    public function update(){
        if(isset($_SESSION['admin'])){
            if($this->model('Operator_model')->updateDataOperator($_POST)>0){
                Flasher::setFlash('Data operator', 'berhasil','diubah','success');
                header('location:' . BASEURL . '/operator');
                exit;
            }else{
                Flasher::setFlash('Data operator', 'gagal','diubah','danger');
                header('location:' . BASEURL . '/operator');
                exit;
            }
        }else{
            header('location:' . BASEURL . '/login');
        }
    }
}

?>