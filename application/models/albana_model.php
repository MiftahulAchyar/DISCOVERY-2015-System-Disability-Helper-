<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Albana_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insert($nama_albana,$foto,$pemilik,$posisi,$kategori)
	{
		$data = array(
			'nama_albana'=>$nama_albana,
			'foto'=>$foto,
			'pemilik'=>$pemilik,
			'posisi'=>$posisi,
			'kategori'=>$kategori,
		);
		$this->db->insert('albana',$data);
	}

	public function update($id,$nama_albana,$foto,$pemilik,$posisi,$kategori)
	{
		$data = array(
			'nama_albana'=>$nama_albana,
			'foto'=>$foto,
			'pemilik'=>$pemilik,
			'posisi'=>$posisi,
			'kategori'=>$kategori,
		);
		$this->db->where('id',$id);
		return $this->db->update('albana',$data);
	}
}