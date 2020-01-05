<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 *
 */
class Baner_model extends CI_Model
{
	private $_table = "tabel_baner";

	public $id_baner;
	public $nama_baner;
	public $baner;
	public $tulisan_sedang;
	public $tulisan_kecil;



	public function rules()
	{
		return [
			['field'=>'baner',
			'label'=>'Image',
			'rules'=>'required'],
		];
	}

	public function getAll()
	{
		$this->db->order_by('nama_baner', 'ASC');
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_baner" => $id])->row();
	}


public function uploadbaner()
	{
		$config['upload_path']		= './img/banner/';
		$config['allowed_types']	= 'gif|jpg|png';
		$config['file_name']			= uniqid();
		$config['overwrite']		= true;
		$config['max_size']			= 5000;


       $this->load->library('upload', $config);

		if($this->upload->do_upload('baner')) {
			return $this->upload->data("file_name");
		}

		return "default.jpg";
	}
	public function save()
	{
		$post = $this->input->post();
		// $this->id_baner = 1;
		$this->nama_baner = $post["nama_baner"];
		$this->baner = $this->uploadbaner();
		$this->tulisan_sedang = $post["tulisan_sedang"];
		$this->tulisan_kecil = $post["tulisan_kecil"];
		$this->db->insert($this->_table,$this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_baner = $post["id"];
		$this->nama_baner = $post["nama_baner"];

		if(!empty($_FILES["baner"]["name"])) {
			$this->baner = $this->uploadbaner();
		}else{
			$this->baner = $post["old_image"];
		}

		$this->tulisan_sedang = $post["tulisan_sedang"];
		$this->tulisan_kecil = $post["tulisan_kecil"];


		$this->db->update($this->_table, $this, array('id_baner' => $post['id']));
	}


	public function delete($id)
	{
		$this-> _deleteImage($id);
		return $this->db->delete($this->_table, array("id_baner" => $id));
	}



	private function _deleteImage($id)
	{
		$baner = $this->getById($id);
		if($baner->baner != "default.jpg"){
			$filename = explode(".", $baner->baner)[0];
			return array_map('unink',glob(FCPATH."upload/baner/$filename.*"));
		}
	}

}
?>
