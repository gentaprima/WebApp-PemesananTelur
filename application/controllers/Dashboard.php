<?php

    class Dashboard extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            if(!$this->session->userdata('login')){
                redirect(base_url());
            }
            $this->load->model('ModelOrders');
            $this->load->model('ModelCourier');
            $this->load->model('ModelProduct');
            $this->load->model('ModelTransaction');
            $this->load->model('ModelAgent');
            $this->load->model('ModelAddress');
            $this->load->model('ModelUsers');
        }

        public function index()
        {  
            $data['countOrders'] = $this->db->count_all_results('tb_order');
            $data['countAgent'] = $this->db->count_all_results('tb_agent');
            $data['countCourier'] = $this->db->count_all_results('tb_courier');
            $this->db->select_sum('total_transaksi');
            $data['sumOrders'] = $this->db->get('tb_transaksi')->row_array();
            $data['active_home'] = "active";
           // var_dump($data['sumOrders']);die;
            $this->load->view('layout/header');
            $this->load->view('layout/loader');
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar',$data);
            $this->load->view('layout/right_sidebar');
            $this->load->view('dashboard/index',$data);
            $this->load->view('layout/footer');
        }

        //PRODUCT

        public function list_product(){
            $data['active_product']   = "active";
            $data['product'] = $this->db->get('tb_product')->result_array();
            $this->load->view('layout/header');
            $this->load->view('layout/loader');
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar',$data);
            $this->load->view('layout/right_sidebar');
            $this->load->view('dashboard/pages/data_product',$data);
            $this->load->view('layout/footer_data');
        }

        public function insertProduct(){
            $idProduct = htmlspecialchars($_POST['id_product']);
            $productName = htmlspecialchars($_POST['product_name']);
            $desc = htmlspecialchars($_POST['desc']);
            $quality = htmlspecialchars($_POST['quality']);
            $price = htmlspecialchars($_POST['price']);

            if($idProduct != null || $productName != null || $desc != null || $quality != null || $price != null){
                $image = $this->_uploadImage();
                if($image != null){
                    $insertProduct = $this->ModelProduct->insertProduct($idProduct,$productName,$desc,$image,$quality,$price);
                    if($insertProduct){
                        $this->session->set_flashdata('title',"Success !");
                        $this->session->set_flashdata('text',"Data Product Berhasil ditambahkan");
                        $this->session->set_flashdata('icon',"success");
                        redirect(base_url().'dashboard/list_product/');
                    }
                }else{
                    $this->session->set_flashdata('title',"Warning !");
                    $this->session->set_flashdata('text',"Tolong Lengkapi field yang ada !");
                    $this->session->set_flashdata('icon',"warning");
                    redirect(base_url().'dashboard/list_product/');
                }
            }else{
                $this->session->set_flashdata('title',"Warning !");
                $this->session->set_flashdata('text',"Tolong Lengkapi field yang ada !");
                $this->session->set_flashdata('icon',"warning");
                redirect(base_url().'dashboard/list_product/');
            }
        }

        public function deleteProduct(){
            $idProduct = $this->uri->segment(3);
            if($idProduct != null){

                $cekIdInOrders = $this->db->get_where('tb_order',array('id_product' => $idProduct))->row_array();
                if($cekIdInOrders == null){
                    $this->ModelProduct->deleteProduct($idProduct);
                    $this->session->set_flashdata('title',"Success !");
                    $this->session->set_flashdata('text',"Data Product Berhasil dihapus");
                    $this->session->set_flashdata('icon',"success");
                    redirect(base_url().'dashboard/list_product/');
                }
            }else{
                $this->session->set_flashdata('title',"Warning !");
                $this->session->set_flashdata('text',"Product tidak dapat dihapus !");
                $this->session->set_flashdata('icon',"warning");
                redirect(base_url().'dashboard/list_product/');
            }
        }

        public function updateProduct(){
            $idProduct = htmlspecialchars($_POST['id_product']);
            $productName = htmlspecialchars($_POST['product_name']);
            $desc = htmlspecialchars($_POST['desc']);
            $quality = htmlspecialchars($_POST['quality']);
            $price = htmlspecialchars($_POST['price']);
            $image = $this->_uploadImage();
            $getDataProduct = $this->db->get_where('tb_product',array('id_product'  => $idProduct))->row_array();

            if($productName == null){
                $productName = $getDataProduct['product_name'];
            }

            if($desc == null){
                $desc = $getDataProduct['description'];
            }

            if($quality == null){
                $quality = $getDataProduct['quality'];
            }

            if($price == null){
                $price = $getDataProduct['price'];
            }

            if($image == null){
                $image = $getDataProduct['image'];
            }

            $updateProduct = $this->ModelProduct->updateDataProduct($idProduct,$productName,$desc,$image,$quality,$price);
            $this->session->set_flashdata('title',"Success !");
            $this->session->set_flashdata('text',"Data Product Berhasil diperbarui !");
            $this->session->set_flashdata('icon',"success");
            redirect(base_url().'dashboard/list_product/');
        }

        //PRODUCT

        public function _uploadImage(){
            $config['upload_path'] = "./assets/dashboard/image/";
            $config['allowed_types'] = 'gif|jpg|png|jpeg|';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            if($this->upload->do_upload('photo')){
                $data = array('upload_data' => $this->upload->data());
                $image = $data['upload_data']['file_name'];
                return $image;
            }
        }

        //AGENT

        public function list_agent()
        {
            $data['active_agent']   = "active";
            $data['agent']  = $this->ModelAgent->getDataAgent();
            $this->load->view('layout/header');
            $this->load->view('layout/loader');
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar',$data);
            $this->load->view('layout/right_sidebar');
            $this->load->view('dashboard/pages/data_agent',$data);
            $this->load->view('layout/footer_data');
        }

        public function deleteAgent(){
            $username = $this->uri->segment(3);
            $cekUserInOrder = $this->db->get_where("tb_order",array("username" => $username))->row_array();
            if($cekUserInOrder == null){
                $this->ModelAgent->deleteAgent($username);
                $this->ModelAddress->deleteAddress($username);
                $this->ModelUsers->deleteUsers($username);
                $this->session->set_flashdata('title',"Success !");
                $this->session->set_flashdata('text',"Data Agent berhasil di Hapus");
                $this->session->set_flashdata('icon',"success");
                redirect(base_url().'dashboard/list_agent/');
            }else{
                $this->session->set_flashdata('title',"Warning !");
                $this->session->set_flashdata('text',"Data Agent Tidak dapat dihapus");
                $this->session->set_flashdata('icon',"warning");
                redirect(base_url().'dashboard/list_agent/');
            }
        }

        //AGENT

        //ORDERS

        public function list_order(){
            $data['product'] = $this->ModelProduct->getDataProduct();
            $data['order'] = $this->ModelOrders->getDataOrder();
            $data['courier'] = $this->ModelCourier->getDataCourier();
            $this->load->view('layout/header');
            $this->load->view('layout/loader');
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('layout/right_sidebar');
            $this->load->view('dashboard/pages/data_orders',$data);
            $this->load->view('layout/footer_data');
        }

        public function prosesInsert(){
            $id_transaksi = htmlspecialchars($_POST['id_transaksi']);
            $id_order = htmlspecialchars($_POST['id_order']);
            $id_courier = htmlspecialchars($_POST['id_courier']);
            $tgl = date('Y-m-d');
            $status = 1;
            $total = htmlspecialchars($_POST['total']);
            
            

            if(empty($id_courier) || empty($id_order) || empty($tgl) || empty($status) || empty($total)){
                $this->session->set_flashdata('title',"Warning !");
                $this->session->set_flashdata('text',"Field tidak boleh kosong");
                $this->session->set_flashdata('icon',"warning");
                redirect(base_url().'dashboard/list_order/');
            }

            $insertOrder = $this->ModelCourier->insertOrder($id_transaksi,$id_order,$id_courier,$total,$tgl,$status);
            if($insertOrder){
                $this->ModelOrders->changeStatusOrders($id_order);
                $this->session->set_flashdata('title',"Success !");
                $this->session->set_flashdata('text',"Data Order berhasil di konfirmasi");
                $this->session->set_flashdata('icon',"success");
                redirect(base_url().'dashboard/list_order/');
            }
        }

        public function updateOrder(){
            $id_order = htmlspecialchars($_POST['id_order']);
            $entity = htmlspecialchars($_POST['entity']);
            $id_product = htmlspecialchars($_POST['id_product']);
            $getDataProduct = $this->db->get_where('tb_product',array('id_product'=>$id_product))->row_array();
            $hargaProduct = $getDataProduct['price'];
            $totalHarga = $hargaProduct*$entity;
            

            if(empty($id_order) || empty($entity) || empty($id_product)){
                $this->session->set_flashdata('title',"Warning !");
                $this->session->set_flashdata('text',"Field tidak boleh kosong");
                $this->session->set_flashdata('icon',"warning");
                redirect(base_url().'dashboard/list_order/');
            }

            $updateTotalOrder = $this->ModelOrders->updateTotalPrice($id_order,$entity,$id_product,$totalHarga);
            if($updateTotalOrder){
                $this->session->set_flashdata('title',"Success !");
                $this->session->set_flashdata('text',"Data Order berhasil di Perbarui");
                $this->session->set_flashdata('icon',"success");
                redirect(base_url().'dashboard/list_order/');
            }


        }

        //ORDERS

        public function list_transaksi(){
            $data['transaksi']  = $this->ModelTransaction->getDataTransaction();
            $this->load->view('layout/header');
            $this->load->view('layout/loader');
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('layout/right_sidebar');
            $this->load->view('dashboard/pages/data_transaction',$data);
            $this->load->view('layout/footer_data');
        }

        public function list_kurir(){
            $data['active_courier'] = "active";
            $data['courier']  = $this->ModelCourier->getAlldataCourier();
            $this->load->view('layout/header');
            $this->load->view('layout/loader');
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar',$data);
            $this->load->view('layout/right_sidebar');
            $this->load->view('dashboard/pages/data_courier',$data);
            $this->load->view('layout/footer_data');
        }


    }