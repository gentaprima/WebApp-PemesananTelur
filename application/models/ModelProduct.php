<?php

    class ModelProduct extends CI_Model{

        public function getDataProduct()
        {
            $sql = "SELECT * from tb_product";
            return $this->db->query($sql)->result_array();
        }

        public function insertProduct($idProduct,$productName,$desc,$image,$quality,$stock,$price){
            $sql = "INSERT INTO tb_product VALUES(?,?,?,?,?,?,?)";
            return $this->db->query($sql,array($idProduct,$productName,$desc,$image,$quality,$stock,$price));
        }

        public function deleteProduct($idProduct){
            $sql = "DELETE FROM tb_product WHERE id_product = ?";
            return $this->db->query($sql,$idProduct);
        }

        public function updateDataProduct($idProduct,$productName,$desc,$image,$quality,$stock,$price){
            $sql = "UPDATE tb_product SET product_name = ?,description = ?, image = ?, quality = ?, price = ?,stock = ?
                            WHERE id_product = ? ";
            return $this->db->query($sql,array($productName,$desc,$image,$quality,$price,$stock,$idProduct));
        }

        public function changeStockProduct($sisaStock,$idProduct){
            $sql = "UPDATE tb_product SET stock = ? WHERE id_product = ?";
            return $this->db->query($sql,array($sisaStock,$idProduct));
        }
    }