<?php
  class Home extends CI_Controller{
    public function __construct(){
      parent::__construct();
       // if($this->session->userdata('status') != "login"){

       //       redirect(base_url("login"));
       //   }else{
       //        if($this->session->userdata('tabel_admin') != "username"){
       //           echo"anda bukan admin";
       //           redirect(base_url("login"));
       //       }
       //   }
    }

    public function index(){
      $this->load->view('admin/home.php');
    }
  }
 ?>
