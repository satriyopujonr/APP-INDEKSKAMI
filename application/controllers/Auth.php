<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_auth');
	}
	
	public function index() {
		$session = $this->session->userdata('status');

		if ($session == '') {
			$this->load->view('_frontend/signin');
		} else {
			redirect('User/Home');
		}
	}

	public function login() {
		$this->form_validation->set_rules('username', 'Email', 'required|min_length[4]|max_length[100]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username');
            $password = $this->input->post('password');

            $key = $this->config->item('encryption_key');
                  	$salt1 = hash('sha512', $key . $password);
                  	$salt2 = hash('sha512', $password . $key);
                  	$hashed_password = hash('sha512', $salt1 . $password . $salt2);


			$data = $this->M_auth->cari_data($username);

			if ($data == false) {
				$this->session->set_flashdata('error_msg', ' Email Anda Belum Terdaftar.');
				redirect('Auth');
			} else {

				$data = $this->M_auth->login($username);

				if ($data == false) {
					$this->session->set_flashdata('error_msg', 'Segera Verifikasi Pendaftaran Anda.');
					redirect('Auth');

				} else {

						$data = $this->M_auth->login2($username,$hashed_password);

						if ($data == false) {
							$this->session->set_flashdata('error_msg', 'Email atau Password salah');
							redirect('Auth');

							} else {

							$session = [
								'userdata' => $data,
								'status' => "Loged in"
							];
							$this->session->set_userdata($session);
							$this ->session->set_flashdata ('msg',show_login_msg ('Selamat Datang Di Aplikasi INDEKS KAMI (Keamanan Informasi) ', '20px'));
							redirect('User/Home');
						}}}
		} else {
			$this->session->set_flashdata('error_msg', validation_errors());
			redirect('Auth');
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('Auth');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */