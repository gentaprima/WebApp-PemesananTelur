<?php 

use Restserver\Libraries\REST_Controller;
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/REST_Controller.php';
    Class Transaction extends CI_Controller{

        use REST_Controller {
            REST_Controller::__construct as private __resTraitConstruct;
        }

        public function __construct()
        {
            parent::__construct();   
            $this->__resTraitConstruct(); 
            $this->load->model('ModelTransaction');
            $this->load->model('ModelOrders');
        }

        public function index_post(){
            $username = $this->post('username');
            if($username != null){
                $getData = $this->ModelTransaction->getDataByUsername($username);
                $getDataOrder = $this->ModelOrders->getDataOrderByUsername($username);
                $rowData = count($getData);
                if($getData != null){
                    $this->response([
                        'data_transaksi'  => $getData,
                        'data_order'    => $getDataOrder,
                        'status'    => true,
                        'count' => $rowData
                    ],200);
                }else if($getData == null && $getDataOrder == null){
                    $this->response([
                        'count'  => 0,
                        'status'    =>true
                    ],200);
                }else{
                    $rowOrder = count($getDataOrder);
                    $this->response([
                        'data_transaksi'    => null,
                        'data_order'   => $getDataOrder,
                        'status'    => true,
                        'count'     => $rowOrder
                    ],200);
                }
            }else{
                $this->response([
                    'message'   => "gagal",
                    'status'    => false
                ],200);
            }
        }

        public function changestatus_post(){
            $idTransaksi = $this->post('id_transaksi');
            $statusOrder = $this->post('status_order');
            $tgl = date('Y-m-d');

            if($idTransaksi == null || $statusOrder == null){
                $this->response([
                    'message'   => "failed",
                    'status'    => false
                ],200);
            }

            $changeStatus = $this->ModelTransaction->changeStatusTransaction($idTransaksi,$statusOrder,$tgl);
            $this->response([
                'message'   => "Update Status Sukses",
                'status'    => true
            ],200);
        }
    }