<?php
class Transaksi_dikirim_model extends CI_Model
{
	private $_table = "view_transaksi";

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

	// public function delete($id)
	// {
	// 	// $this-> _deleteImage($id);
	// 	return $this->db->delete($this->_table, array("id_transaksi" => $id));
	// }
}
?>