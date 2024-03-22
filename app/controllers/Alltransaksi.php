<?php

class Alltransaksi extends Controller {
    public function index(){
        if(isset($_SESSION['admin'])){
            $data['operator'] = $this->model('Operator_model')->getAllOperator();
            $data['sift'] = $this->model('Sift_model')->getAllSift();
            $data['operatorSession'] = $this->model('Operator_model')->getOperator($_SESSION['operator']);
            $data['siftSession'] = $this->model('Sift_model')->getSift($_SESSION['sift']);
            $this->view('template/header',$data);
            $this->view('alltransaksi/index', $data);
             
            $this->view('template/footer');
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

    //get transaksi bedasarkan operator dan sift
    public function caritransaksi(){
        if(isset($_SESSION['admin'])){  
            $data['operator'] = $this->model('Operator_model')->getAllOperator();
            $data['operatorById'] = $this->model('Operator_model')->getOperator($_POST['operator']);
            $data['sift'] = $this->model('Sift_model')->getAllSift();
            $data['siftById'] = $this->model('Sift_model')->getSift($_POST['sift']);
            $data['operatorSession'] = $this->model('Operator_model')->getOperator($_SESSION['operator']);
            $data['siftSession'] = $this->model('Sift_model')->getSift($_SESSION['sift']);

            $data['transaksi'] = $this->model('Transaksi_model')->cariTransaksi($_POST);
            $this->view('template/header',$data);
            $this->view('alltransaksi/index', $data);
            $this->view('alltransaksi/dataCari',$data);
            $this->view('template/footer');
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

    //get all transaksi
    public function getalltransaksi(){
        if(isset($_SESSION['admin'])){  
            $data['operator'] = $this->model('Operator_model')->getAllOperator();
            $data['sift'] = $this->model('Sift_model')->getAllSift();
            $data['operatorSession'] = $this->model('Operator_model')->getOperator($_SESSION['operator']);
            $data['siftSession'] = $this->model('Sift_model')->getSift($_SESSION['sift']);

            $data['transaksi'] = $this->model('Transaksi_model')->getAllTransaksi();
            $this->view('template/header',$data);
            $this->view('alltransaksi/index', $data);
            $this->view('alltransaksi/dataCari',$data);
            $this->view('template/footer');
        }else{
            header('location:' . BASEURL . '/login');
        }
    }


    //tambah jam dan minuman
    public function tambahjam(){
        if(isset($_SESSION['admin'])){
            if($this->model('Transaksi_model')->tambahJam($_POST)>0){
                Flasher::setFlash('Data Jam dan Minuman', 'berhasil','diubah','success');
                header('location:' . BASEURL . '/alltransaksi');
            exit;
            }else{
                Flasher::setFlash('Data Jam dan Minuman', 'gagal','diubah','danger');
                header('location:' . BASEURL . '/alltransaksi');
                exit;
            }
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

    //update data transaksi
    public function update(){
        if(isset($_SESSION['admin'])){
            if($this->model('Transaksi_model')->updateDataTransaksi($_POST)>0){
                Flasher::setFlash('Data Transaksi', 'berhasil','diubah','success');
                header('location:' . BASEURL . '/alltransaksi');
            exit;
            }else{
                Flasher::setFlash('Data Transaksi', 'gagal','diubah','danger');
                header('location:' . BASEURL . '/alltransaksi');
                exit;
            }
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

    //melihat transaksi sepesifik
    public function gettransaksi(){
        if(isset($_SESSION['admin'])){
            $data = $this->model('Transaksi_model')->getTransaksi($_POST['id_transaksi']);
            $this->view('alltransaksi/tambahjam',$data);
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

    
    public function gettransaksiupdate(){
        if(isset($_SESSION['admin'])){
            $data['transaksi'] = $this->model('Transaksi_model')->getTransaksi($_POST['id_transaksi']);
            $data['device'] = $this->model('Device_model')->getAllDevice();
            $data['operator'] = $this->model('Operator_model')->getAllOperator();
            $data['sift'] = $this->model('Sift_model')->getAllSift();
            $this->view('alltransaksi/update',$data);
        }else{
            header('location:' . BASEURL . '/login');
        }
        
    }
    
    //menghapus data transaksi
    public function delete($id){
        if(isset($_SESSION['admin'])){
            if($this->model('Transaksi_model')->deleteDataTransaksi($id)>0){
                Flasher::setFlash('Data Transaksi', 'berhasil','dihapus','success');
                header('location:' . BASEURL . '/alltransaksi');
                exit;
            }else{
                Flasher::setFlash('Data Transaksi', 'gagal','dihapus','danger');
                header('location:' . BASEURL . '/alltransaksi');
                exit;
            }
        }else{
            header('location:' . BASEURL . '/login');
        }
    }
    
}

?>