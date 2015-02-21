<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function cek($tabel,$nama,$username,$password)
	{
		$hasil = $this->db->where($nama,$username)
						  ->where('password',$password)
			 	 		  ->limit(1)
				 		  ->get($tabel);
		if($hasil->num_rows() > 0)
			return true;
		else
			return false;

	}
}

/* End of file  */
/* Location: ./application/models/ */