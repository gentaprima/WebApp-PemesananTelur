<?php 


use Restserver\Libraries\REST_Controller;
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/REST_Controller.php';

 class Courier extends CI_Controller{
    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }
     public function __construct()
     {
         parent::__construct();
         $this->__resTraitConstruct();
         $this->load->model('ModelCourier');
         $this->load->model("ModelUsers");
     }

     public function transaction_post(){
        $id_courier = $this->post('idCourier');
        if($id_courier != null){
            $getDataTransaction = $this->ModelCourier->getDataTransactionByCourier($id_courier);
            if($getDataTransaction != null){
                $this->response([
                    'data_transaksi'    => $getDataTransaction,
                    'status'            => true
                ],200);
            }
        }else{
            $this->response([
                'message'   => "Required ID Courier",
                'status'    => false
            ],200); 
        }
     }

     public function login_post(){
         $username  = $this->post("username");
         $password = $this->post("password");
         $getCourirData = $this->ModelUsers->getAllDataCourier($username,$password);

         if(empty($username)&& empty($password)){
            $this->response([
                'userdata'=>null,
                'status'=>false,
                'message'=>"Field Username dan password Belum Terisi"
             ]); 
         }else if(empty($username)){
            $this->response([
                'userdata'=>null,
                'status'=>false,
                'message'=>"Field Username Belum Terisi"
             ]);
         }else if(empty($password)){
            $this->response([
                'userdata'=>null,
                'status'=>false,
                'message'=>"Field Password Belum Terisi"
             ]);
        }
         
         if(!empty($username)&&!empty($password)){
         if($getCourirData !=null){
             $this->response([
                'userdata'=>$getCourirData,
                'status'=>true
             ]);
         }else{
             $this->response([
                 'userdata'=>null,
                 'status'=>false,
                 'message'=>"username dan password tidak sesuai"
             ]);
         }
        }
     }
 }