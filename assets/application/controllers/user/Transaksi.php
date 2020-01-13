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

    public function index(){
      $where = array(
        'id_user'=>$this->session->userdata('id')
      );
      $data['trans'] = $this->m_trans->get_transaksi($where);

      $this->load->view('home/history_trans',$data);
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
      $del = array(
        'id_transaksi' => $id_tr
      );

      // insert transaksi
      $this->m_trans->insert_trans('tabel_transaksi', $trans);
      echo 'transaksi masok';
      $this->m_trans->delete_temp($del);
      echo "/ temp terhapus";
    }
    public function get_transaksi(){
      $where = array(
        'id_user'=>$this->session->userdata('id')
      );
      $data = $this->m_trans->get_transaksi($where);

      echo json_encode($data);
    }

    public function get_detail(){
      $id_tr= $this->input->post('id');
      $where = array('id_transaksi' => $id_tr);
      $data = $this->m_trans->get_sembarang('view_detail_transaksi',$where);

      $detail = array();

      foreach ($data as $kuy) {
        array_push($detail,
          array(
            'nama_barang' => $kuy->nama_barang.' - '.$kuy->size,
            'qty'=>$kuy->qty,
            'tax'=>$kuy->tax,
            'subtotal'=>$kuy->subtotal
          )
        );
      }

      echo json_encode($detail);
    }
  }
 ?>
