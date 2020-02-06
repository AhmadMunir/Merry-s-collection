<?php
  class Custom extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('user/M_registeruser');
      $this->load->model('user/mtr_custom');

      if($this->session->userdata('status') =="login"){

      }else {
        redirect(base_url('user/login'));
      }
    }

    public function index(){
      $this->load->view('home/custom');
    }

    public function cart_custom(){
      $id = $this->session->userdata('id');
      $data['cart'] = $this->mtr_custom->get_cart($id);
      $this->load->view('home/cart_custom',$data);
    }

    public function get_custom(){
      $id = $this->session->userdata('id');

      $cstm = $this->mtr_custom->get_cart($id);

      $custom = array();

      if (count($cstm)>0) {
        $status = 1;
        foreach ($cstm as $key) {
          $tgl=substr($key->tanggal, 0,-9);
          array_push($custom, array(
            'nama_barang' => $key->nama_barang,
            'deskripsi' => $key->deskripsi,
            'harga' => $key->harga,
            'tanggal' => $tgl,
          ));
        }
      }else {
        $status = 0;
      }

      echo json_encode(array('status'=> $status, 'custom'=>$custom));
    }

    public function get_address(){
      $id = $this->session->userdata('id');
      $where = array('id_user'=>$id);
      $address = $this->mtr_custom->cek_apa('tabel_alamat', $where);
      $add = array();

      if (count($address)>0) {
        $status = 1;

        foreach ($address as $key) {
          array_push($add, array(
            'alamat' => $key->alamat,
            'id_kota' => $key->id_kota,
            'kota' => $key->kota,
            'id_prov' => $key->id_prov,
            'provinsi' => $key->provinsi,
            'id_neg' => $key->id_neg,
            'negara' => $key->negara,
            'kode_pos' => $key->kode_pos,
          ));
        }
      }else {
        $status = 0;
      }

      echo json_encode(array('status' => $status, 'address'=>$add));
    }

  }

?>
