<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 *
 */
class M_trans extends CI_Model
{
  public function insert_trans($tabel, $where){
    return $this->db->insert($tabel, $where);
  }

  public function get_detail($where){
    return $this->db->get_where("tabel_temp_detail_transaksi", $where)->result();
  }

  public function delete_temp($id){
    $this->db->delete('tabel_temp_transaksi',$id);
  }
}
?>
