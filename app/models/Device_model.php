<?php

class Device_model{
    
    private $table = 'device';
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }

    // melihat semua data device
    public function getAllDevice(){
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();
    }

    //melihat detail data device
    public function getDevice($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_device=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    //menambahkan data device
    public function createDataDevice($data){
        $query = "INSERT INTO " . $this->table . " VALUES ('', :name_device, :harga_perjam, :jumlah)";
        $this->db->query($query);
        $this->db->bind('name_device', $data['name_device']);
        $this->db->bind('harga_perjam', $data['harga_perjam']);
        $this->db->bind('jumlah', $data['jumlah']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    //menghapus data device
    public function deleteDataDevice($id){
        $query = "DELETE FROM " . $this->table . " WHERE id_device=:id";
        $this->db->query($query);
        $this->db->bind('id',$id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    //ubah data device
    public function updateDataDevice($data){
        $query = "UPDATE " . $this->table . " SET name_device=:name_device, harga_perjam=:harga_perjam, jumlah=:jumlah WHERE id_device=:id_device";
        $this->db->query($query);
        $this->db->bind('id_device', $data['id_device']);
        $this->db->bind('name_device', $data['name_device']);
        $this->db->bind('harga_perjam', $data['harga_perjam']);
        $this->db->bind('jumlah', $data['jumlah']);

        $this->db->execute();
        return $this->db->rowCount();
    }

}

?>