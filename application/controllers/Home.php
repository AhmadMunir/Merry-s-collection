<?php
  class Home extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('user/m_home');
    }

    public function index(){
      $data['new_arrival'] = $this->m_home->load_newarrival();
      $this->load->view('home/home',$data);
    }
  }

 ?>
