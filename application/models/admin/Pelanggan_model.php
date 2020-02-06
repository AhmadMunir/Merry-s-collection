<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 *
 */
class Pelanggan_model extends CI_Model
{
	private $_table = "tabel_user";
	private $_table2 = "view_detail_transaksi";

	public function rules()
	{
		return [
			['field'=>'id_barang',
			'label'=>'Name',
			'rules'=>'required'],
		];
	}
	
	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getSemua($where, $table)
	{
		// $this->db->order_by("", 'asc');
		return $this->db->get_where($table, $where);
	}


}
?>
