<?php
class M_registeruser extends CI_Model
{
    private $table = "tabel_user";

    public function cek_register($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function save($register)
    {
        $this->db->insert("tabel_user", $register);
    }

    public function check($where, $table)
    {
      $this->db->limit(1);
        return $this->db->get_where($table, $where);
    }

    public function getUser($username)
    {
        $query = $this->db->get_where('tabel_user', array('username'=>$username));
        return $query->row_array();
    }

    public function activate($data, $username)
    {
        $this->db->where('tabel_user.username', $username);
        return $this->db->update('tabel_user', $data);
    }
}
