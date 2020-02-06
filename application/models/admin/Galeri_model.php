<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 *
 */
class Galeri_model extends CI_Model
{
	private $_table = "tabel_galeri";

	public $id_galeri;
	public $judul;
	public $gambar;
	public $gambar2;
	public $gambar3;
	public $gambar4;
	public $gambar5;



	public function rules()
	{
		return [
			['field'=>'judul',
			'label'=>'Name',
			'rules'=>'required'],
		];
	}


	public function getAll()
	{
		$this->db->order_by('id_galeri', 'DESC');
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_galeri" => $id])->row();
	}


	public function uploadgambar()
	{

		$config['upload_path']		= './img/galeri/';
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
		$config['upload_path']		= './img/galeri/';
		$config['allowed_types']	= 'gif|jpg|png';
		$config['max_size']			= 5000;

       $this->load->library('upload', $config);

		if($this->upload->do_upload('gambar2')) {
			return $this->upload->data("file_name");
		}
	}
	public function uploadgambar3()
	{
		$config['upload_path']		= './img/galeri/';
		$config['allowed_types']	= 'gif|jpg|png';
		$config['max_size']			= 5000;

       $this->load->library('upload', $config);

		if($this->upload->do_upload('gambar3')) {
			return $this->upload->data("file_name");
		}
	}
	public function uploadgambar4()
	{
		$config['upload_path']		= './img/galeri/';
		$config['allowed_types']	= 'gif|jpg|png';
		$config['max_size']			= 50000;

       $this->load->library('upload', $config);

		if($this->upload->do_upload('gambar4')) {
			return $this->upload->data("file_name");
		}
	}
	public function uploadgambar5()
	{
		$config['upload_path']		= './img/galeri';
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
		$this->judul = $post["judul"];
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
		$this->id_galeri = $post["id"];
		$this->judul = $post["judul"]; 
		if(!empty($_FILES["gambar"]["name"])) {
			$this->gambar = $this->uploadgambar();
		}else{
			$this->gambar = $post["old_image"];
		}
		if(!empty($_FILES["gambar2"]["name"])) {
			$this->gambar2 = $this->uploadgambar2();
		}else{
			$this->gambar2 = $post["old_image2"];
		}
		if(!empty($_FILES["gambar3"]["name"])) {
			$this->gambar3 = $this->uploadgambar3();
		}else{
			$this->gambar3 = $post["old_image3"];
		}
		if(!empty($_FILES["gambar4"]["name"])) {
			$this->gambar4 = $this->uploadgambar4();
		}else{
			$this->gambar4 = $post["old_image4"];
		}
		if(!empty($_FILES["gambar5"]["name"])) {
			$this->gambar5 = $this->uploadgambar5();
		}else{
			$this->gambar5 = $post["old_image5"];
		}


		$this->db->update($this->_table, $this, array('id_galeri' => $post['id']));
	}


	public function delete($id)
	{
		$this-> _deleteImage($id);
		return $this->db->delete($this->_table, array("id_galeri" => $id));
	}



	private function _deleteImage($id)
	{
		$galeri = $this->getById($id);
		if($galeri->galeri != "default.jpg"){
			$filename = explode(".", $galeri->galeri)[0];
			return array_map('unink',glob(FCPATH."upload/galeri/$filename.*"));
		}
	}

}
?>
