<?php

class Admin_model{

    private $table = 'admin';
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }

    // validasi username dan password
    public function getAdmin($username, $password){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username=:username');
        $this->db->bind('username', $username);
        $data = $this->db->single();
        if($username ==$data['username']){
            if($password == $data['password']){
                session_start();
                $_SESSION['admin'] = $data['id_admin'];
                $_SESSION['username'] = $username;
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    //simpan operator & sift ke session
    public function saveOperator($operator,$sift){
        session_start();
        $_SESSION['operator'] = $operator;
        $_SESSION['sift'] = $sift;
        
        
        if($_SESSION['operator'] ==$operator|| $_SESSION['sift']==$sift){
            return true;
        }else{
            return false;
        }
    }

    //edit operator dan sift
    public function editOperator($operator,$sift){
        session_start();
        $_SESSION['operator'] = $operator;
        $_SESSION['sift'] = $sift;
        
        
        if($_SESSION['operator'] ==$operator|| $_SESSION['sift']==$sift){
            return true;
        }else{
            return false;
        }
    }

    // get data admin
    public function getDataAdmin($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_admin=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    //edit data admin
    public function editAdmin($id,$username,$password){
        $query = "UPDATE " . $this->table . " SET username=:username, password=:password WHERE id_admin=:id_admin";
        $this->db->query($query);
        $this->db->bind('id_admin', $id);
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);

        $this->db->execute();
        return $this->db->rowCount();
    }

}

?>