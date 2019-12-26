<?php
class M_register extends CI_Model
{
	private $table = "tabel_user";

	function cek_register($table,$where)
	{
		return $this->db->get_where($table,$where);
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
