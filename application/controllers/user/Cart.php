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

    public function cek(){
      print_r($_SESSION['ship_session']);
    }

    public function index(){
      $_SESSION['ship_session'] = array(
        'cost' => null,
        'method' => null,
        'address_line_1' => null,
        'address_line_2' => null,
        'admin_area_2' => null,
        'admin_area_1' => null,
        'postal_code' => null,
        'country_code' => null,
      );
      $id = $this->session->userdata('id');
      $where = array(
        'id_user'=>$id
      );
      $data['alamt'] = $this->m_cart->cek_apa('tabel_alamat', $where);
      $this->load->view('home/cart', $data);
    }

    public function get_cart(){
      $id = $this->session->userdata('id');
      $data = $this->m_cart->get_cart($id);

      if (count($data) == 0) {
        $status = 'gagal';
      }else {
        $status = 'sukses';
      }


      echo json_encode(array('status'=>$status, 'data' => $data));
    }

    public function tax(){
      $id = $this->session->userdata('id');
      $data = $this->m_cart->get_cart($id);
      $tax = 0;
      foreach ($data as $tr) {
        $tix = number_format(floor(($tr->harga*0.029+0.30)*100)/100,2);
       $tax += $tix*$tr->qty;
      };
      // return number_format($tax,2);
      echo json_encode($tax);
    }

    public function add_cart(){
      $id = $this->session->userdata('id');
      $id_barang = decrypt_url($this->input->post('id'));
      $qty = $this->input->post('qty');


      if ($qty == null) {
        $qty = 1;
      }

      $this->load->helper('string');
      $id_temp_trans = random_string('alnum',5);
      $id_temp_detail_trans = random_string('alnum',5);

      $where_detail = array(
        'id_user' => $id,
        'id_barang' => $id_barang,

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
      $id_tr = '';

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
            $this->hitung_cart();
            echo "masuk";
        }else {
          echo "-masuk detail baru";
          $this->m_cart->insert_cart($cart2, 'tabel_temp_detail_transaksi');
          $this->hitung_cart();
          echo "asd";
          // echo $cek;
        }
      }else {
        echo "pesanan kosong";
        $this->m_cart->insert_cart($xcart, 'tabel_temp_transaksi');
        $this->m_cart->insert_cart($cart, 'tabel_temp_detail_transaksi');
        $this->hitung_cart();
        echo $id_barang;
      }


    }
    public function add_cart2(){
      $id = $this->session->userdata('id');
      $id_barang = $this->input->post('id');
      $qty = $this->input->post('qty');
      $size = $this->input->post('size');

      $id_tr ='';
      $stok ='';
      $siz = '';
      if ($qty == null) {
        $qty = 1;
      }

      $wheresize = array('id_detail_stok'=>$size);
      $ukuran = $this->m_cart->cek_apa('tabel_detail_stok', $wheresize);

      foreach ($ukuran as $detailstok) {
        $siz = $detailstok->size;
        $stok = $detailstok->jumlah_stok;
      }


      $this->load->helper('string');
      $id_temp_trans = random_string('alnum',5);
      $id_temp_detail_trans = random_string('alnum',5);

      $where_detail = array(
        'id_user' => $id,
        'id_barang' => $id_barang,
        'size'=>$siz
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

      //kurangistok
      $stokbaru = (int)$stok-$qty;

      //cart utama
      $cart = array(
        "id_detail_temp_transaksi" => $id_temp_detail_trans,
        "id_user" => $id,
        "id_transaksi" => $id_temp_trans,
        "id_barang" => $id_barang,
        "size" => $siz,
        "qty" => $qty,
        "subtotal" => $harga
      );
      //cart jika temp sudah ada
      $cart2 = array(
        "id_detail_temp_transaksi" => $id_temp_detail_trans,
        "id_user" => $id,
        "id_transaksi" => $id_tr,
        "id_barang" => $id_barang,
        "size" => $siz,
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
            $this->hitung_cart();
            echo "masuk";
        }else {
          echo "-masuk detail baru";
          $this->m_cart->insert_cart($cart2, 'tabel_temp_detail_transaksi');
          $this->hitung_cart();
          echo "asd";
          // echo $cek;
        }
      }else {
        echo "pesanan kosong";
        // echo $stokbaru;
        $this->m_cart->insert_cart($xcart, 'tabel_temp_transaksi');
        $this->m_cart->insert_cart($cart, 'tabel_temp_detail_transaksi');
        $this->hitung_cart();
        echo "string";
      }
      $this->m_cart->update_stok($stokbaru, $wheresize);


    }


    public function delete(){
        $id = $this->input->post('id');
      //
        $where = array(
          'id_detail_temp_transaksi' => $id
        );
        $this->m_cart->delete($where);
        $this->hitung_cart();
        echo "deleted";
        echo $id;
    }


    public function hitung_cart(){

      $id = $this->session->userdata('id');
      $where = array(
        'id_user' => $id
      );
      $data['itung_cart'] = $this->m_cart->itung_cart($where);

      $this->load->view('/vendor/autoload.php');
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
          );
          $pusher = new Pusher\Pusher(
            '47980f8443159a27e646',
            '70e4e200051728975830',
            '913455',
            $options
          );

          $data['status'] = 'success';
          $response = $pusher->trigger('notif-cart', 'my-event', $data);

      // echo $data['itung_cart'];

      // echo $pusher->get($resource, $params);
    }

}
 ?>
