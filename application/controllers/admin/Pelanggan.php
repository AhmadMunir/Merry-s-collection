<?php
  defined ('BASEPATH') OR exit('No direct script access allowed');

  class Pelanggan extends CI_Controller
  {
  	public function __construct()
  	{
  		parent::__construct();
  		$this->load->model("admin/pelanggan_model");
  		$this->load->library('form_validation');

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

  	public function index()
  	{
      $data["tabel_user"] = $this->pelanggan_model->getAll();
      $this->load->view("admin/pelanggan/list",$data);
    }

  	

    public function pelanggan()
    {
      $id = $this->uri->segment('5');
      $where = array('id_user'=> $id);
      $table = "view_detail_transaksi";

      $data['view_detail_transaksi'] = $this->pelanggan_model->getSemua($where,$table)->result();
      // $data["tabel_user"] = $this->user_model->getAll();
       $this->load->view("admin/pelanggan/detail_pelanggan",$data);
      // print_r($data);

    }

  }

 ?>
