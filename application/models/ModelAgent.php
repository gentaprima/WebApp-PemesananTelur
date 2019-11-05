<?php

    class ModelAgent extends CI_Model{

        public function insertDataAgent($id_agent,$username,$nameShop,$coordinate){
            $sql = "INSERT INTO tb_agent VALUES(?,?,?,?,?)";
            return $this->db->query($sql,array($id_agent,$username,$nameShop,$coordinate,0));
        }

        public function getDataAgent(){
            $sql = "SELECT fname,lname,shop,id_agent,street,is_verified,phone,email,tb_agent.username
                        FROM tb_users,tb_address,tb_agent
                            WHERE tb_users.type = ? AND
                                  tb_agent.username = tb_users.username AND
                                  tb_address.username = tb_users.username ";
            return $this->db->query($sql,"agent")->result_array();
        }

        public function deleteAgent($username){
            $sql = "DELETE FROM tb_agent WHERE username = ?";
            return $this->db->query($sql,$username);
        }
    }