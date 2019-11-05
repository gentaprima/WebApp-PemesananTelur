<?php

    class Login extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            $this->load->model('ModelUsers');
            
        }

        public function index()
        {
            if($this->session->userdata('login')){
                redirect(base_url().'dashboard/');
            }
            $this->load->view('login/index');
        }

        public function prosesLogin()
        {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars(($_POST['password']));

            if(empty($username)){
                $this->session->set_flashdata('title',"Warning !");
                $this->session->set_flashdata('text',"Username tidak boleh kosong");
                $this->session->set_flashdata('icon',"warning");
            }

            if(empty($password)){
                $this->session->set_flashdata('title',"Warning !");
                $this->session->set_flashdata('text',"Password tidak boleh kosong");
                $this->session->set_flashdata('icon',"warning");
            }

            $cekUsername = $this->ModelUsers->verifyUsername($username);
            if($cekUsername == null){
                $this->session->set_flashdata('title',"Warning !");
                $this->session->set_flashdata('text',"Username tidak ditemukan");
                $this->session->set_flashdata('icon',"warning");
                redirect(base_url());
            }

            if(md5($password) != $cekUsername['password']){
                $this->session->set_flashdata('title',"Warning !");
                $this->session->set_flashdata('text',"Username atau password tidak benar");
                $this->session->set_flashdata('icon',"warning");
                redirect(base_url());
            }else{
                $this->session->set_userdata('user_id',$cekUsername['username']);
                $this->session->set_userdata('email',$cekUsername['email']);
                $this->session->set_userdata('login',true);
                redirect(base_url().'dashboard/');
            }
        }

        public function logout(){
            $this->session->sess_destroy();
            redirect(base_url());
        }

    }