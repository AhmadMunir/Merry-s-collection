<?php
  defined ('BASEPATH') OR exit('No direct script access allowed');

  class Barang extends CI_Controller
  {
  	public function __construct()
  	{
  		parent::__construct();
  		$this->load->model("admin/barang_model");
  		$this->load->library('form_validation');
   //    $this->load->model('m_login');
   // if($this->session->userdata('status') != "login"){
   //
   //       redirect(base_url("login"));
   //   }else{
   //     $where = array(
   //       'username' => $this->session->userdata('nama'));
   //     // $cekadmin2 = $this->m_login->cek_user("tabel_admin", $where)->result();
   //     $cekadmin = $this->m_login->cek_user("tabel_admin", $where)->num_rows();
   //     // echo $cekadmin;
   //        if($cekadmin <=0){
   //           // echo"anda bukan admin";
   //           redirect(base_url("login"));
   //       }
   //   }
  	}

  	public function index()
  	{
  		$data["tabel_barang"] = $this->barang_model->getAll();
  		$this->load->view("admin/barang/list",$data);

  	}

  	public function add()
  	{
  		$barang = $this->barang_model;
  		$validation = $this->form_validation;
  		$validation->set_rules($barang->rules());

  		if ($validation->run()){
  			$barang->save();
  			$this->session->set_flashdata('success','Berhasil Disimpan');
        redirect(site_url("admin/gambar/tambah"));
        // echo json_encode($data);
  		}
      $data["tabel_kategori"] =$barang->getKat();

  		$this->load->view("admin/barang/new_form", $data);

  	}
  	public function edit($id = null)
  	{
  		if (!isset($id)) redirect('admin/barang');
  		$barang = $this->barang_model;
  		$validation = $this->form_validation;
  		$validation->set_rules($barang->rules());

  		if ($validation->run()){
  			$barang->update();
  			$this->session->set_flashdata('success','Berhasil Disimpan');
        redirect(site_url("admin/gambar/index/$barang->id_barang"));
  		}
      $data["tabel_kategori"] =$barang->getKat();
  		$data["tabel_barang"] = $barang->getById($id);
  		if (!$data["tabel_barang"]) show_404();

  		$this->load->view("admin/barang/edit_form",$data);
  	}



  	public function delete($id=null)
  	{
  		if (!isset($id)) show_404();

  		if ($this->barang_model->delete($id)) {
        redirect(site_url('admin/barang'));
  		}
  	}

    public function detail(){
      $id_barang = $this->input->post('id_barang');

      $where = array('id_barang' => $id_barang);
      $detail = $this->barang_model->detail($where);

      $gambar = $this->barang_model->gambar($where);
      $stok = $this->barang_model->stok($where);

      echo json_encode(array('detail'=>$detail,
                              'gambar'=>$gambar,
                              'stok'=>$stok));
    }
  }

 ?>
