<?php 

use Restserver\Libraries\REST_Controller;
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/REST_Controller.php';
    class Orders extends CI_Controller{

        use REST_Controller {
            REST_Controller::__construct as private __resTraitConstruct;
        }

        
        public function __construct()
        {
            parent::__construct();
            $this->__resTraitConstruct();
            $this->load->model('ModelOrders');
        }

        public function index_post()
        {
            $idOrder = $this->post('idOrder');
            $username = $this->post('username');
            $idAddress = $this->post('idAddress');
            $idAgent = $this->post('idAgent');
            $idProduct = $this->post('idProduct');
            $jumlahOrder = $this->post('jumlahOrder');
            $tgl = $this->post('tgl');
            $getDataProduct = $this->db->get_where('tb_product',array('id_product'=> $idProduct))->row_array();
            $hargaProduct = $getDataProduct['price'];
            $totalTransaksi = $jumlahOrder*$hargaProduct;

            if(empty($idOrder) || empty($idAddress) || empty($idAgent) || empty($jumlahOrder) || empty($username) || empty($idProduct) || empty($tgl)){
                $this->response([
                    'message'   => "gagal"
                ],200); 
            }

            $insertOrder = $this->ModelOrders->insertDataOrder($idOrder,$username,$idAddress,$idAgent,$idProduct,$jumlahOrder,$totalTransaksi,$tgl);
            if($insertOrder)
            {
                $this->response([
                    'message'   => "Orderan diterima"
                ],200);
            }
            
        }

        public function changeEntity_post(){
            $entity = $this->post('entity');
            $rowProduct = $this->db->get('tb_product')->row_array();
            $harga = $rowProduct['price'];

            $totalHarga = $entity*$harga;
            $convert = number_format($totalHarga,2,",","."); 
            $this->response([
                'total' => $convert,
                'status'    => true
            ],200);

        }
        
    }