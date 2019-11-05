<?php

    class ModelAddress extends CI_Model{

        public function insertDataAddress($street,$username)
        {
            $sql = "INSERT INTO tb_address VALUES(?,?,?)";
            return $this->db->query($sql,array("",$street,$username));
        }

        public function deleteAddress($username){
            $sql = "DELETE FROM tb_address WHERE username = ?";
            return $this->db->query($sql,$username);
        }
    }