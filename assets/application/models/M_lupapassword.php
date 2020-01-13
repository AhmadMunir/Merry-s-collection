<?php
class M_lupapassword extends CI_Model
{

  public function cek_email($data){
    $this->db->where($data);
    return $this->db->get('tabel_user')->num_rows();
  }
  public function get_code($data){
    $this->db->where($data);
    return $this->db->get('tabel_user')->result();
  }
}
?>
