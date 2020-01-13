<?php
  class Home extends CI_Controller{
    public function __construct(){
      parent::__construct();
          $this->load->model('m_login');
       if($this->session->userdata('status') != "login"){

             redirect(base_url("login"));
         }else{
           $where = array(
             'username' => $this->session->userdata('nama'));
           // $cekadmin2 = $this->m_login->cek_user("tabel_admin", $where)->result();
           $cekadmin = $this->m_login->cek_user("tabel_admin", $where)->num_rows();
           // echo $cekadmin;
              if($cekadmin <=0){
                 // echo"anda bukan admin";
                 redirect(base_url("login"));
             }
         }
    }

    public function index(){
      $this->load->view('admin/home.php');
    }
  }
 ?>
