<?php
  defined ('BASEPATH') OR exit('No direct script access allowed');

  class Stok extends CI_Controller
  {
  	public function __construct()
  	{
  		parent::__construct();
  		$this->load->model("admin/stok_model");
  		$this->load->library('form_validation');
  	}

  	public function index()
  	{
      $id = $this->uri->segment('4');
      $where = array('id_barang'=> $id);
      $table = "tabel_detail_stok";

      $data['tabel_detail_stok'] = $this->stok_model->getAll($where,$table)->result();
  		// $data["tabel_stok"] = $this->stok_model->getAll();
  		 $this->load->view("admin/barang/stok_list",$data);
      // print_r($data);

  	}
    
    
  	public function edit($id = null)

  	{
  		if (!isset($id)) redirect('admin/stok');
  		$stok = $this->stok_model;
  		$validation = $this->form_validation;
  		$validation->set_rules($stok->rules());

  		if ($validation->run()){
  			$stok->update();
  			$this->session->set_flashdata('success','Berhasil Disimpan');
        redirect(site_url("admin/stok/index/$stok->id_barang"));
  		}
  		$data["tabel_stok"] = $stok->getById($id);
  		if (!$data["tabel_stok"]) show_404();

  		$this->load->view("admin/barang/stok_edit",$data);
  	}

    // public function delete($id=null)
    // {
    //   if (!isset($id)) show_404();

    //   if ($this->stok_model->delete($id)) {
    //     redirect(site_url('admin/stok/index/$stok->id_barang'));
    //   }
    // }
    public function delete($id=null)
    {
      if (!isset($id)) show_404();

      if ($this->stok_model->delete($id)) {
        redirect(site_url('admin/barang'));
      }
    }

  }

 ?>
