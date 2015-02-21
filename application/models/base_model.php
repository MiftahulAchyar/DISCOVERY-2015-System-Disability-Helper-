<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base_model extends CI_Model {
	
	public function getall($tabel,$kolom='id')
	{
		$query = $this->db->query('select * from '.$tabel.' order by '.$kolom.' asc'); 
		return $query->result_array();
	}

	public function getmore($tabel,$data)
	{
		$query = $this->db->get_where($tabel,$data); 
		return $query->result_array();
	}

	public function getone($tabel,$primary_key,$value)
	{
		$query = $this->db->get_where($tabel,array($primary_key=>$value));
		return $query->result_array(); 
	}

	public function getlimit($tabel,$limit,$offset,$kolom='id',$typeorder='asc')
	{
		$query = $this->db->query('select * from '.$tabel.' order by '.$kolom.' '.$typeorder.' limit '.$limit.','.$offset);
		return $query->result_array();
	}

	public function getwherelimit($tabel,$data,$awal=0,$jumlah=3)
	{
		$query = $this->db->get_where($tabel,$data,$jumlah,$awal); 
		return $query->result_array();
	}

	public function count_record($tabel)
	{
		return $this->db->count_all($tabel);
	}

	public function count_result($tabel,$data)
	{
		$this->db->get_where($tabel,$data);
		return $this->db->count_all_results();
	}

	public function delete($tabel,$data)
	{
		return $this->db->delete($tabel,$data);
	}

	public function droptable($tabel)
	{
		return $this->db->empty_table($tabel);
	}

}