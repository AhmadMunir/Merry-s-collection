<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 *
 */
class stok_model extends CI_Model
{
	private $_table = "tabel_detail_stok";


	public $id_detail_stok;
	public $id_barang;
	public $stok;
	public $stok2;
	public $stok3;
	public $stok4;
	public $stok5;



	public function rules()
	{
		return [
			['field'=>'id_barang',
			'label'=>'Name',
			'rules'=>'required'],
		];
	}

	
	public function getAll($where, $table)
	{
		$this->db->order_by("id_detail_stok", 'asc');
		return $this->db->get_where($table, $where);
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_detail_stok" => $id])->row();
	}


	// public function save()
	// {
	// 	$post = $this->input->post();
	// 	$this->id_barang = $post["id_barang"];
	// 	$this-> = $post["id_barang"];
	// 	$this->db->insert($this->_table,$this);
	// }

	public function update()
	{
		$post = $this->input->post();
		$this->id_detail_stok = $post["id"];
		$this->id_barang = $post["id_barang"];
		$this->db->update($this->_table, $this, array('id_detail_stok' => $post['id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("id_detail_stok" => $id));
	}

}
?>
