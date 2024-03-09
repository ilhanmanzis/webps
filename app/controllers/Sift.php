<?php

class Sift extends Controller{
    public function index(){
        if(isset($_SESSION['admin'])){
            $data['sift'] = $this->model('Sift_model')->getAllSift();
            $this->view('template/header');
            $this->view('sift/index', $data);
            $this->view('template/footer');
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

    //mengambil data spesifik
    public function getsift(){
        if(isset($_SESSION['admin'])){
            $this->model('Sift_model')->getSift($_POST['id_sift']);
        }else{
            header('location:' . BASEURL . '/login');
        }
        
    }

    //menambahkan data
    public function create(){
        if(isset($_SESSION['admin'])){
            if($this->model('Sift_model')->createDataSift($_POST)>0){
                Flasher::setFlash('Data sift', 'berhasil','ditambahkan','success');
            header('location:' . BASEURL . '/sift');
            exit;
            }else{
                Flasher::setFlash('Data sift', 'gagal','ditambahkan','danger');
                header('location:' . BASEURL . '/sift');
                exit;
            }
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

    //menghapus data
    public function delete($id){
        if(isset($_SESSION['admin'])){
            if($this->model('Sift_model')->deleteDataSift($id)>0){
                Flasher::setFlash('Data sift', 'berhasil','dihapus','success');
                header('location:' . BASEURL . '/sift');
                exit;
            }else{
                Flasher::setFlash('Data sift', 'gagal','dihapus','danger');
                header('location:' . BASEURL . '/sift');
                exit;
            }
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

    //update data
    public function update(){
        if(isset($_SESSION['admin'])){
            if($this->model('Sift_model')->updateDataSift($_POST)>0){
                Flasher::setFlash('Data sift', 'berhasil','diubah','success');
                header('location:' . BASEURL . '/sift');
                exit;
            }else{
                Flasher::setFlash('Data sift', 'gagal','diubah','danger');
                header('location:' . BASEURL . '/sift');
                exit;
            }
        }else{
            header('location:' . BASEURL . '/login');
        }
    }
}

?>