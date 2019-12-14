<?php defined('BASEPATH') OR exit ('No direct script access allowed');
/**
 *
 */
class Barang_model extends CI_Model
{
	private $_table = "tabel_barang";
	private $_table2 = "tabel_gambar";
	
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

	public function getKat(){
		return $this->db->get('tabel_kategori')->result();
	}
	public function getAll()
	{
		$this->db->order_by('time', 'DESC');
		return $this->db->get($this->_table)->result();
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
	public function save_batch_size()
	{
		return $this->db->insert_batch('tabel_detail_stok', $data);
	}

// public function uploadGambar()
// 	{
// 		$config['upload_path']		= './img/barang/';
// 		$config['allowed_types']	= 'gif|jpg|png';
// 		$config['file_name']			= uniqid();
// 		$config['overwrite']		= true;
// 		$config['max_size']			= 5000;


//        $this->load->library('upload', $config);

// 		if($this->upload->do_upload('gambar')) {
// 			return $this->upload->data("file_name");
// 		}

// 		return "default.jpg";

//    //   $config['upload_path'] = './resources/images/products/';
//    //   $config['allowed_types']        = 'gif|jpg|png';
//    //   $config['max_size']             = 1000;
//    //   $config['max_width']            = 1024;
//    //   $config['max_height']           = 768;
//    //   $this->load->library('upload', $config);
//    //   $this->upload->do_upload('userfile');
//    //      $data = array('prod_image' => $this->upload->data(), 
//    //          'gambar1' => $this->upload->data(),
//    //          'gambar2' => $this->upload->data(),
//    //      	'gambar3' => $this->upload->data(),
//    //          'gambar4' => $this->upload->data(),
// 			// 'gambar5' => $this->upload->data());
            
//    //  	$gambar1=$data['gambar1']['file_name']; 
//    // 		$gambar2=$data['gambar2']['file_name'];
//    //  	$gambar3=$data['gambar3']['file_name'];
//    //  	$gambar4=$data['gambar4']['file_name'];
//    //  	$gambar5=$data['gambar5']['file_name'];

//    //      $data = array
//    //      	(
                
//    //              'gambar1' => $gambar1,
//    //              'gambar2' => $gambar2,
//    //              'gambar3' => $gambar3,
//    //              'gambar4' => $gambar4,
//    //              'gambar5' => $gambar5
//    //          );

//         // insert form data into database
//         // $result_set= $this->tbl_products_model->insertUser($data);


//     }
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

		$this->db->insert($this->_table,$this);
		$this->db->insert_batch('tabel_detail_stok', $data);

	}
	// public function saveGambar()
	// {
	// 	$post = $this->input->post();

	// 	$this->load->helper('string');
	// 	// echo random_string('alnum',5);
	// 	$this->id_barang = random_string('alnum',7);
	// 	$this->nama_barang = $post["nama_barang"];
	// 	$this->id_kategori = $post["id_kategori"];
		
	// 	$this->harga = $post["harga"];
	// 	$this->deskripsi = $post["deskripsi"];
	    

	// 	$this->db->insert($this->_table2,$this);
	// }

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

	// public function updateGambar()
	// {
	// 	$post = $this->input->post();
	// 	$this->id_barang = $post["id"];
	// 	if(!empty($_FILES["gambar"]["name"])) {
	// 		$this->gambar = $this->uploadGambar();
	// 	}else{
	// 		$this->gambar = $post["old_image"];
	// 	}

	// 	$this->db->update($this->_table2, $this, array('id_barang' => $post['id']));
	// }


	public function delete($id)
	{
		// $this-> _deleteImage($id);
		return $this->db->delete($this->_table, array("id_barang" => $id));
	}



	// private function _deleteImage($id)
	// {
	// 	$barang = $this->getById($id);
	// 	if($barang->gambar != "default.jpg"){
	// 		$filename = explode(".", $barang->gambar)[0];
	// 		return array_map('unink',glob(FCPATH."upload/barang/$filename.*"));
	// 	}
	// }

}
?>
