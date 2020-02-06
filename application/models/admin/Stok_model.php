<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 *
 */
class Stok_model extends CI_Model
{
	private $_table = "tabel_detail_stok";


	public $id_detail_stok;
	public $id_barang;



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
	public function get($id)
	{

		return $this->db->get_where($this->_table, ["id_barang" => $id])->row();
	}
	public function save_batch_size($data)
	{
		return $this->db->insert_batch('tabel_detail_stok', $data);
	}


	public function tambah()
	{
		$post = $this->input->post();

		$this->load->helper('string');
		// echo random_string('alnum',5);
		$this->id_barang = $post["id_barang"];
		
		// Stok

		$size = $_POST['size'];
		$desk = $_POST['desk'];
		$stok = $_POST['stok'];

		$data = array();

		$index = 0;

		foreach ($size as $siz) {
			array_push($data, array(
				'id_barang' => $this->id_barang,
				'jumlah_stok' => $stok[$index],
				'size' => $size[$index],
				'deskripsi_ukuran' => $desk[$index],
			));
			$index++;
		}

		// echo json_encode($data);
		$this->db->insert($this->_table,$this);
		$this->save_batch_size($data);

	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_detail_stok = $post["id"];
		$this->id_barang 	= $post["id_barang"];
		$this->size 		= $post["size"];
		$this->deskripsi_ukuran = $post["deskripsi_ukuran"];
		$this->jumlah_stok 		= $post["jumlah_stok"];
		$this->db->update($this->_table, $this, array('id_detail_stok' => $post['id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array('id_detail_stok' => $id));
	}

}
?>
