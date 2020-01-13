<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transaksi_dikirim extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('admin/Transaksi_dikirim_model');
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
      $data['transaksi_dikirim'] = $this->Transaksi_dikirim_model->getview_transaksi();
      # code...
    }else{
      $data['transaksi_dikirim'] = $this->Transaksi_dikirim_model->getview_transaksi_bulan($bulan,$tahun);

    }
    $data['transaksi'] = $this->Transaksi_dikirim_model->getdate_year();
    $this->load->view('admin/transaksi_dikirim/list',$data);

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
