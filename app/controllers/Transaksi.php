<?php

class Transaksi extends Controller{
    public function index(){
        if(isset($_SESSION['admin'])){
            $data['device'] = $this->model('Device_model')->getAllDevice();
            $data['transaksi'] = $this->model('Transaksi_model')->getAllTransaksiToday();
            $data['operator'] = $this->model('Operator_model')->getAllOperator();
            $data['sift'] = $this->model('Sift_model')->getAllSift();
            $data['operatorSession'] = $this->model('Operator_model')->getOperator($_SESSION['operator']);
            $data['siftSession'] = $this->model('Sift_model')->getSift($_SESSION['sift']);
            $this->view('template/header',$data);
            $this->view('transaksi/index', $data);
            $this->view('transaksi/create', $data);
            $this->view('template/footer');
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

    //melihat transaksi sepesifik
    public function gettransaksi(){
        if(isset($_SESSION['admin'])){
            $data = $this->model('Transaksi_model')->getTransaksi($_POST['id_transaksi']);
            $this->view('transaksi/tambahjam',$data);
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
            $this->view('transaksi/update',$data);
        }else{
            header('location:' . BASEURL . '/login');
        }
        
    }

    //menambahkan transaksi
    public function create(){
        if(isset($_SESSION['admin'])){
            if($this->model('Transaksi_model')->createDataTransaksi($_POST)>0){
                Flasher::setFlash('Data Transaksi', 'berhasil','ditambahkan','success');
                header('location:' . BASEURL . '/transaksi');
            exit;
            }else{
                Flasher::setFlash('Data Transaksi', 'gagal','ditambahkan','danger');
                header('location:' . BASEURL . '/transaksi');
                exit;
            }
        }else{
            header('location:' . BASEURL . '/login');
        }
        
    }

    //tambah jam dan minuman
    public function tambahjam(){
        if(isset($_SESSION['admin'])){
            if($this->model('Transaksi_model')->tambahJam($_POST)>0){
                Flasher::setFlash('Data Jam dan Minuman', 'berhasil','diubah','success');
                header('location:' . BASEURL . '/transaksi');
            exit;
            }else{
                Flasher::setFlash('Data Jam dan Minuman', 'gagal','diubah','danger');
                header('location:' . BASEURL . '/transaksi');
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
                header('location:' . BASEURL . '/transaksi');
            exit;
            }else{
                Flasher::setFlash('Data Transaksi', 'gagal','diubah','danger');
                header('location:' . BASEURL . '/transaksi');
                exit;
            }
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

}

?>