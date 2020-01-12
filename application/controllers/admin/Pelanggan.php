<?php
  defined ('BASEPATH') OR exit('No direct script access allowed');

  class pelanggan extends CI_Controller
  {
  	public function __construct()
  	{
  		parent::__construct();
  		$this->load->model("admin/pelanggan_model");
  		$this->load->library('form_validation');
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
