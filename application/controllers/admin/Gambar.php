<?php
  defined ('BASEPATH') OR exit('No direct script access allowed');

  class Gambar extends CI_Controller
  {
  	public function __construct()
  	{
  		parent::__construct();
  		$this->load->model("admin/gambar_model");
  		$this->load->library('form_validation');
  	}

  	public function index()
  	{
  		$data["tabel_galeri"] = $this->gambar_model->getAll();
  		$this->load->view("admin/gambar/list",$data);

  	}

  	public function add()
  	{
  		$gambar = $this->gambar_model;
  		$validation = $this->form_validation;
  		$validation->set_rules($gambar->rules());

  		if ($validation->run()){
  			$gambar->save();
  			$this->session->set_flashdata('success','Berhasil Disimpan');
         redirect(site_url("admin/gambar"));
  		}

  		$this->load->view("admin/gambar/new_form");

  	}
  	public function edit($id = null)
  	{
  		if (!isset($id)) redirect('admin/gambar');
  		$gambar = $this->gambar_model;
  		$validation = $this->form_validation;
  		$validation->set_rules($gambar->rules());

  		if ($validation->run()){
  			$gambar->update();
  			$this->session->set_flashdata('success','Berhasil Disimpan');
        redirect(site_url("admin/gambar"));
  		}

  		$data["tabel_galeri"] = $gambar->getById($id);
  		if (!$data["tabel_galeri"]) show_404();

  		$this->load->view("admin/gambar/edit_form",$data);
  	}

  	public function delete($id=null)
  	{
  		if (!isset($id)) show_404();

  		if ($this->gambar_model->delete($id)) {
        redirect(site_url('admin/gambar'));
  		}
  	}
  }

 ?>
