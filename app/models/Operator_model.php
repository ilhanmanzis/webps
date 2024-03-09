<?php

class Operator_model extends Controller{
    
    private $table = 'operator';
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }

    // melihat semua data operator
    public function getAllOperator(){
        $this->db->query('SELECT * FROM '. $this->table);
        return $this->db->resultSet();
    }

    //melihat detail data operator
    public function getOperator($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_operator=:id_operator');
        $this->db->bind('id_operator', $id);
        $data = $this->db->single();
        return  $this->view('operator/update',$data);
    }

    //menambahkan data operator
    public function createDataOperator($data){
        $query = "INSERT INTO " . $this->table . " VALUES ('', :name_operator)";
        $this->db->query($query);
        $this->db->bind('name_operator', $data['name_operator']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    //menghapus data operator
    public function deleteDataOperator($id){
        $query = "DELETE FROM " . $this->table . " WHERE id_operator=:id_operator";
        $this->db->query($query);
        $this->db->bind('id_operator',$id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    //ubah data operator
    public function updateDataOperator($data){
        $query = "UPDATE " . $this->table . " SET name_operator=:name_operator WHERE id_operator=:id_operator";
        $this->db->query($query);
        $this->db->bind('id_operator', $data['id_operator']);
        $this->db->bind('name_operator', $data['name_operator']);

        $this->db->execute();
        return $this->db->rowCount();
    }

}

?>