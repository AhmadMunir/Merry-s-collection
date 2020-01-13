<?php
  class Custom extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('user/M_registeruser');

      if($this->session->userdata('status') =="login"){

      }else {
        redirect(base_url('user/login'));
      }
    }

    public function index(){
      $this->load->view('home/custom');
    }

  }

?>
