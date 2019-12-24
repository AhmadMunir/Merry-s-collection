<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller
{
 
  function __construct()
  {
    parent::__construct();    
    $this->load->model('admin/laporan_model');
  $this->load->library('form_validation');
  }
 
  function index()
  {
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    if ($bulan  == null && $tahun == null) {
      $data['laporan'] = $this->laporan_model->getlaporan_transaksi();
      # code...
    }else{
      $data['laporan'] = $this->laporan_model->getlaporan_transaksi_bulan($bulan,$tahun);
      
    }
    $data['transaksi'] = $this->laporan_model->getdate_year();
    $this->load->view('admin/laporan/list',$data);

  }
}
?>