<?php
  class Galeri extends CI_Controller{
    public function __construct(){
      parent::__construct();
      //$this->load->model('user/galeri');
    }

    public function index(){
      //$data['banner'] = $this->m_home->load_banner();
      $this->load->view('home/galeri');
    }
}
 ?>
