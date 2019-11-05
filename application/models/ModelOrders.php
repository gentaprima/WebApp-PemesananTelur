<?php

    class ModelOrders extends CI_Model{

        public function insertDataOrder($idOrder,$username,$idAddress,$idAgent,$idProduct,$jumlahOrder,$total,$tgl){
            $sql = "INSERT INTO tb_order VALUES(?,?,?,?,?,?,?,?,?)";
            return $this->db->query($sql,array($idOrder,$username,$idAddress,$idAgent,$idProduct,$jumlahOrder,$total,$tgl,0));
        }

        public function getDataOrderByidOrder($idOrder){
            $sql = "SELECT * from tb_order WHERE id_order = ?";
            return $this->db->query($sql,$idOrder)->row_array();
        
        }

        public function getDataOrder(){
            $sql = "SELECT fname,lname,shop,product_name,jumlah_order,tgl,street,id_order,total_transaksi,tb_order.id_product,quality
                        From tb_users,tb_agent,tb_order,tb_address,tb_product
                        WHERE 
                            tb_order.username = tb_users.username AND
                            tb_order.id_address = tb_address.id_address AND
                            tb_order.id_agent = tb_agent.id_agent AND
                            tb_address.username = tb_users.username AND
                            tb_agent.username = tb_users.username AND
                            tb_order.id_product = tb_product.id_product AND
                            status_order = ?
                            ";
            return $this->db->query($sql,0)->result_array();
        }

        public function getDataOrderByUsername($username){
            $sql = "SELECT tb_order.id_product,product_name,jumlah_order,tgl,id_order,total_transaksi,tb_order.status_order,image,quality
                        From tb_users,tb_agent,tb_order,tb_address,tb_product
                        WHERE 
                            tb_order.username = tb_users.username AND
                            tb_order.id_address = tb_address.id_address AND
                            tb_order.id_agent = tb_agent.id_agent AND
                            tb_address.username = tb_users.username AND
                            tb_agent.username = tb_users.username AND
                            tb_order.id_product = tb_product.id_product AND
                            tb_order.status_order = ? AND
                            tb_order.username = ?
                            ";
            return $this->db->query($sql,array(0,$username))->result_array();
        }

        public function changeStatusOrders($id_order){
            $sql = "UPDATE tb_order SET status_order = ? WHERE id_order = ?";
            return $this->db->query($sql,array(1,$id_order));
        }

        public function updateTotalPrice($id_order,$entity,$id_product,$totalHarga){
            $sql = "UPDATE tb_order SET jumlah_order = ?,id_product = ?,total_transaksi = ?
                        WHERE id_order = ?";
            return $this->db->query($sql,array($entity,$id_product,$totalHarga,$id_order));
        }
    }