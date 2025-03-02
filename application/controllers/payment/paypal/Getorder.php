<?php

// namespace Sample;

require __DIR__ . '/../../../../vendor/autoload.php';
//1. Import the PayPal SDK client that was created in `Set up Server-Side SDK`.
use Sample\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;

class Getorder extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->load->model('user/m_trans');
    $this->load->model('user/m_cart');
  }
  // 2. Set up your server to receive a call from the client
  /**
   *You can use this function to retrieve an order by passing order ID as an argument.
   */
  public static function get()
  {
    $json = file_get_contents('php://input');

    $data = json_decode($json);

    // isi Transaksi
    // id order
    $orderId = $data->orderID;
    // $orderId = $this->input->post('id');
    // $orderId = '1MT24436JG5332639';

    // 3. Call PayPal to get the transaction details
    $client = PayPalClient::client();
    $response = $client->execute(new OrdersGetRequest($orderId));
    /**
     *Enable the following line to print complete response as JSON.
     */
    // print json_encode($response->result);
    // print "Status Code: {$response->statusCode}\n";
    // print "Status: {$response->result->status}\n";
    // print "Order ID: {$response->result->id}\n";
    // print "Intent: {$response->result->intent}\n";
    // print "Links:\n";
    // foreach($response->result->links as $link)
    // {
    //   print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
    // }
    // 4. Save the transaction in your database. Implement logic to save transaction to your database for future reference.
    // print "Gross Amount: {$response->result->purchase_units[0]->amount->currency_code} {$response->result->purchase_units[0]->amount->value}\n";

    // To print the whole response body, uncomment the following line
     // echo json_encode($response->result, JSON_PRETTY_PRINT);
     $data = json_encode($response->result, JSON_PRETTY_PRINT);
     $order = json_decode($data, true);
     // print_r($order);
     // echo count($order['purchase_units'][0]['items']);
       $stok ='';
     // shipping method
     $mtd = $_SESSION['ship_session']['method'];
     $method = explode('-',$mtd);

     // print_r($order['purchase_units'][0]['payments']['captures']);
     $detail_tr = array();
     $tr = array(
       'id_transaksi' => $order['id'],
       // 'id_user' => $this->session->userdata('id'),
       'id_user' => $this->session->userdata('id'),
       'status' => 'Order Accepted',
       'total' => $order['purchase_units'][0]['amount']['breakdown']['item_total']['value'],
       'tax_total' => $order['purchase_units'][0]['amount']['breakdown']['tax_total']['value'],
       'shipping' => $order['purchase_units'][0]['amount']['breakdown']['shipping']['value'],
       'shipping_method' => str_replace("\u00a0","- ",$method[0].'-'.$method[1]),
       // 'shipping_method' => 'JNE',
       'alamat_pengiriman' => $order['purchase_units'][0]['shipping']['address']['address_line_1'].', '.
                              $order['purchase_units'][0]['shipping']['address']['admin_area_2'].', '.
                              $order['purchase_units'][0]['shipping']['address']['admin_area_1'].', '.
                              $order['purchase_units'][0]['shipping']['address']['country_code'],
      'paypal_fee' => $order['purchase_units'][0]['payments']['captures'][0]['seller_receivable_breakdown']['paypal_fee']['value'],
      'terima_bersih' => $order['purchase_units'][0]['payments']['captures'][0]['seller_receivable_breakdown']['net_amount']['value'],
     );
     // echo json_encode($tr);

     //insert trans
     $this->m_trans->insert_trans('tabel_transaksi', $tr);

     //get id temp tr lawas
     $where = array(
       // 'id_user'=>$this->session->userdata('id')
       'id_user'=>1
     );
     $temp = $this->m_trans->get_sembarang('tabel_temp_transaksi',$where);

     foreach ($temp as $key) {
       $id_temp_tr = $key->id_transaksi;
     }
     // echo $id_temp_tr;
     //end id tmp lawasx
     // $r = array();

     //detail_input
     // for ($i=0; $i < count($order['purchase_units'][0]['items']); $i++) {
     //   $idb = $order['purchase_units'][0]['items'][$i]['name'];
     //   $idba = explode("-",$idb);
     //   array_push($detail_tr, array(
     //     'id_detail_transaksi' => $order['purchase_units'][0]['items'][$i]['sku'],
     //     'id_transaksi' => $order['id'],
     //     'id_user' => 1,
     //     'id_barang' => $idba[0],
     //     'qty' => $order['purchase_units'][0]['items'][$i]['quantity'],
     //     'subtotal' => $order['purchase_units'][0]['items'][$i]['unit_amount']['value'],
     //     'tax' => $order['purchase_units'][0]['items'][$i]['tax']['value'],
     //   ));
     // }



     //input_detail
     for ($i=0; $i < count($order['purchase_units'][0]['items']); $i++) {

       $id_temp_tr = array(
         'id_detail_temp_transaksi' => $order['purchase_units'][0]['items'][$i]['sku']
       );
       echo json_encode($id_temp_tr);
       $jml_dtr = $this->m_trans->count_sembarang('tabel_temp_detail_transaksi', $id_temp_tr);


       if ($jml_dtr > 0) {
         // echo "ada";//
         $temp_dtl = $this->m_trans->get_sembarang('tabel_temp_detail_transaksi', $id_temp_tr);
         foreach ($temp_dtl as $kay) {
           $temp_qty = $kay->qty;
         }
         $qt = $temp_qty-$order['purchase_units'][0]['items'][$i]['quantity'];
         // echo $qt;
         if ($qt==0) {
           $idb = $order['purchase_units'][0]['items'][$i]['name'];
           $idba = explode("-",$idb);
           $qt0 = array(
             'id_detail_transaksi' => $order['purchase_units'][0]['items'][$i]['sku'],
             'id_transaksi' => $order['id'],
             'id_user' => $this->session->userdata('id'),
             'id_barang' => $idba[0],
             'size' => $idba[2],
             'qty' => $order['purchase_units'][0]['items'][$i]['quantity'],
             'subtotal' => $order['purchase_units'][0]['items'][$i]['unit_amount']['value'],
             'tax' => $order['purchase_units'][0]['items'][$i]['tax']['value'],
           );

           $this->m_trans->insert_trans('tabel_detail_transaksi',$qt0);
           $this->m_trans->delete_temp('tabel_temp_detail_transaksi', $id_temp_tr);

           $wheresize = array('id_barang'=>$idba[0],'size'=>$idba[2]);
           $ukuran = $this->m_cart->cek_apa('tabel_detail_stok', $wheresize);

           foreach ($ukuran as $detailstok) {
             $stok = $detailstok->jumlah_stok;
           }

           //kurangistok
           $stokbaru = $stok-$order['purchase_units'][0]['items'][$i]['quantity'];

           $this->m_cart->update_stok($stokbaru, $wheresize);

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

               $tras['stts'] = 'trans_sukses';
               $tras['message'] = 'TRANSAKSI SUCCESS';
               $response = $pusher->trigger('transaksi', 'my-event', $tras);
         }elseif ($qt>0) {
           $tmp_dt = $this->m_trans->get_sembarang('tabel_temp_detail_transaksi', $id_temp_tr);
           foreach ($tmp_dt as $dtr) {
             $qtt = $dtr->qty;
             $sub = $dtr->subtotal;
           }
           $qtf = $qtt-$order['purchase_units'][0]['items'][$i]['quantity'];
           $sbt = ($sub/$qtt)*$qtf;

           // update temp detail _transaksi
           $this->m_trans->update_sembarang('tabel_temp_detail_transaksi',
                                            array('qty'=>$qtf, 'subtotal' => $sbt),
                                            $id_temp_tr);

           //  // masuk ke detail tr
           $idb = $order['purchase_units'][0]['items'][$i]['name'];
           $idba = explode("-",$idb);
           $qt1 = array(
             'id_detail_transaksi' => $order['purchase_units'][0]['items'][$i]['sku'],
             'id_transaksi' => $order['id'],
             'id_user' => $this->session->userdata('id'),
             'id_barang' => $idba[0],
             'size' => $idba[2],
             'qty' => $order['purchase_units'][0]['items'][$i]['quantity'],
             'subtotal' => $order['purchase_units'][0]['items'][$i]['unit_amount']['value'],
             'tax' => $order['purchase_units'][0]['items'][$i]['tax']['value'],
           );
           $this->m_trans->insert_trans('tabel_detail_transaksi',$qt1);

           $wheresize = array('id_barang'=>$idba[0],'size'=>$idba[2]);
           $ukuran = $this->m_cart->cek_apa('tabel_detail_stok', $wheresize);

           foreach ($ukuran as $detailstok) {
             $stok = $detailstok->jumlah_stok;
           }

           //kurangistok
           $stokbaru = $stok - $order['purchase_units'][0]['items'][$i]['quantity'];

           $this->m_cart->update_stok($stokbaru, $wheresize);

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

               $tras['stts'] = 'trans_sukses';
               $tras['message'] = 'TRANSAKSI SUCCESS';
               $response = $pusher->trigger('notif-cart', 'my-event', $tras);
           // echo "yang kurang :";
           // print_r($qt1);
         }else {
           echo "error";
         }
         // echo "";
       }elseif ($jml_dtr<=0) {
         echo "perlu refund";
       }else {
         echo "error";
       }
     }
     //end input details
     $count_tdtr = $this->m_trans->count_sembarang('tabel_temp_detail_transaksi',$where);

     if ($count_tdtr == 0) {
       $this->m_trans->delete_temp('tabel_temp_transaksi', $where);

     };

     // print_r($temp_dtl);

     // echo json_encode($detail_tr);
  }


}

/**
 *This driver function invokes the getOrder function to retrieve
 *sample order details.
 *
 *To get the correct order ID, this sample uses createOrder to create a new order
 *and then uses the newly-created order ID with GetOrder.
 */
if (!count(debug_backtrace()))
{
  GetOrder::getOrder('REPLACE-WITH-ORDER-ID', true);
}
?>
