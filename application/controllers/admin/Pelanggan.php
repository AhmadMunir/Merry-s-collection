<?php
  defined ('BASEPATH') OR exit('No direct script access allowed');

  class Pelanggan extends CI_Controller
  {
  	public function __construct()
  	{
  		parent::__construct();
  		$this->load->model("admin/pelanggan_model");
  		$this->load->library('form_validation');
  	}

  	public function index()
  	{
      $data["tabel_user"] = $this->pelanggan_model->getAll();
      $this->load->view("admin/pelanggan/list",$data);
    }

    public function user()
    {
      $id = $this->uri->segment('4');
      $where = array('id_user'=> $id);
      $table = "view_detail_transaksi";

      $data['view_detail_transaksi'] = $this->pelanggan_model->getSemua($where,$table)->result();
      // $data["tabel_user"] = $this->user_model->getAll();
       $this->load->view("admin/pelanggan/detail_pelanggan",$data);
      // print_r($data);

    }
    
  }

 ?>
