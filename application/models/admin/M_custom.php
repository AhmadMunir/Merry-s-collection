<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 *
 */
class M_custom extends CI_Model{
  public function get_idsidechat(){
    $this->db->DISTINCT();
    $this->db->SELECT("id_pengirim");
    $this->db->order_by("waktu", "ASC");
    return $this->db->get("tabel_chat")->result();
  }

  public function get_usr($id){
    $where = array('id_user' => $id);
    $this->db->select('username');
    $this->db->where($where);
    return $this->db->get('tabel_user')->result();
  }

  public function get_inbox($username){
    $where = array('username'=>$username);
    $this->db->where($where);
    $this->db->order_by("waktu", "DESC");
    $this->db->limit(1);
    return $this->db->get('view_chat_user')->result();
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

  public function send($where){
    $this->db->insert('tabel_chat', $where);
  }

  public function setread($user){
    $where = array('id_pengirim'=>$user);
    $this->db->where($where);
    $data = array('status'=>1);
    $this->db->update('tabel_chat', $data);
  }

  public function get_pic($where){
    $this->db->where($where);
    return $this->db->get('tabel_gambar_custom');
  }

  public function delete($where, $table){
    $this->db->delete($table, $where);
  }

  public function input_custom($data){
    $this->db->insert('tabel_temp_custom', $data);
  }
}
?>
