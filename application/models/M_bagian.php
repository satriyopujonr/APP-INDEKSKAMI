<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bagian extends CI_Model {
	public function select_all() {
		$data = $this->db->get('bagian');

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM bagian WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	function keterangan1()
	{
		$this->db->select('*');
		$this->db->from('bagian');
		$this->db->where('id=1');
		$query=$this->db->get();
		if ($query->num_rows()>0) { return $query->result(); }
		else {return array() ; }
	}

	function keterangan2()
	{
		$this->db->select('*');
		$this->db->from('bagian');
		$this->db->where('id=2');
		$query=$this->db->get();
		if ($query->num_rows()>0) { return $query->result(); }
		else {return array() ; }
	}

	function keterangan3()
	{
		$this->db->select('*');
		$this->db->from('bagian');
		$this->db->where('id=3');
		$query=$this->db->get();
		if ($query->num_rows()>0) { return $query->result(); }
		else {return array() ; }
	}

	function keterangan4()
	{
		$this->db->select('*');
		$this->db->from('bagian');
		$this->db->where('id=4');
		$query=$this->db->get();
		if ($query->num_rows()>0) { return $query->result(); }
		else {return array() ; }
	}

	function keterangan5()
	{
		$this->db->select('*');
		$this->db->from('bagian');
		$this->db->where('id=5');
		$query=$this->db->get();
		if ($query->num_rows()>0) { return $query->result(); }
		else {return array() ; }
	}

	function keterangan6()
	{
		$this->db->select('*');
		$this->db->from('bagian');
		$this->db->where('id=6');
		$query=$this->db->get();
		if ($query->num_rows()>0) { return $query->result(); }
		else {return array() ; }
	}


	public function insert($data) {
		$sql = "INSERT INTO bagian VALUES('','" .$data['bagian'] ."','" .$data['bagian'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('bagian', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE bagian SET nama='" .$data['bagian'] ."', keterangan='" .$data['keterangan'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM bagian WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('bagian');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('bagian');

		return $data->num_rows();
	}
}

/* End of file M_bagian.php */
/* Location: ./application/models/M_bagian.php */