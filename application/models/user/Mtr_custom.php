<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 *
 */
class Mtr_custom extends CI_Model
{

  public function get_carts($where){
    return $this->db->get_where("tabel_temp_custom", $where)->result();
  }

  public function get_cart($id){
    $idu = array(
      'id_user' => $id
    );
    $this->db->where($idu);
    return $this->db->get('view_cart_custom')->result();
  }

  public function get_tr($id){
    $idu = array(
      'id_user' => $id
    );
    $this->db->where($idu);
      return $this->db->get('tabel_temp_custom')->result();
  }

  public function itung_cart($where){
    return $this->db->get_where('view_cart', $where)->num_rows();
  }

  public function delete($id){
    $this->db->delete('tabel_temp_detail_transaksi', $id);
  }

  public function cek_apa($tabel, $where){
    $this->db->where($where);
    return $this->db->get($tabel)->result();
  }

}
?>
