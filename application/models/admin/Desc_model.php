<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 *
 */
class Desc_model extends CI_Model
{
	private $_table = "view_stok";

	
	public function getAll()
	{
		$this->db->order_by('jumlah_stok', 'asc');
		return $this->db->get($this->_table)->result();
	}

}
?>
