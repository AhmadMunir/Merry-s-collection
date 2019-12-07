<?php
  class Transaksi extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('user/m_trans');
      if($this->session->userdata('status') =="login"){

      }else {
        redirect(base_url('user/login'));
      }

    }

    public function add_trans_cart(){

      $json = file_get_contents('php://input');

      $data = json_decode($json);
      // isi Transaksi
      $id_tr = $data->id;
      $trans = array(
        'id_transaksi' => $id_tr,
        'id_user' => $this->session->userdata('id'),
        'status' => 'Order Accepted',
        'alamat_pengiriman' => 'nulls'
      );

      // insert transaksi
      $this->m_trans->insert_trans('tabel_transaksi', $trans);
      echo 'transaksi masok';
      // get detail trans
      // $detail = $this->m_trans->get_detail(array('id_transaksi' => $id_tr));
      // // masukin detail transaksi
      // foreach ($variable as $key) {
      //   $det = array(
      //     'id_detail_transaksi' => $key->id_detail_temp_transaksi,
      //     ''
      //   )
      // }
      // $id_user = $this->session->userdata('id');
      //
      // $where = array(
      //   'id_transaksi' => $id,
      //   'id_user' => $id_user,
      //   'total' => $total,
      //   'status' => 'Pesanan Di Terima',
      //   'alamat pengiriman' => $alamat
      // );
      //
      // $this->m_transaksi->insert_trans();
      // echo "transaksi masuk";
      // echo $data->id;
    }
  }
 ?>
