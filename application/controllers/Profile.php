<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_admin');
	}

	public function index() {
		$data['userdata'] 		= $this->userdata;
		
		$data['page'] 			= "profile";
		$data['judul'] 			= "Profil";
		$data['deskripsi'] 		= "Setting Profile";
		$this->template->views('profile', $data);
	}

	public function update() {
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[15]|xss_clean');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|xss_clean');

		$id = $this->userdata->id;
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'jpg|png';
			
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('foto')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data_foto = $this->upload->data();
				$data['foto'] = $data_foto['file_name'];
			}

			$result = $this->M_admin->update($data, $id);
			if ($result > 0) {
				$this->updateProfil();
				$this->session->set_flashdata('msg', show_succ_msg('Data Profile Berhasil diubah'));
				redirect('Profile');
			} else {
				$this->session->set_flashdata('msg', show_err_msg('Data Profile Gagal diubah'));
				redirect('Profile');
			}
		} else {
			$this->session->set_flashdata('msg', show_err_msg(validation_errors()));
			redirect('Profile');
		}
	}

	public function ubah_password() {
		$this->form_validation->set_rules('passLama', 'Password Lama', 'trim|required|xss_clean');
		$this->form_validation->set_rules('passBaru', 'Password Baru', 'trim|required|xss_clean');
		$this->form_validation->set_rules('passKonf', 'Password Konfirmasi', 'trim|required|xss_clean');

		$password = $this->input->post('passLama');

            $key = $this->config->item('encryption_key');
                  	$salt1 = hash('sha512', $key . $password);
                  	$salt2 = hash('sha512', $password . $key);
                  	$hashed_password = hash('sha512', $salt1 . $password . $salt2);


		$id = $this->userdata->id;
		if ($this->form_validation->run() == TRUE) {
			if ($hashed_password == $this->userdata->password) {
				if ($this->input->post('passBaru') != $this->input->post('passKonf')) {
					$this->session->set_flashdata('msg', show_err_msg('Password Baru dan Konfirmasi Password harus sama'));
					redirect('Profile');
				} else {

					$passBaru = $this->input->post('passBaru');

            		$key = $this->config->item('encryption_key');
                  	$salt1 = hash('sha512', $key . $passBaru);
                  	$salt2 = hash('sha512', $passBaru . $key);
                  	$hash_password = hash('sha512', $salt1 . $passBaru . $salt2);


					$data = [
						'password' => $hash_password
					];

					$result = $this->M_admin->update($data, $id);
					if ($result > 0) {
						$this->updateProfil();
						$this->session->set_flashdata('msg', show_succ_msg('Password Berhasil diubah'));
						redirect('Profile');
					} else {
						$this->session->set_flashdata('msg', show_err_msg('Password Gagal diubah'));
						redirect('Profile');
					}
				}
			} else {
				$this->session->set_flashdata('msg', show_err_msg('Password Salah'));
				redirect('Profile');
			}
		} else {
			$this->session->set_flashdata('msg', show_err_msg(validation_errors()));
			redirect('Profile');
		}
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */