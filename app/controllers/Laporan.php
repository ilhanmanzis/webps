<?php

class Laporan extends Controller {
    public function index(){
        if(isset($_SESSION['admin'])){
            $data['operator'] = $this->model('Operator_model')->getAllOperator();
            $data['sift'] = $this->model('Sift_model')->getAllSift();
            $data['operatorSession'] = $this->model('Operator_model')->getOperator($_SESSION['operator']);
            $data['siftSession'] = $this->model('Sift_model')->getSift($_SESSION['sift']);
            $this->view('template/header',$data);
            $this->view('laporan/index', $data);
             
            $this->view('template/footer');
        }else{
            header('location:' . BASEURL . '/login');
        }
    }

    //get transaksi bedasarkan operator dan sift
    public function cetaklaporan(){
        if(isset($_SESSION['admin'])){  
            $data['operatorById'] = $this->model('Operator_model')->getOperator($_POST['operator']);
            $data['siftById'] = $this->model('Sift_model')->getSift($_POST['sift']);
            $data['awal']=$_POST['awal'];
            $data['akhir']=$_POST['akhir'];
            $data['transaksi'] = $this->model('Transaksi_model')->cariTransaksi($_POST);
            if($data['transaksi']){
                $this->view('laporan/cetaklaporan', $data);
            }else{
                Flasher::setFlash('Data Transaksi', 'kosong','','danger');
                header('location:' . BASEURL . '/laporan');
                exit;
            }
        }else{
            header('location:' . BASEURL . '/login');
        }
    }


    //get all transaksi
    public function cetaksemualaporan(){
        if(isset($_SESSION['admin'])){  
            $data['operator'] = $this->model('Operator_model')->getAllOperator();
            $data['sift'] = $this->model('Sift_model')->getAllSift();
            $data['transaksi'] = $this->model('Transaksi_model')->getAllTransaksi();
            
            if($data['transaksi']){
                $this->view('laporan/cetaksemualaporan', $data);
            }else{
                Flasher::setFlash('Data Transaksi', 'kosong','','danger');
                header('location:' . BASEURL . '/laporan');
                exit;
            }
        }else{
            header('location:' . BASEURL . '/login');
        }
    }
}

?>