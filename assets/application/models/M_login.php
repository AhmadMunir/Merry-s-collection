<?php
  class M_login extends CI_Model{
    public function cek_user($table, $where){
      return $this->db->get_where($table,$where);
    }
    public function getId($username){
      $this->db->where('id_admin', $username);
      return $this->db->get('tabel_admin');
    }
    public function cek_us($table, $where){
      return $this->db->get_where($table,$where);
    }
    public function getUs($username){
      $user=$this->db->query("SELECT id_user FROM tabel_user WHERE username = '$username'");
      return $user;
    }
  }
 ?>