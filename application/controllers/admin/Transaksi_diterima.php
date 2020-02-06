<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transaksi_diterima extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Transaksi_diterima_model');
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

  function index()
  {
    // $data["view_transaksi"] = $this->Transaksi_diterima_model->getAll();
    //   $this->load->view("admin/transaksi_diterima/list",$data);
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    if ($bulan  == null && $tahun == null) {
      $data['transaksi_diterima'] = $this->Transaksi_diterima_model->getview_transaksi();
      # code...
    }else{
      $data['transaksi_diterima'] = $this->Transaksi_diterima_model->getview_transaksi_bulan($bulan,$tahun);

    }
    $data['transaksi'] = $this->Transaksi_diterima_model->getdate_year();
    $this->load->view('admin/transaksi_diterima/list',$data);

  }

  public function edit($id = null)
    {
      if (!isset($id)) redirect('admin/transaksi_diterima');
      $transaksi_diterima = $this->Transaksi_diterima_model;
      $validation = $this->form_validation;
      $validation->set_rules($transaksi_diterima->rules());

      if ($validation->run()){
        $transaksi_diterima->update();
        $this->session->set_flashdata('success','Berhasil Disimpan');
        redirect(site_url("admin/transaksi_diterima"));
      }
      $data["tabel_transaksi"] = $transaksi_diterima->getById($id);
      if (!$data["tabel_transaksi"]) show_404();

      $this->load->view("admin/transaksi_diterima/edit_form",$data);
    }

  // public function delete($id=null)
  //   {
  //     if (!isset($id)) show_404();

  //     if ($this->Transaksi_diterima_model->delete($id)) {
  //       redirect(site_url('admin/transaksi_diterima'));
  //     }
  //   }
}
?>
