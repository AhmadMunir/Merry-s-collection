<?php
  class M_profile extends CI_Model{

    public function check($table, $where){
      return $this->db->get_where($table, $where);
    }

    public function update($where, $data, $table){
      $this->db->where($where);
      $this->db->update($table, $data);
    }
  }
 ?>
