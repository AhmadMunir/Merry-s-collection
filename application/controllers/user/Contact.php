<?php
  class Contact extends CI_Controller{
    public function __construct(){
      parent::__construct();
      // $this->load->model('user/about');
    }

    public function index(){
      $this->load->view('home/contact');
    }
}
 ?>
