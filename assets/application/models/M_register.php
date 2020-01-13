<?php
class M_register extends CI_Model
{
	private $table = "tabel_user";
	private $_table= "tabel_admin";

	function cek_register($table,$where)
	{
		return $this->db->get_where($table,$where);
	}

	function cek_registerr($table,$where)
	{
		return $this->db->get_where($_table,$where);
	}

	public function simpan($register)
    {
        $this->db->insert("tabel_admin", $register);
    }

	public function save($register)
    {
        $this->db->insert("tabel_user", $register);
    }

		public function saveadmin($register)
	    {
	        $this->db->insert("tabel_admin", $register);
	    }

}
?>
