<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_posisi extends CI_Model {
	public function select_all() {
		$data = $this->db->get('posisi');

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM posisi WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_pengguna($id) {
		$sql = " SELECT pengguna.id AS id, pengguna.nama AS pengguna, pengguna.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pengguna, kota, kelamin, posisi WHERE pengguna.id_kelamin = kelamin.id AND pengguna.id_posisi = posisi.id AND pengguna.id_kota = kota.id AND pengguna.id_posisi={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO posisi VALUES('','" .$data['posisi'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('posisi', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE posisi SET nama='" .$data['posisi'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM posisi WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('posisi');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('posisi');

		return $data->num_rows();
	}
}

/* End of file M_posisi.php */
/* Location: ./application/models/M_posisi.php */