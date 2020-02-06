<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 *
 */
class M_chat extends CI_Model{
  public function send($where){
    $this->db->insert('tabel_chat', $where);
  }

  public function get($where){
    $this->db->where($where);
    return $this->db->get('tabel_chat')->result();
  }

  public function get_user($select, $where, $table){
    $this->db->select($select);
    $this->db->where($where);
    return $this->db->get($table);
  }
  public function insertpic($where){
    $this->db->insert('tabel_gambar_custom', $where);
  }
}
?>
