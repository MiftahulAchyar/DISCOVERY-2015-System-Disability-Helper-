<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelatihan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insert($judul,$tanggal,$tempat,$penyelenggara,$banner,$kategori,$biaya=0,$kontak,$detail)
	{
		$data = array(
			'judul'=>$judul,
			'tanggal'=>$tanggal,
			'tempat'=>$tempat,
			'penyelenggara'=>$penyelenggara,
			'banner'=>$banner,
			'kategori'=>$kategori,
			'biaya'=>$biaya,
			'kontak'=>$kontak,
			'detail'=>$detail
		);
		$this->db->insert('pelatihan',$data);
	}

	public function update($id,$judul,$tanggal,$tempat,$penyelenggara,$banner,$kategori,$biaya,$kontak,$detail)
	{
		$data = array(
			'judul'=>$judul,
			'tanggal'=>$tanggal,
			'tempat'=>$tempat,
			'penyelenggara'=>$penyelenggara,
			'banner'=>$banner,
			'kategori'=>$kategori,
			'biaya'=>$biaya,
			'kontak'=>$kontak,
			'detail'=>$detail
		);
		$this->db->where('id',$id);
		return $this->db->update('pelatihan',$data);
	}
}