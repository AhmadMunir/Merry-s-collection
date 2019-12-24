<?php
class M_register extends CI_Model
{
	private $table = "tabel_user";
	
	function cek_register($table,$where)
	{
		return $this->db->get_where($table,$where);
	}

	public function save($register)
    {
        $this->db->insert("tabel_user", $register);
    }

    public function kode()
     {
          $this->db->select('LEFT(tabel_user.id_user, 4) as id_user', FALSE);
          $this->db->order_by('id_user', 'DESC');
          $this->db->limit(1);
          $query = $this->db->get('tabel_user');  //cek dulu apakah ada sudah ada kode di tabel.    
          if ($query->num_rows() <> 0) {
               //cek kode jika telah tersedia    
               $data = $query->row();
               $kode = intval($data->id_user) + 1;
          } else {
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
          $id_user = $this->session->userdata("id_user");
          $tgl = date('dmY');
          $D = date('d');
          $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
          $kodetampil = $batas . "/" . $id_user . "/" . $D . "/XXXX" . "/" . $tgl . "/Q";  //format kode
          return $kodetampil;
     }
}
?>