<?php
  class Cart extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('user/m_cart');
      if($this->session->userdata('status') =="login"){

      }else {
        redirect(base_url('user/login'));
      }
    }

    public function index(){
      $id = $this->session->userdata('id');
      $data['cart'] = $this->m_cart->get_cart($id);
      $this->load->view('home/cart', $data);
    }

    public function add_cart(){
      $id = $this->session->userdata('id');
      $id_barang = decrypt_url($this->input->post('id_barang'));
      $qty = $this->input->post('qty');


      if ($qty == null) {
        $qty = 1;
      }

      $this->load->helper('string');
      $id_temp_trans = random_string('alnum',5);
      $id_temp_detail_trans = random_string('alnum',5);

      $where_detail = array(
        'id_user' => $id,
        'id_barang' => $id_barang
      );
      // cek
      $cek_cart = $this->m_cart->cek_cart(array("id_user"=>$id));
      $get_cart = $this->m_cart->get_carts(array("id_user"=>$id));
      $cek = $this->m_cart->cek_detail($where_detail);
      $databarang = $this->m_cart->get_data_barang($id_barang);
      // $datatemp_trans = $this->m_cart->get_temp($id);

      foreach ($databarang as $kuy) {
        $harga = $kuy->harga;
      }

      $xcart = array(
        "id_transaksi" => $id_temp_trans,
        "id_user" => $id,
      );

      foreach ($get_cart as $koy) {
        $id_tr = $koy->id_transaksi;
      }
      //cart utama
      $cart = array(
        "id_detail_temp_transaksi" => $id_temp_detail_trans,
        "id_user" => $id,
        "id_transaksi" => $id_temp_trans,
        "id_barang" => $id_barang,
        "qty" => $qty,
        "subtotal" => $harga
      );
      //cart jika temp sudah ada
      $cart2 = array(
        "id_detail_temp_transaksi" => $id_temp_detail_trans,
        "id_user" => $id,
        "id_transaksi" => $id_tr,
        "id_barang" => $id_barang,
        "qty" => $qty,
        "subtotal" => $harga
      );
      if ($cek_cart>0) {
        echo "pesanan ada";
        if ($cek > 0) {
          // echo $cek;
          $qty1 = $this->m_cart->get_qty($where_detail);
            foreach ($qty1 as $key) {
              $qty2 = $key->qty;
            }
            $qty3 = $qty2+$qty;
            $subtotal = $qty3*$harga;

            $qty4 = array(
              "qty" => $qty3,
              "subtotal" => $subtotal
              );
            $this->m_cart->update_qty($where_detail, $qty4);
            echo "masuk";
        }else {
          echo "-masuk detail baru";
          $this->m_cart->insert_cart($cart2, 'tabel_temp_detail_transaksi');
          echo "asd";
          // echo $cek;
        }
      }else {
        echo "pesanan kosong";
        $this->m_cart->insert_cart($xcart, 'tabel_temp_transaksi');
        $this->m_cart->insert_cart($cart, 'tabel_temp_detail_transaksi');
        echo "string";
      }


    }

    public function delete(){
      $id = decrypt_url($this->input->post('id_temp_transaksi'));

      $where = array(
        'id_detail_temp_transaksi' => $id
      );
      $this->m_cart->delete($where);

      $idu = $this->session->userdata('id');
      $cart = $this->m_cart->get_cart($idu);

      $hasil = $this->load->view('home/tabel_cart', array('cart'=>$cart), true);

      $callback = array(
        'hasil' => $hasil
      );

      echo json_encode($callback);
    }
}
 ?>
