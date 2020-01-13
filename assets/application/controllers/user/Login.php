<?php
  class Login extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('user/M_registeruser');
    }

    public function index(){
      $this->load->view('home/login');
    }

    public function checkUsernameonDB(){
      $username = $this->input->post("usr");
      $check_username = array(
        'username' =>  $username
      );

      $username_cek = $this->M_registeruser->check($check_username, 'tabel_user')->num_rows();
      $usrnm = "";

      if ($username_cek == 0) {
        $usrnm = "F";
      }else {
        $usrnm = "T";
      }

      $callback = array('usrname' => $usrnm);
      echo json_encode($callback);
    }

    public function checkEmailonDB(){
    $email = $this->input->post("eml");
      $check_email = array(
        'email' =>$email
      );

      $email_cek = $this->M_registeruser->check($check_email, 'tabel_user')->num_rows();
      $emil = "";

      if ($email_cek == 0) {
        $emil = "F";
      }else {
        $emil = "T";
      }

      $callback = array('email' => $emil);
      echo json_encode($callback);
    }

    function logout(){
     $this->session->sess_destroy();
     redirect(base_url('home'));
   }
  }

 ?>
