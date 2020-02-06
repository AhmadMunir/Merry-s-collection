<?php
class Custompelanggan_dikirim_model extends CI_Model
{
	private $_table = "view_custompelanggan";
	private $tablee = "tabel_custom";

	public function rules()
	{
		return [
			['field'=>'id_custom',
			'label'=>'Name',
			'rules'=>'required'],
		];
	}

	public function getById($id)
	{
		return $this->db->get_where($this->tablee, ["id_custom" => $id])->row();
	}

	function getview_custom()
	{
		$this->db->where('status',  'Dikirim');
		return $this->db->get('view_custompelanggan')->result();
	}
	function getview_custompelanggan_bulan($bulan,$tahun)
	{
		$this->db->where('Month(tanggal)', $bulan);
		$this->db->where('Year(tanggal)', $tahun);
		$this->db->where('status',  'Order Accepted');
		return $this->db->get('view_custompelanggan')->result();
	}

	function getdate_year()
	{
		return $this->db->query("select DISTINCT YEAR(tanggal) as tgl from view_custompelanggan")->result();
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_transaksi = $post["id_custom"];
		$this->status = $post["status"];
		

		$this->db->update($this->tablee, $this, array('id_custom' => $post['id_custom']));
	}

	// public function delete($id)
	// {
	// 	// $this-> _deleteImage($id);
	// 	return $this->db->delete($this->_table, array("id_transaksi" => $id));
	// }
}
?>
