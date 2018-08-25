<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	public function cari_data($user) {
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('email', $user);

		$data = $this->db->get();

		if ($data->num_rows() == 1) {
			return $data->row();
		} else {
			return false;
		}
	}

	public function login($user, $x=1) {
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('email', $user);
		$this->db->where('status',$x);

		$data = $this->db->get();

		if ($data->num_rows() == 1) {
			return $data->row();
		} else {
			return false;
		}
	}

	public function login2($user, $hashed_password) {
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('email', $user);
		$this->db->where('password', $hashed_password);

		$data = $this->db->get();

		if ($data->num_rows() == 1) {
			return $data->row();
		} else {
			return false;
		}
	}
}

/* End of file M_auth.php */
/* Location: ./application/models/M_auth.php */