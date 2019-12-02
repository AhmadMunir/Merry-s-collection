<?php
  class Cart extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('user/m_cart');
      if($this->session->userdata('status') =="login"){

      }else {
        redirect(base_url('user/login'));
      }
    }

    public function add_transaksi(){
      
    }
  }
 ?>
