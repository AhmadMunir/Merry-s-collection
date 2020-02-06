<?php

// namespace Sample\CaptureIntentExamples;

require __DIR__ . '/../../../../../vendor/autoload.php';


use Sample\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;




class Createordercustom extends CI_Controller
{
    /**
     * Setting up the JSON request body for creating the Order. The Intent in the
     * request body should be set as "CAPTURE" for capture intent flow.
     *
     */
     public function __construct(){
       parent::__construct();
       $this->load->model('user/mtr_custom');
     }

     public function total(){
       $id = $this->session->userdata('id');
       $data = $this->mtr_custom->get_tr($id);
       $total = array();
       foreach ($data as $tr) {
         // array_push($total, array(
         //   'currency_code' => 'USD',
         //   'value' => $tr->total,
         // ));
         $tot = $tr->harga;
       };
       return $tot;
       // echo $tot;
     }
     public function tax(){
       $id = $this->session->userdata('id');
       $data = $this->mtr_custom->get_cart($id);
       $tax = 0;
       foreach ($data as $tr){
          $tix = number_format(floor(($tr->harga*0.029+0.30)*100)/100,2);
         $tax += $tix;
       };

       return number_format($tax,2);
       // echo number_format($tax,2);
       // echo json_encode($tax);
     }

     public function items(){
       $id = $this->session->userdata('id');
       $data = $this->mtr_custom->get_cart($id);
       $item = array();
       foreach ($data as $key) {
         $tax = number_format(floor(($key->harga*0.029+0.30)*100)/100,2);
         array_push($item, array(
           'name' => $key->gambar.'-'.$key->nama_barang.'-'.$key->size,
           'sku' => $key->id_temp_custom,
           'unit_amount' => array(
             'currency_code' => 'USD',
             'value' => $key->harga,
           ),
           'tax' => array(
             'currency_code' => 'USD',
             'value' => $tax,
           ),
           'quantity' => 1,
           'category' => 'PHYSICAL_GOODS'
         ));
       }
       return $item;
       // echo json_encode($item);
     }

     public function ship(){
       $username = $this->session->userdata('nama');
        $al1  = $_SESSION['ship_session']['address_line_1'];
        // $al2  = $_SESSION['ship_session']['address_line_2'];
        $al3  = $_SESSION['ship_session']['admin_area_2'];
        $al4  = $_SESSION['ship_session']['admin_area_1'];
        $al5  = $_SESSION['ship_session']['postal_code'];
        $al6  = $_SESSION['ship_session']['country_code'];
        $met  = $_SESSION['ship_session']['method'];
        // $met  = 'JNE YES';
        // jika user mengisiform ship
        if ($al1 == null  or $al3 == null or $al4 == null or $al5 == null or $al6 == null) {
          if ($met != null) {
            // user memilih $kurir
            $id = $this->session->userdata('id');
            $where = array(
              'id_user'=>$id
            );
            $data = $this->mtr_custom->cek_apa('tabel_alamat', $where);
            foreach ($data as $ala) {
              $a1 = $ala->alamat;
              // $a2
              $a3 = $ala->kota;
              $a4 = $ala->provinsi;
              $a5 = $ala->id_neg;
              $a6 = $ala->kode_pos;
            }
            $ship = array(
              'method' => $met,
              'name' =>
                  array(
                      'full_name' => $username,
                  ),
              'address' =>
                  array(
                      'address_line_1' => $a1,
                      // 'address_line_2' => $a2,
                      'admin_area_2' => $a3,
                      'admin_area_1' => $a4,
                      'postal_code' => $a6,
                      'country_code' => $a5,
                  ),
            );
            // echo json_encode($ship);
            return $ship;
          }else {
            // code...
            // echo "user tidak mengisi metode pengiriman";
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

                $data['status'] = 'error';
                $data['ket'] = 'Select the courier first, before checkout';
                $response = $pusher->trigger('notif-cart', 'my-event', $data);
          }

          //jika tidak
        }else {
          if ($met != null) {
            $ship = array(
              'method' => $met,
              'name' =>
                  array(
                      'full_name' => $username,
                  ),
              'address' =>
                  array(
                      'address_line_1' => $al1,
                      // 'address_line_2' => $al2,
                      'admin_area_2' => $al3,
                      'admin_area_1' => $al4,
                      'postal_code' => $al5,
                      'country_code' => $al6,
                  ),
            );
            // echo $ship;
            return $ship;
          }else {
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

                $data['status'] = 'error';
                $data['ket'] = 'Select the courier first, before checkout';
                $response = $pusher->trigger('notif-cart', 'my-event', $data);
          }
        }
     }

     public function all_total(){
       $all = $this->total() + $this->tax() + $_SESSION['ship_session']['cost'];
       // $al = number_format(round($all,0)-0.01,2,'.','' );
      return number_format($all,2,'.','');
      // echo $al;

     }
     public function buildRequestBody()
     {
       $username = $this->session->userdata('nama');
       // $tot = $this->total();
       // $tax_tot = number_format($tot*0.0044+0.30,2);
        return  array(
             'intent' => 'CAPTURE',
             'application_context' =>
                 array(
                     'return_url' => base_url('user/afterpay'),
                     'cancel_url' => 'https://example.com/cancel',
                     'brand_name' => 'EXAMPLE INC',
                     'locale' => 'en-US',
                     'landing_page' => 'BILLING',
                     'shipping_preference' => 'SET_PROVIDED_ADDRESS',
                     'user_action' => 'PAY_NOW',
                 ),
             'purchase_units' =>
                 array(
                     0 =>
                         array(
                             'reference_id' => 'PUHF',
                             'description' => 'Sporting Goods',
                             'custom_id' => 'CUST-HighFashions',
                             'soft_descriptor' => 'HighFashions',
                             'amount' =>
                                 array(
                                     'currency_code' => 'USD',
                                     'value' => $this->all_total(),
                                     'breakdown' =>
                                         array(
                                             'item_total' => array(
                                                 'currency_code' => 'USD',
                                                 'value' => $this->total(),
                                             ),

                                             'shipping' =>
                                                 array(
                                                     'currency_code' => 'USD',
                                                     'value' => $_SESSION['ship_session']['cost'],
                                                 ),
                                             // 'handling' =>
                                             //     array(
                                             //         'currency_code' => 'USD',
                                             //         'value' => '10.00',
                                             //     ),
                                             'tax_total' => array(
                                                 'currency_code' => 'USD',
                                                 'value' => $this->tax(),
                                             ),

                                             // 'shipping_discount' =>
                                             //     array(
                                             //         'currency_code' => 'USD',
                                             //         'value' => '10.00',
                                             //     ),
                                         ),
                                 ),
                             'items' => $this->items(),
                             'shipping' => $this->ship(),
                         ),
                 ),
         );
         // echo json_encode($n);
     }

     /**
      * This is the sample function which can be sued to create an order. It uses the
      * JSON body returned by buildRequestBody() to create an new Order.
      */
     public static function order($debug=true)
     {
         $request = new OrdersCreateRequest();
         $request->headers["prefer"] = "return=representation";
         $request->body = self::buildRequestBody();

         $client = PayPalClient::client();
         $response = $client->execute($request);
         // if ($debug)
         // {
         //     print "Status Code: {$response->statusCode}\n";
         //     print "Status: {$response->result->status}\n";
         //     print "Order ID: {$response->result->id}\n";
         //     print "Intent: {$response->result->intent}\n";
         //     print "Links:\n";
         //     foreach($response->result->links as $link)
         //     {
         //         print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
         //     }
         //     // To toggle printing the whole response body comment/uncomment below line
         //     echo json_encode($response->result, JSON_PRETTY_PRINT), "\n";
         // }


         echo json_encode($response);
     }
}


/**
 * This is the driver function which invokes the createOrder function to create
 * an sample order.
 */
if (!count(debug_backtrace()))
{
    CreateOrder::createOrder(true);
}
