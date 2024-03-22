<?php

class Sift_model extends Controller{
    
    private $table = 'sift';
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }

    // melihat semua data sift
    public function getAllSift(){
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();
    }

    //melihat detail data sift
    public function getSift($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_sift=:id_sift');
        $this->db->bind('id_sift', $id);
        return $this->db->single();
    }

    //menambahkan data sift
    public function createDataSift($data){
        $query = "INSERT INTO " . $this->table . " VALUES ('', :name_sift)";
        $this->db->query($query);
        $this->db->bind('name_sift', $data['name_sift']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    //menghapus data sift
    public function deleteDataSift($id){
        $query = "DELETE FROM " . $this->table . " WHERE id_sift=:id_sift";
        $this->db->query($query);
        $this->db->bind('id_sift',$id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    //ubah data sift
    public function updateDataSift($data){
        $query = "UPDATE " . $this->table . " SET name_sift=:name_sift WHERE id_sift=:id_sift";
        $this->db->query($query);
        $this->db->bind('id_sift', $data['id_sift']);
        $this->db->bind('name_sift', $data['name_sift']);

        $this->db->execute();
        return $this->db->rowCount();
    }

}

?>