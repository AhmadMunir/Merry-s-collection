<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 *
 */
class Barang_model extends CI_Model
{
	private $_table = "tabel_barang";
	private $_view  = "view_barang";

	public $id_barang;
	public $nama_barang;
	public $id_kategori;
	public $gambar;
	public $harga;
	public $stok;


	public function rules()
	{
		return [
			['field'=>'nama_barang',
			'label'=>'Name',
			'rules'=>'required'],
		];
	}

	public function getKat(){
		return $this->db->get('tabel_kategori')->result();
	}
	public function getAll()
	{
		$this->db->order_by('nama_barang', 'ASC');
		return $this->db->get($this->_view)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_view, ["id_barang" => $id])->row();
	}

public function save_batch_size(){
	return $this->db->insert_batch('tabel_detail_stok', $data);
}


public function uploadGambar()
	{
		$config['upload_path']		= './img/barang/';
		$config['allowed_types']	= 'gif|jpg|png';
		$config['file_name']			= uniqid();
		$config['overwrite']		= true;
		$config['max_size']			= 5000;


       $this->load->library('upload', $config);

		if($this->upload->do_upload('gambar')) {
			return $this->upload->data("file_name");
		}
		// cek error
		// print_r($this->upload->display_errors());

		return "default.jpg";
	}
	public function save()
	{
		$post = $this->input->post();

		$this->load->helper('string');
		// echo random_string('alnum',5);
		$this->id_barang = random_string('alnum',7);
		$this->nama_barang = $post["nama_barang"];
		$this->id_kategori = $post["id_kategori"];
		$this->gambar = $this->uploadGambar();
		$this->harga = $post["harga"];
		// $this->stok = $post["stok"];

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
				'deskripsi' => $desk[$index],
			));
			$index++;
		}

		$this->db->insert($this->_table,$this);
		$this->db->insert_batch('tabel_detail_stok', $data);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_barang = $post["id"];
		$this->nama_barang = $post["nama_barang"];
		$this->id_kategori = $post["id_kategori"];

		if(!empty($_FILES["gambar"]["name"])) {
			$this->gambar = $this->uploadGambar();
		}else{
			$this->gambar = $post["old_image"];
		}

		$this->harga = $post["harga"];
		$this->stok = $post["stok"];


		$this->db->update($this->_table, $this, array('id_barang' => $post['id']));
	}


	public function delete($id)
	{
		$this-> _deleteImage($id);
		return $this->db->delete($this->_table, array("id_barang" => $id));
	}



	private function _deleteImage($id)
	{
		$barang = $this->getById($id);
		if($barang->gambar != "default.jpg"){
			$filename = explode(".", $barang->gambar)[0];
			return array_map('unink',glob(FCPATH."upload/barang/$filename.*"));
		}
	}

}
?>
