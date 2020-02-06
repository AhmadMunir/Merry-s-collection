<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 *
 */
class Barang_model extends CI_Model
{
	private $_table = "tabel_barang";
	private $_table2 = "tabel_gambar";
	private $_table3 = "view_barang";
	private $_view  = "view_barang";

	public $id_barang;
	public $nama_barang;
	public $id_kategori;
	public $harga;
	public $deskripsi;

	public function rules()
	{
		return [
			['field'=>'nama_barang',
			'label'=>'Name',
			'rules'=>'required'],
		];
	}

	public function page()
	{
		$query = $this->db->get('tabel_barang',$limit,$start);
		$return = $query;
	}

	public function getKat(){
		return $this->db->get('tabel_kategori')->result();
	}
	public function getAll()
	{
		$this->db->order_by('time', 'desc');
		return $this->db->get($this->_table3)->result();
	}


	public function getTambah()
	{
		$this->db->limit(1);
		$this->db->order_by('time', 'DESC');
		return $this->db->get('tabel_barang')->result();	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_barang" => $id])->row();
	}
	public function save_batch_size($data)
	{
		return $this->db->insert_batch('tabel_detail_stok', $data);
	}

	public function save_batch_kat($data)
	{
		return $this->db->insert_batch('tabel_detail_stok', $data);
	}

	public function save()
	{
		$post = $this->input->post();

		$this->load->helper('string');
		// echo random_string('alnum',5);
		$this->id_barang = random_string('alnum',7);
		$this->nama_barang = $post["nama_barang"];
		$this->id_kategori = $post["id_kategori"];

		$this->harga = $post["harga"];
		$this->deskripsi = $post["deskripsi"];

		// $id_kategori = $post['id_kategori'];

		// $data = array();

		// $index = 0;

		// foreach ($kategori as $kat) {
		// 	# code...
		// 	array_push($data, array(
		// 		'id_kategori'
		// 	))
		// }
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
		// $this->save_batch_kat($data);

	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_barang = $post["id"];
		$this->nama_barang = $post["nama_barang"];
		$this->id_kategori = $post["id_kategori"];
		$this->harga = $post["harga"];
		$this->deskripsi = $post["deskripsi"];


		$this->db->update($this->_table, $this, array('id_barang' => $post['id']));
	}


	public function delete($id)
	{
		// $this-> _deleteImage($id);
		return $this->db->delete($this->_table, array("id_barang" => $id));
	}

	public function detail($where){
		$this->db->where($where);
		return $this->db->get('tabel_barang')->result();
	}
	public function gambar($where){
		$this->db->where($where);
		return $this->db->get('tabel_gambar')->result();
	}
	public function stok($where){
		$this->db->where($where);
		return $this->db->get('tabel_detail_stok')->result();
	}

}
?>
