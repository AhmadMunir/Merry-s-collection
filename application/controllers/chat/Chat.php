<?php
  defined('BASEPATH') or exit('No direct script access allowed');

  class Chat extends CI_Controller
  {
      public function __construct()
      {
        parent::__construct();
          $this->load->helper(array('form', 'url'));
          $this->load->model("chat/m_chat");
          $this->load->model('m_login');
          if ($this->session->userdata('status') != "login") {
              redirect(base_url("login"));
          }
      }

      public function index(){
        echo "string";
      }

      public function send(){
        $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($set), 0, 3);


        $id = $code;
        $img = $this->imageupload();
        $msg = $this->input->post('message');
        // $msg = $img;
        if ($img && $msg) {
          $msge = $msg."+mrr+".$img;
        }elseif ($img && $msg == '') {
          $msge = "+msg+"."+mrr+".$img;
        }elseif ($msg && $img == '') {
          $msge = "$msg"."+mrr+"."+img+";
        }

        $penerima = $this->input->post('penerima');
        $pengirim = $this->session->userdata('id');

        $where = array(
            'id' => $id,
            'id_pengirim' => $pengirim,
            'id_penerima' => $penerima,
            'message' => $msge
        );

        $this->m_chat->send($where);

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
            $response = $pusher->trigger('chat-channel', 'chat', $data);

        echo json_encode(array('status'=>'success'));
      }

      private function imageupload(){
        $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code2 = substr(str_shuffle($set), 0, 3);

        $config['upload_path']          = './img/custom/';
		    $config['allowed_types']        = 'gif|jpg|png';
		    $config['file_name']        = $code2;
		    $config['max_size']             = 5000;

        $this->load->library('upload', $config);
          if ($this->upload->do_upload('file')) {
              return $this->upload->data("file_name");
            }else {
              return '';
            }

      }

      public function get_msg(){
        $user = $this->session->userdata('id');
        $where = "id_penerima='$user' or id_pengirim='$user' ORDER BY waktu ASC";

        $chat = $this->m_chat->get($where);

        $msg = array();

        if (count($chat) == 0) {
          $status = '0';
        }else {
          $status = '1';
          foreach ($chat as $key) {
            if ($user == $key->id_pengirim) {
              $sender = 1;
            } else {
              $sender = 0;
            }
            $jam = explode(':',substr($key->waktu, 11));
            $tgl = explode('-',substr($key->waktu, 0,-9));

            $psn = explode('+mrr+',$key->message);

            $cek_user = $this->m_chat->get_user('username',array('id_admin'=> $key->id_pengirim), 'tabel_admin')->num_rows();

            if ($cek_user>0) {
              $a = $this->m_chat->get_user('username',array('id_admin'=> $key->id_pengirim), 'tabel_admin')->result();
              $pembalas = $a;
            }else {
              $a = $this->m_chat->get_user('username',array('id_user'=> $key->id_pengirim), 'tabel_user')->result();
              $pembalas = $a;
            }


            array_push($msg, array(
              'sender' => $sender,
              'message' => $psn[0],
              'gambar' => $psn[1],
              'status' => $key->status,
              'time' => $jam[0].':'.$jam[1],
              'date' => $tgl[2].'-'.$tgl[1].'-'.substr($tgl[0],2),
              'pembalas' => $pembalas
            ));
          }
        }
        echo json_encode(array('status'=> $status, 'msg'=> $msg));
      }
  }
