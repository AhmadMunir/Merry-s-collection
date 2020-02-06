<?php
  class Home extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('user/m_home');
    }

    public function index(){
      $data['banner'] = $this->m_home->load_banner();
      $data['new_arrival'] = $this->m_home->load_newarrival();
      $data['prod'] = $this->m_home->load_prod();
      $data['most_wanted'] = $this->m_home->load_mostwanted();
      $this->load->view('home/home',$data);
    }

    public function cek_qty(){
      $id_stok = $this->input->post('id_stok');
      $where = array('id_detail_stok' => $id_stok);

      $stok = $this->m_home->cek('tabel_detail_stok', $where);

      echo json_encode($stok);
    }

    public function get_newarrival(){
      $data = $this->m_home->load_newarrival();

      if (count($data) > 0) {
        $status = 'sukses';
      }else {
        $status = 'gagal';
      }
      echo json_encode(array('status'=>$status, 'data'=>$data));
    }
  }

 ?>
