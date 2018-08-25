<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_auth');
		$this->load->library('recaptcha');
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
		$this->form_validation->set_rules('g-recaptcha-response', 'Google Captcha', 'required|xss_clean');

		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username');
            $password = $this->input->post('password');
            $captcha_answer = $this->input->post('g-recaptcha-response');


				// Verify user's answer
				$response = $this->recaptcha->verifyResponse($captcha_answer);

				// Processing ...
				if ($response['success']) {
				    // Your success code here
				} else {
				    // Something goes wrong
				    var_dump($response);
				}

            $key = $this->config->item('encryption_key');
                  	$salt1 = hash('sha512', $key . $password);
                  	$salt2 = hash('sha512', $password . $key);
                  	$hashed_password = hash('sha512', $salt1 . $password . $salt2);


			$data = $this->M_auth->login($username, $hashed_password);

			if ($data == false) {
				$this->session->set_flashdata('error_msg', 'Username / Password Anda Salah.');
				redirect('Auth');
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