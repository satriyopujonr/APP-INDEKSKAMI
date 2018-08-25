<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	public function login($user, $hashed_password) {
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username', $user);
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