<?php

    class ModelTransaction extends CI_Model{
        public function getDataByUsername($username){
            $sql = "SELECT DISTINCT 
            image,product_name,tb_transaksi.total_transaksi,tb_order.id_product,id_transaksi,tb_transaksi.id_order,                 tb_transaksi.id_courier,tb_transaksi.tgl,tb_transaksi.status_order,jumlah_order,courier_name,quality
                        FROM tb_product,tb_users,tb_transaksi,tb_courier,tb_order
                        WHERE tb_transaksi.id_courier = tb_courier.id_courier AND
                              tb_transaksi.id_order = tb_order.id_order AND
                              tb_order.username = tb_users.username AND
                              tb_order.id_product = tb_product.id_product AND 
                              tb_order.username = ? AND 
                              tb_transaksi.status_order = ? OR
                              tb_transaksi.status_order = ? ";
            return $this->db->query($sql,array($username,1,2))->result_array();
        }

        public function getDataTransaction(){
            $sql = "SELECT id_transaksi,tb_transaksi.id_order,fname,lname,courier_name,shop,product_name,jumlah_order,                       tb_transaksi.total_transaksi,tb_transaksi.tgl,quality,tb_transaksi.status_order
                            From tb_transaksi,tb_order,tb_users,tb_agent,tb_courier,tb_product
                            WHERE tb_transaksi.id_order = tb_order.id_order AND
                                  tb_order.username = tb_users.username AND
                                  tb_order.id_agent = tb_agent.id_agent AND
                                  tb_order.id_product = tb_product.id_product AND
                                  tb_transaksi.id_courier = tb_courier.id_courier ORDER BY tb_transaksi.tgl DESC, tb_transaksi.status_order ";
            return $this->db->query($sql)->result_array();
        }

        public function changeStatusTransaction($idTransaksi,$statusOrder,$tgl){
            $sql = "UPDATE tb_transaksi SET status_order = ? , tgl = ? WHERE id_transaksi = ?";
            return $this->db->query($sql,array($statusOrder,$tgl,$idTransaksi));
        }
    }