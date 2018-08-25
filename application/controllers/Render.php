<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Render extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('Recaptcha');
	}

// Mendapatkan input recaptcha dari user
$captcha_answer = $this->input->post('g-recaptcha-response');

// Verifikasi input recaptcha dari user
$response = $this->recaptcha->verifyResponse($captcha_answer);

// Proses
if ($response['success']) {
    // Code jika sukses
} else {
    // Code jika gagal
}