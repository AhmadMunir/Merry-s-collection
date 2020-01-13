<?php
  defined ('BASEPATH') OR exit('No direct script access allowed');

  class Gambar extends CI_Controller
  {
  	public function __construct()
  	{
  		parent::__construct();
  		$this->load->model("admin/gambar_model");
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
      $table = "tabel_gambar";

      $data['tabel_gambar'] = $this->gambar_model->getAll($where,$table)->result();
  		// $data["tabel_gambar"] = $this->gambar_model->getAll();
  		 $this->load->view("admin/barang/gambar_list",$data);
      // print_r($data);

  	}


  	 public function tambah()
   {

      $gambar = $this->gambar_model;
      $validation = $this->form_validation;
      $validation->set_rules($gambar->rules());

      if ($validation->run()){
        $gambar->save();
        $this->session->set_flashdata('success','Berhasil Disimpan');
        redirect(site_url("admin/barang"));
      }
      $data["tabel_barang"] =$gambar->getTambah();
      $this->load->view("admin/barang/tambah", $data);
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
        redirect(site_url("admin/gambar/index/$gambar->id_barang"));
  		}
  		$data["tabel_gambar"] = $gambar->getById($id);
  		if (!$data["tabel_gambar"]) show_404();

  		$this->load->view("admin/barang/gambar_edit",$data);
  	}

  }

 ?>
