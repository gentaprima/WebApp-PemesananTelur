<?php 

    class ModelCourier extends CI_Model{

        public function getDataCourier(){
            $sql = "SELECT id_courier,fname,lname
                        from tb_courier,tb_users
                        WHERE tb_courier.username = tb_users.username";
            return $this->db->query($sql)->result_array();
        }

        public function insertOrder($id_transaksi,$id_order,$id_courier,$total,$tgl,$status){
            $sql = "INSERT INTO tb_transaksi VALUES(?,?,?,?,?,?)";
            return $this->db->query($sql,array($id_transaksi,$id_order,$id_courier,$total,$tgl,$status));
        }

        public function getDataTransactionByCourier($id_courier){
            $sql = "SELECT fname,lname,kordinat,street,product_name,tb_transaksi.id_order,id_transaksi
                        FROM tb_product,tb_agent,tb_order,tb_address,tb_users,tb_transaksi
                        WHERE tb_transaksi.id_order = tb_order.id_order AND
                              tb_order.id_address = tb_address.id_address AND
                              tb_order.id_agent = tb_agent.id_agent AND
                              tb_order.username = tb_users.username AND
                              tb_order.id_product = tb_product.id_product AND
                              tb_transaksi.id_courier = ? ";
            return $this->db->query($sql,$id_courier)->result_array();
        }

        public function getAlldataCourier(){
            $sql = "SELECT courier_name,tb_courier.id_courier,email,phone,tb_users.username,fname,lname
                            FROM tb_courier,tb_users
                                WHERE tb_courier.username = tb_users.username AND
                                      tb_users.type = ?";
            return $this->db->query($sql,"courier")->result_array();
        }

        public function insertCourier($idCourier,$username,$fullName){
            $sql = "INSERT INTO tb_courier VALUES(?,?,?)";
            return $this->db->query($sql,array("COU-".$idCourier,$username,$fullName));
        }

        public function updateCourier($idCourier,$fullName){
            $sql = "UPDATE tb_courier set courier_name = ? 
                            WHERE id_courier = ?";
            return $this->db->query($sql,array($fullName,$idCourier));
        }

        public function deleteCourier($id){
            $sql = "DELETE from tb_courier WHERE username = ?";
            return $this->db->query($sql,$id);
        }
    }