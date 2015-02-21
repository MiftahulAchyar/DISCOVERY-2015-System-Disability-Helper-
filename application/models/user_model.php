<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insert($nama,$password,$email,$telp)
	{
		$data = array(
			'nama'=>$nama,
			'password'=>$password,
			'email'=>$email,
			'telp'=>$telp		
			);
		$this->db->insert('user',$data);
	}

	public function update($id,$nama,$password,$email,$telp)
	{
		$data = array(
			'nama'=>$nama,
			'password'=>$password,
			'email'=>$email,
			'telp'=>$telp
		);
		$this->db->where('id',$id);
		return $this->db->update('user',$data);
	}
}