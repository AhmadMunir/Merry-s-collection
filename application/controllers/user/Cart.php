<?php
  class Cart extends CI_Controller{
    public function __construct(){
      parent::__construct();
      // $this->load->model('user/about');
      if($this->session->userdata('status') =="login"){

      }else {
        redirect(base_url('user/login'));
      }
    }

    public function add_cart($id){
      $this->load->view('home/contact');
    }
}
 ?>
