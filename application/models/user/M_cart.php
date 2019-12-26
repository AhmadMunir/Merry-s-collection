<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 *
 */
class M_cart extends CI_Model
{
  public function insert_cart($data,$tabel){
    return $this->db->insert($tabel, $data);
  }

  public function cek_cart($where){
    return $this->db->get_where("tabel_temp_transaksi", $where)->num_rows();
  }
  public function get_carts($where){
    return $this->db->get_where("tabel_temp_transaksi", $where)->result();
  }
  public function cek_detail($where){
    return $this->db->get_where("tabel_temp_detail_transaksi", $where)->num_rows();
  }

  public function get_qty($where){
    return $this->db->get_where("tabel_temp_detail_transaksi", $where)->result();
  }
  public function update_qty($whereq, $qty){
    $this->db->where($whereq);
    $this->db->update('tabel_temp_detail_transaksi', $qty);
  }

  public function get_data_barang($id){
    $idb = array(
      'id_barang' => $id
    );
    $this->db->where($idb);
    return $this->db->get('tabel_barang')->result();
  }

  public function get_cart($id){
    $idu = array(
      'id_user' => $id
    );
    $this->db->where($idu);
    return $this->db->get('view_cart')->result();
  }

  public function itung_cart($where){
    return $this->db->get_where('view_cart', $where)->num_rows();
  }

  public function delete($id){
    $this->db->delete('tabel_temp_detail_transaksi', $id);
  }
}
?>
