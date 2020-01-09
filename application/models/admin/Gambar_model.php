<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 *
 */
class Gambar_model extends CI_Model
{
	private $_table = "tabel_gambar";
	private $_table2 = "tabel_barang";


	public $id_gambar;
	public $id_barang;
	public $gambar;
	public $gambar2;
	public $gambar3;
	public $gambar4;
	public $gambar5;



	public function rules()
	{
		return [
			['field'=>'id_barang',
			'label'=>'Name',
			'rules'=>'required'],
		];
	}

	public function getTambah()
	{
		$this->db->limit(1);
		$this->db->order_by("time", 'desc');
		return $this->db->get($this->_table2)->result();
	}

	public function getAll()
	{
		$this->db->limit(1);
		$this->db->order_by("id_gambar");
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_gambar" => $id])->row();
	}


	public function uploadgambar()
	{

		$config['upload_path']		= './img/barang/';
		$config['allowed_types']	= 'gif|jpg|png';
		$config['file_name']		= uniqid();
		$config['max_size']			= 5000;


       $this->load->library('upload', $config);

		if($this->upload->do_upload('gambar')) {
			return $this->upload->data("file_name");
		}

		return "default.jpg";

	}


	public function uploadgambar2()
	{
		$config['upload_path']		= './img/barang/';
		$config['allowed_types']	= 'gif|jpg|png';
		$config['max_size']			= 5000;

       $this->load->library('upload', $config);

		if($this->upload->do_upload('gambar2')) {
			return $this->upload->data("file_name");
		}
	}
	public function uploadgambar3()
	{
		$config['upload_path']		= './img/barang/';
		$config['allowed_types']	= 'gif|jpg|png';
		$config['max_size']			= 5000;

       $this->load->library('upload', $config);

		if($this->upload->do_upload('gambar3')) {
			return $this->upload->data("file_name");
		}
	}
	public function uploadgambar4()
	{
		$config['upload_path']		= './img/barang/';
		$config['allowed_types']	= 'gif|jpg|png';
		$config['max_size']			= 50000;

       $this->load->library('upload', $config);

		if($this->upload->do_upload('gambar4')) {
			return $this->upload->data("file_name");
		}
	}
	public function uploadgambar5()
	{
		$config['upload_path']		= './img/barang';
		$config['allowed_types']	= 'gif|jpg|png';
		$config['max_size']			= 50000;

       $this->load->library('upload', $config);

		if($this->upload->do_upload('gambar5')) {
			return $this->upload->data("file_name");
		}
	}

	public function save()
	{
		$post = $this->input->post();
		$this->id_barang = $post["id_barang"];
		$this->gambar  = $this->uploadgambar();
		$this->gambar2 = $this->uploadgambar2();
		$this->gambar3 = $this->uploadgambar3();
		$this->gambar4 = $this->uploadgambar4();
		$this->gambar5 = $post = $this->uploadgambar5();
		$this->db->insert($this->_table,$this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_gambar = $post["id"];
		$this->nama_gambar = $post["nama_gambar"];

		if(!empty($_FILES["gambar"]["name"])) {
			$this->gambar = $this->uploadgambar();
		}else{
			$this->gambar = $post["old_image"];
		}

		$this->tulisan_sedang = $post["tulisan_sedang"];
		$this->tulisan_kecil = $post["tulisan_kecil"];


		$this->db->update($this->_table, $this, array('id_gambar' => $post['id']));
	}


	public function delete($id)
	{
		$this-> _deleteImage($id);
		return $this->db->delete($this->_table, array("id_gambar" => $id));
	}



	private function _deleteImage($id)
	{
		$gambar = $this->getById($id);
		if($gambar->gambar != "default.jpg"){
			$filename = explode(".", $gambar->gambar)[0];
			return array_map('unink',glob(FCPATH."upload/gambar/$filename.*"));
		}
	}

}
?>
