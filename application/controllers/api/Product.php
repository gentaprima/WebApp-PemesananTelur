<?php

use Restserver\Libraries\REST_Controller;
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/REST_Controller.php';
    class Product extends CI_Controller{

        use REST_Controller {
            REST_Controller::__construct as private __resTraitConstruct;
        }

        public function __construct()
        {
            parent::__construct();
            $this->load->model('ModelProduct');
            $this->__resTraitConstruct();
        }

        public function index_get()
        {
            $id = "";

            if($id == null)
            {
                $getDataProduct = $this->ModelProduct->getDataProduct();
                $this->response([
                    'message' => "Success",
                    'data_product' => $getDataProduct
                ],200);
            }else{

            }
        }

    }