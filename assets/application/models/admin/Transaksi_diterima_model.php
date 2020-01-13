<?php
class Transaksi_diterima_model extends CI_Model
{
	private $_table = "view_transaksi";
	private $tablee = "tabel_transaksi";

	public function rules()
	{
		return [
			['field'=>'id_transaksi',
			'label'=>'Name',
			'rules'=>'required'],
		];
	}

	public function getById($id)
	{
		return $this->db->get_where($this->tablee, ["id_transaksi" => $id])->row();
	}

	function getview_transaksi()
	{
		return $this->db->get('view_transaksi')->result();
	}
	function getview_transaksi_bulan($bulan,$tahun)
	{
		$this->db->where('Month(tanggal)', $bulan);
		$this->db->where('Year(tanggal)', $tahun);
		return $this->db->get('view_transaksi')->result();
	}

	function getdate_year()
	{
		return $this->db->query("select DISTINCT YEAR(tanggal) as tgl from view_transaksi")->result();
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_transaksi = $post["id_transaksi"];
		$this->status = $post["status"];
		$this->resi = $post["resi"];

		$this->db->update($this->tablee, $this, array('id_transaksi' => $post['id_transaksi']));
	}

	// public function delete($id)
	// {
	// 	// $this-> _deleteImage($id);
	// 	return $this->db->delete($this->_table, array("id_transaksi" => $id));
	// }
}
?>