<?php
class Laporan_model extends CI_Model
{
	function getlaporan_transaksi()
	{
		return $this->db->get('laporan_transaksi')->result();
	}
	function getlaporan_transaksi_bulan($bulan,$tahun)
	{
		$this->db->where('Month(tanggal)', $bulan);
		$this->db->where('Year(tanggal)', $tahun);
		return $this->db->get('laporan_transaksi')->result();
	}

	function getdate_year()
	{
		return $this->db->query("select DISTINCT YEAR(tanggal) as tgl from laporan_transaksi")->result();
	}
}
?>