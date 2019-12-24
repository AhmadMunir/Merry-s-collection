<?php
  class Login extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('m_login');
    }

    public function index()
    {
      $this->load->view('login');
    }

    public function login()
    {
    	$username = $this->input->post('username');
    	$password = $this->input->post('password');
    	$where = array(
        'username' => $username,
        'password' => $password);
    	  $cekadmin = $this->m_login->cek_user("tabel_admin", $where)->num_rows();
    	  $cekadmin2 = $this->m_login->cek_user("tabel_admin", $where)->result();
    	  $cekuser = $this->m_login->cek_user("tabel_user", $where)->num_rows();
    	  $cekuser2 = $this->m_login->cek_user("tabel_user", $where)->result();
    	  if($cekadmin > 0){
        foreach ($cekadmin2 as $k) {
          $id = $k->id_admin;
        }
        $data_session = array(
          'nama' => $username,
          'jabatan' => "admin",
          'status' => "login",
          'id' => $id
        );
        $this->session->set_userdata($data_session);
        // redirect(base_url('admin/home'));
        echo $data_session['nama'];
        echo $data_session['jabatan'];
        echo $data_session['status'];
        echo $data_session['id'];
      } elseif($cekuser > 0){
          foreach ($cekuser2 as $key) {
            $id_us = $key->id_user;
          }
          $data_session = array(
            'id' => $id_us,
            'jabatan' => "user",
            'nama' => $username,
            'status' => "login",
          );
          $this->session->set_userdata($data_session);
          // redirect(base_url('user/home'));
          echo $data_session['nama'];
          echo $data_session['jabatan'];
          echo $data_session['status'];
          echo $data_session['id'];
    }else {
      // $this->session->set_flashdata('gagal', 'Password dan Username Salah!');
      // redirect('Login');
      echo "gagal";
      }
  	}

    public function loginL()
    {
    	$username = $this->input->post('usernameL');
    	$password = $this->input->post('passwordL');
    	$where = array(
        'username' => $username,
        'password' => $password);
    	  $cekadmin = $this->m_login->cek_user("tabel_admin", $where)->num_rows();
    	  $cekadmin2 = $this->m_login->cek_user("tabel_admin", $where)->result();
    	  $cekuser = $this->m_login->cek_user("tabel_user", $where)->num_rows();
    	  $cekuser2 = $this->m_login->cek_user("tabel_user", $where)->result();
    	  if($cekadmin > 0){
        foreach ($cekadmin2 as $k) {
          $id = $k->id_admin;
        }
        $data_session = array(
          'nama' => $username,
          'jabatan' => "admin",
          'status' => "login",
          'id' => $id
        );
        $this->session->set_userdata($data_session);
        // redirect(base_url('admin/home'));
        echo $data_session['nama'];
        echo $data_session['jabatan'];
        echo $data_session['status'];
        echo $data_session['id'];
      } elseif($cekuser > 0){
          foreach ($cekuser2 as $key) {
            $id_us = $key->id_user;
          }
          $data_session = array(
            'id' => $id_us,
            'jabatan' => "user",
            'nama' => $username,
            'status' => "login",
          );
          $this->session->set_userdata($data_session);
          // redirect(base_url('user/home'));
          // redirect($_SERVER['HTTP_REFERER']);
          if($_SERVER['HTTP_REFERER']==base_url('user/login')){
            redirect(base_url('home'));
          }else {
            redirect($_SERVER['HTTP_REFERER']);
          }
          // echo $data_session['nama'];
          // echo $data_session['jabatan'];
          // echo $data_session['status'];
          // echo $data_session['id'];
    }else {
      // $this->session->set_flashdata('gagal', 'Password dan Username Salah!');
      // redirect('Login');
      $this->session->set_flashdata('success','Login Gagal, Masukkan data yang benar');
        redirect(site_url("user/login"));
      }
  	}
  	 function logout(){
      $this->session->sess_destroy();
      redirect(base_url('login'));
    }
  }
 ?>
