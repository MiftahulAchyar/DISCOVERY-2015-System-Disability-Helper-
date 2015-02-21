<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function cari($kata)
	{
		$this->db->like('nama_albana',$kata,'both');
		return $this->db->get('albana')->result_array();
	}

}

/* End of file  */
/* Location: ./application/models/ */