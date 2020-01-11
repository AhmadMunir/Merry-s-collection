<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 *
 */
class M_home extends CI_Model
{
  public function load_newarrival(){
    return $this->db->get('newarrival')->result();
  }

  public function load_banner(){
    return $this->db->get('tabel_baner')->result();
  }

  public function cek($tabel, $where){
    $this->db->where($where);
    return $this->db->get($tabel)->result();
  }
}
?>
