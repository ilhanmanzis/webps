<?php 

class Home extends Controller {
    public function index(){
        if(isset($_SESSION['admin'])){
            $data['operatorSession'] = $this->model('Operator_model')->getOperator($_SESSION['operator']);
            $data['siftSession'] = $this->model('Sift_model')->getSift($_SESSION['sift']);
            $data['transaksiToday'] = $this->model('Transaksi_model')->getAllTransaksiToday();
            $data['transaksi'] = $this->model('Transaksi_model')->getAllTransaksi();
            $data['operator'] = $this->model('Operator_model')->getAllOperator();
            $data['sift'] = $this->model('Sift_model')->getAllSift();
            $this->view('template/header', $data);
            $this->view('home/index',$data);
            $this->view('template/footer');
        }else{
            header('location:' . BASEURL . '/login');
        }
    }
}

?>