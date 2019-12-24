<?php
  class Profile extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('user/M_profile');

      if($this->session->userdata('status') =="login"){

      }else {
        redirect(base_url('user/login'));
      }
    }

    public function index(){
      $id = $this->session->id;
      $where = array('id_user'=>$id);
      $dob = array('dob' => null,
                    'id_user'=>$id);
      $table = "view_user";
      $data['data_user'] = $this->M_profile->check($table, $where)->result();
      $data['dob_null'] = $this->M_profile->check($table, $dob)->result();

      $this->load->view('home/my-account', $data);
    }

    public function saveprofile(){
      $id = $this->session->id;
      $nama = $this->input->post('nama');
      $email = $this->input->post('email');
      $dob = $this->input->post('dob');

      $data = array('nama_user' => $nama,
                     'email' => $email,
                     'dob' => $dob);
      $where = array('id_user' => $id);

      $this->M_profile->update($where, $data, 'tabel_user');
      $this->session->set_flashdata('success','success');
      redirect('user/profile');

          }

    public function saveaddress(){
      $id = $this->session->userdata('id');
      $address = $this->input->post("address");
      $zip = $this->input->post("zipostal");
      $city = $this->input->post("city");
      $province = $this->input->post("province");
      $country = $this->input->post("country");

      $where = array('id_user' => $id);

      $data = array(
        'alamat' => $address,
        'kota' => $city,
        'provinsi' => $province,
        'negara' => $country,
        'kode_pos' => $zip
      );
      $this->M_profile->update($where, $data, 'tabel_alamat');
      $this->session->set_flashdata('success','success');
      redirect('user/profile');
    }
  }
 ?>
