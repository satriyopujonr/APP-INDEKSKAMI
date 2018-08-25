<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna extends CI_Model {
	public function select_all_pengguna() {
		$sql = "SELECT * FROM pengguna";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all() {
		$data = $this->db->get('pengguna');

		return $data->result();
	}


	public function select_by_id($id) {
		$sql = "SELECT * FROM pengguna WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}


	public function update($data) {
		$sql = "UPDATE pengguna SET nama='" .$data['nama'] ."', alamat='" .$data['alamat'] ."', telp='" .$data['telp'] ."', id_kota=" .$data['kota'] .", id_provinsi=" .$data['provinsi'] .", id_kelamin=" .$data['jk'] .", id_posisi=" .$data['posisi'] ." WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function total_rows() {
		$data = $this->db->get('pengguna');

		return $data->num_rows();
	}

	public function R1()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('tanggal <','2018-01-31');
		$this->db->where('tanggal >','2018-01-01');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function R2()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('tanggal <','2018-02-31');
		$this->db->where('tanggal >','2018-02-01');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function R3()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('tanggal <','2018-03-31');
		$this->db->where('tanggal >','2018-03-01');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function R4()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('tanggal <','2018-04-31');
		$this->db->where('tanggal >','2018-04-01');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function R5()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('tanggal <','2018-05-31');
		$this->db->where('tanggal >','2018-05-01');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function R6()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('tanggal <','2018-06-31');
		$this->db->where('tanggal >','2018-06-01');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function R7()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('tanggal <','2018-07-31');
		$this->db->where('tanggal >','2018-07-01');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function R8()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('tanggal <','2018-08-31');
		$this->db->where('tanggal >','2018-08-01');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function R9()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('tanggal <','2018-09-31');
		$this->db->where('tanggal >','2018-09-01');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function R10()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('tanggal <','2018-10-31');
		$this->db->where('tanggal >','2018-10-01');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function R11()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('tanggal <','2018-11-31');
		$this->db->where('tanggal >','2018-11-01');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function R12()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('tanggal <','2018-12-31');
		$this->db->where('tanggal >','2018-12-01');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function Departemen()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->like('instansi','Departemen');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function PT()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->like('instansi','PT');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function Direktorat()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->like('instansi','Direktorat');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function Universitas()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->like('instansi','Universitas');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function Lain()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->not_like('instansi','Universitas');
		$this->db->not_like('instansi','Direktorat');
		$this->db->not_like('instansi','PT');
		$this->db->not_like('instansi','Departemen');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getByEmail($email)
	{
	  $this->db->where('email',$email);
	  $result = $this->db->get('pengguna');
	  return $result;
	}
 
	public function simpanToken($data)
	{
	  $this->db->insert('forgot_password', $data);
	  return $this->db->affected_rows();
	}
 
	public function cekToken($token)
	{
	  $this->db->where('token',$token);
	  $result = $this->db->get('forgot_password');
	  return $result;
	}

	public function ubahData($data,$id){
		$this->db->where("id", $id);
		$this->db->update("pengguna", $data);


		return $this->db->affected_rows();
	}
}

/* End of file M_pengguna.php */
/* Location: ./application/models/M_pengguna.php */