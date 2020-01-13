<?php
  defined ('BASEPATH') OR exit('No direct script access allowed');

  class pelanggan extends CI_Controller
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
      $id = $this->uri->segment('4');
      $where = array('id_barang'=> $id);
      $table = "tabel__pelanggan";

      $data['tabel__pelanggan'] = $this->pelanggan_model->getAll($where,$table)->result();
  		// $data["tabel_pelanggan"] = $this->pelanggan_model->getAll();
  		 $this->load->view("admin/barang/pelanggan_list",$data);
      // print_r($data);

  	}

    public function pelanggan()
    {
      $id = $this->uri->segment('4');
      $where = array('id_barang'=> $id);
      $table = "tabel__pelanggan";

      $data['tabel__pelanggan'] = $this->pelanggan_model->getAll($where,$table)->result();
      // $data["tabel_pelanggan"] = $this->pelanggan_model->getAll();
       $this->load->view("admin/barang/pelanggan_list",$data);
      // print_r($data);

    }

  }

 ?>
