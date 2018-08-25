<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_login');
	}
	
	public function index() {
		$session = $this->session->userdata('status');

		if ($session == '') {
			$this->load->view('login');
		} else {
			redirect('Home');
		}
	}

	public function login() {
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[15]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username');
            $password = $this->input->post('password');

            $key = $this->config->item('encryption_key');
                  	$salt1 = hash('sha512', $key . $password);
                  	$salt2 = hash('sha512', $password . $key);
                  	$hashed_password = hash('sha512', $salt1 . $password . $salt2);


			$data = $this->M_login->login($username, $hashed_password);

			if ($data == false) {
				$this->session->set_flashdata('error_msg', 'Username / Password Anda Salah.');
				redirect('Login');
			} else {
				$session = [
					'userdata' => $data,
					'status' => "Loged in"
				];
				$this->session->set_userdata($session);
				redirect('Home');
			}
		} else {
			$this->session->set_flashdata('error_msg', validation_errors());
			redirect('Login');
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('Login');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */