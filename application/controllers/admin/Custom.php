<?php
  defined ('BASEPATH') OR exit('No direct script access allowed');

  class Custom extends CI_Controller
  {
  	public function __construct()
  	{
  		parent::__construct();

      $this->load->model('admin/m_custom');
      $this->load->model('m_login');
   if($this->session->userdata('status') != "login"){

         redirect(base_url("login"));
     }else{
       $where = array(
         'username' => $this->session->userdata('nama'));
       // $cekadmin2 = $this->m_login->cek_user("tabel_admin", $where)->result();
       $cekadmin = $this->m_login->cek_user("tabel_admin", $where)->num_rows();
       // echo $cekadmin;
          if($cekadmin <=0){
             // echo"anda bukan admin";
             redirect(base_url("login"));
         }
     }
  	}

  	public function index()
  	{
  		$this->load->view("admin/custom/custom-chat");
  	}

    public function create_custom(){
      $this->load->view("admin/custom/custom-create");
    }

    public function get_dftrchat(){
      $cht = $this->m_custom->get_idsidechat();

      $inbx = array();
      $un = array();
      foreach ($cht as $kuy) {
        $usr = $this->m_custom->get_usr($kuy->id_pengirim);
        foreach ($usr as $key) {
          $inbox = $this->m_custom->get_inbox($key->username);
          foreach ($inbox as $kay) {
            if (count($inbox)>0) {
              $status = "sukses";

              $tgl = explode('-',substr($kay->waktu, 0,-9));
              if ($kay->status==0) {
                $stts = 'unread';
              }else {
                $stts = '';
              }

              $psn = explode('+mrr+',$kay->message);
              if ($psn[0]!='+msg+') {
                $psn2 = $psn[0];
              }else {
                $psn2 = '';
              }

              if ($psn[1]!='+img+') {
                $img2=$kay->nama_user.' mengirimkan gambar' ;
              }else {
                $img2='';
              }

              if ($psn2 == '') {
                $msg2 = $img2;
              }elseif ($img2=='') {
                $msg2 = $psn2;
              }elseif ($psn2 != '' && $img2!= '') {
                $msg2 = $psn2 . ' ' . $img2;
              }else {
                $msg2 = 'error';
              }

              array_push($un, $stts);

              array_push($inbx, array(
                'id_chat' => $kay->id,
                'id_pengirim' => $kay->id_pengirim,
                'nama_user' => $kay->nama_user,
                'message' => $msg2,
                'status' => $stts,
                'waktu' => $tgl[2].'-'.$tgl[1].'-'.$tgl[0],
              ));
            }else {
              $status = "gagal";
            }
          }
        }
      }
      if ($status=='sukses') {
        $ur = 0;
      }else {
        $unread = array_count_values($un);
        $ur = $unread['unread'];
      }
      echo json_encode(array('status'=>$status, 'inbox' => $inbx, 'unread' => $ur));
    }

    public function get_msg(){
      $user = $this->input->post('id');
      $this->m_custom->setread($user);
      $where = "id_penerima='$user' or id_pengirim='$user' ORDER BY waktu ASC";

      $chat = $this->m_custom->get($where);

      $msg = array();

      if (count($chat) == 0) {
        $status = '0';
      }else {
        $status = '1';
        foreach ($chat as $key) {
          // if ($user == $key->id_pengirim) {
          //   $sender = 1;
          // } else {
          //   $sender = 0;
          // }
          $jam = explode(':',substr($key->waktu, 11));
          $tgl = explode('-',substr($key->waktu, 0,-9));

          $cek_user = $this->m_custom->get_user('username',array('id_admin'=> $key->id_pengirim), 'tabel_admin')->num_rows();

          $psn = explode('+mrr+',$key->message);

          if ($cek_user>0) {
            $a = $this->m_custom->get_user('username',array('id_admin'=> $key->id_pengirim), 'tabel_admin')->result();
              $sender = 1;
            $pembalas = $a;
          }else {
            $a = $this->m_custom->get_user('username',array('id_user'=> $key->id_pengirim), 'tabel_user')->result();
            $sender = 0;
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
      echo json_encode(array('status'=> $status, 'msg'=> $msg, 'user'=> $user));
    }

    public function send(){
      $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $code = substr(str_shuffle($set), 0, 3);

      $id = $code;
      $msg = $this->input->post('message');
      $penerima = $this->input->post('penerima');
      $pengirim = $this->session->userdata('id');

      $where = array(
          'id' => $id,
          'id_pengirim' => $pengirim,
          'id_penerima' => $penerima,
          'message' => $msg
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

    public function create($custom){
      $select = array('nama_user', 'email', 'no_telp', 'alamat');
      $where = array('id_user' => $custom);
      $data['customer'] = $this->m_custom->get_user($select, $where, 'view_user')->result();
      $this->load->view("admin/custom/custom-create", $data);
    }

    public function get_picture(){
      $id = $this->input->post('id');
      $where = array('id_user' => $id);
      $countpic = $this->m_custom->get_pic($where)->num_rows();

      $pict = array();

      if ($countpic > 0) {
        $status = 1;
        $pic = $this->m_custom->get_pic($where)->result();

        foreach ($pic as $key) {
          array_push($pict, array(
            'id_pic' => $key->id,
            'pic' => $key->gambar
          ));
        }
      }else {
        $status = 0;
      }

      echo json_encode(array('status'=>$status, 'pic'=>$pict));
    }

    public function del_picture(){
      $id = $this->input->post('id');
      $where = array('id' => $id);

      $del = $this->m_custom->delete($where, 'tabel_gambar_custom');

      echo json_encode(array('status'=>1));
    }

    public function make_custom(){
      $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $kode = substr(str_shuffle($set), 0, 4);

      $id_user = $this->input->post('id_user');
      $nama_barang = $this->input->post('nama_barang');
      $harga = $this->input->post('harga');
      $size = $this->input->post('size');
      $deskripsi = $this->input->post('deskripsi');
      $gambar = $this->input->post('gambar');

      $data = array(
        'id_temp_custom' => $kode,
        'id_user' => $id_user,
        'nama_barang' => $nama_barang,
        'harga' => $harga,
        'size' => $size,
        'deskripsi' => $deskripsi,
        'gambar' => $gambar
      );

      $this->m_custom->input_custom($data);

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
          $response = $pusher->trigger('custom', 'custom', $data);


      redirect(base_url('admin/custom'));
    }
  }

 ?>
