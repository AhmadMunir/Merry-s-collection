<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 *
 */
class Gambar_model extends CI_Model
{
	private $_table = "tabel_galeri";

	public $id_gambar;
	public $nama_gambar;

	public function rules()
	{
		return [
			['field'=>'nama_gambar',
			'label'=>'name',
			'rules'=>'required'],
		];
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_gambar" => $id])->row();
	}


	public function uploadGambar()
	{
		$config['upload_path'] = './img/galeri/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['file_name']	= uniqid(); //nama yang terupload nantinya
 
        $this->load->library('upload',$config);
        for ($i=1; $i <=5 ; $i++) { 
            if(!empty($_FILES['filefoto'.$i]['name'])){
                if(!$this->upload->do_upload('filefoto'.$i))
                    $this->upload->display_errors();  
                else{
                	return $this->upload->data("file_name");
                    echo "Foto berhasil di upload";
                }

            }
        }
                 
    }
	public function save()
	{
		$post = $this->input->post();

		$this->load->helper('string');
		// echo random_string('alnum',5);
		$this->id_gambar = random_string('alnum',7);
		$this->gambar = $this->uploadGambar();
		// $this->stok = $post["stok"];

		// Stok
		$size = $_POST['size'];
		$desk = $_POST['desk'];
		$stok = $_POST['stok'];

		$data = array();

		$index = 0;

		foreach ($size as $siz) {
			array_push($data, array(
				'id_gambar' => $this->id_gambar,
				'jumlah_stok' => $stok[$index],
				'size' => $size[$index],
				'deskripsi' => $desk[$index],
			));
			$index++;
		}

	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_gambar = $post["id"];
		$this->id_kategori = $post["id_kategori"];

		if(!empty($_FILES["gambar"]["name"])) {
			$this->gambar = $this->uploadGambar();
		}else{
			$this->gambar = $post["old_image"];
		}

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
			return array_map('unink',glob(FCPATH."upload/galeri/$filename.*"));
		}
	}

}
?>
