<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 *
 */
class M_trans extends CI_Model
{
  public function insert_trans($tabel, $where){
    return $this->db->insert($tabel, $where);
  }

  public function get_sembarang($table,$where){
    return $this->db->get_where($table, $where)->result();
  }

  public function count_sembarang($table,$where){
    return $this->db->get_where($table, $where)->num_rows();
  }

  public function update_sembarang($tabel, $data, $where){
    $this->db->where($where);
    $this->db->update($tabel,$data);
  }

  public function delete_temp($tabel,$id){
    $this->db->delete($tabel,$id);
  }

  public function get_transaksi($where){
    return $this->db->get_where('view_transaksi', $where)->result();
  }
}
?>
