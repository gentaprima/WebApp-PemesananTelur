<?php 

    class Users extends CI_Controller{

        public function __construct()
        {   
            parent::__construct();
            $this->load->library('session');
            $this->load->model('ModelUsers');
        }

        public function forget_password(){
            $this->load->view('login/forget_password');
        }

        public function resetPassword(){
            $email = htmlspecialchars($_POST['email']);
            $token = base64_encode(random_bytes(32));
            $header = "RESET PASSWORD";
            if($email == null){
                $this->session->set_flashdata('title',"Warning !");
                $this->session->set_flashdata('text',"email tidak boleh kosong");
                $this->session->set_flashdata('icon',"warning");
                redirect(base_url().'users/forget_password/');
            }

            $cekUsers = $this->db->get_where('tb_users',array('email'=> $email))->row_array();
            if($cekUsers == null){
                $this->session->set_flashdata('title',"Warning !");
                $this->session->set_flashdata('text',"Email tidak terdaftar");
                $this->session->set_flashdata('icon',"warning");
                redirect(base_url().'users/forget_password/');
            }

            $sendEmail = $this->_sendEmail($email,$token,$header);
            if($sendEmail == true){
                $this->ModelUsers->insertToken($email,$token);
                $this->session->set_flashdata('title',"Success !");
                $this->session->set_flashdata('text',"Silahkan Cek Email untuk Reset Password");
                $this->session->set_flashdata('icon',"success");
                redirect(base_url().'users/forget_password/');
            }

        }

        public function reset_password(){
            $email = $_GET['email'];
            $token = $_GET['token'];

            $cekToken = $this->db->get_where('user_token',array('email' => $email,'token'=>$token))->row_array();
            if($email == null || $token == null){
                redirect(base_url().'users/forget_password/');
            }
            
            if($cekToken == null){
                $this->session->set_flashdata('title',"Warning !");
                $this->session->set_flashdata('text',"Token tidak valid !");
                $this->session->set_flashdata('icon',"warning");
                redirect(base_url().'users/forget_password/');
            }


            $this->load->view('login/reset_password');
        }

        public function changePassword(){
            $email = $_POST['email'];
            $token = $_POST['token'];
            $newPassword = htmlspecialchars($_POST['password']);
            $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
            if($newPassword == null){
                $this->session->set_flashdata('title',"Warning !");
                $this->session->set_flashdata('text',"Password baru tidak boleh kosong !");
                $this->session->set_flashdata('icon',"warning");
                redirect(base_url().'users/reset_password?email='.$email.'&token='.urlencode($token).'');
            }

            if($confirmPassword == null){
                $this->session->set_flashdata('title',"Warning !");
                $this->session->set_flashdata('text',"Konfirmas Password baru tidak boleh kosong !");
                $this->session->set_flashdata('icon',"warning");
                redirect(base_url().'users/reset_password?email='.$email.'&token='.urlencode($token).'');
            }

            if($confirmPassword != $newPassword){
                $this->session->set_flashdata('title',"Warning !");
                $this->session->set_flashdata('text',"Konfirmasi Password tidak sama !");
                $this->session->set_flashdata('icon',"warning");
                redirect(base_url().'users/reset_password?email='.$email.'&token='.urlencode($token).'');
            }

            $cekToken = $this->db->get_where('user_token',array('email' => $email,'token'=>$token))->row_array();
            if($email == null || $token == null){
                redirect(base_url().'users/reset_password/');
            }
            
            if($cekToken == null){
                $this->session->set_flashdata('title',"Warning !");
                $this->session->set_flashdata('text',"Token tidak valid !");
                $this->session->set_flashdata('icon',"warning");
                redirect(base_url().'users/reset_password/');
            }
            $this->ModelUsers->changePassword($email,$newPassword);
            $this->session->set_flashdata('title',"Success !");
            $this->session->set_flashdata('text',"Reset Password Sukses, Silahkan Login");
            $this->session->set_flashdata('icon',"success");
            redirect(base_url());

        }

        public function _sendEmail($email,$token,$header){
            $this->load->library('email');
            $data['token'] = $token;
            $data['header'] = $header;
            $data['link'] = base_url().'users/reset_password?email='.$email.'&token='.urlencode($token).'';
            $message = $this->load->view('email/email_password',$data,true);
            $config = [
                'protocol'  => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_user' => 'webzakat1122@gmail.com',
                'smtp_pass' => 'Webzakat123',
                'smtp_port' => 465,
                'mailtype' => 'html',
                'charset'   => 'utf-8',
                'newline'   => "\r\n" 
            ];
            $this->email->initialize($config);
            $this->email->from('AdminPTMoeladi@gmail.com','PT MOELADI PETERNAKAN');
            $this->email->to($email);
            $this->email->subject($header);
            $this->email->message($message);
        
            if($this->email->send()){
                return true;
            }else{
                $this->session->set_flashdata('title',"Warning !");
                $this->session->set_flashdata('text',"Email gagal terkirim!");
                $this->session->set_flashdata('icon',"warning");
                redirect(base_url().'users/forget_password/');
            }
            

        }
    }