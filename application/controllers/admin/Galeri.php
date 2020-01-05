<?php
  defined ('BASEPATH') OR exit('No direct script access allowed');

  class Galeri extends CI_Controller
  {
  	public function __construct()
  	{
  		parent::__construct();
  		$this->load->model("admin/galeri_model");
  		$this->load->library('form_validation');
  	}

  	public function index()
  	{
  		$data["tabel_galeri"] = $this->galeri_model->getAll();
  		$this->load->view("admin/galeri/list",$data);

  	}
    
  	 public function add()
   {
      $galeri = $this->galeri_model;
      $validation = $this->form_validation;
      $validation->set_rules($galeri->rules());

      if ($validation->run()){
        $galeri->save();
        $this->session->set_flashdata('success','Berhasil Disimpan');
        redirect(site_url("admin/galeri"));
      }
      
      $this->load->view("admin/galeri/new_form");
    }
  	public function edit($id = null)
  	{
  		if (!isset($id)) redirect('admin/galeri');
  		$galeri = $this->galeri_model;
  		$validation = $this->form_validation;
  		$validation->set_rules($galeri->rules());

  		if ($validation->run()){
  			$galeri->update();
  			$this->session->set_flashdata('success','Berhasil Disimpan');
        redirect(site_url("admin/galeri"));
  		}
  		$data["tabel_galeri"] = $galeri->getById($id);
  		if (!$data["tabel_galeri"]) show_404();

  		$this->load->view("admin/galeri/edit_form",$data);
  	}

  	public function delete($id=null)
  	{
  		if (!isset($id)) show_404();

  		if ($this->galeri_model->delete($id)) {
        redirect(site_url('admin/galeri'));
  		}
  	}
  }

 ?>
