<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 *
 */
class M_home extends CI_Model
{
  public function load_newarrival(){
    $this->db->order_by('time', 'desc');
    $this->db->limit(4);
    return $this->db->get('tabel_barang')->result();
  }
}
?>
