<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('M_register');
    $this->load->library('encryption');
    $this->load->library('encrypt'); 
    $this->load->helper(array('form', 'url'));
  }

    function index(){
    $this->load->view('_frontend/signup');
    }

    public function submit(){
     
    $instansi   = $this->input->post('instansi');
    $alamat     = $this->input->post('alamat');
    $telp       = $this->input->post('telp');    
    $email      = $this->input->post('email');
    $nama       = $this->input->post('nama');
    $nip        = $this->input->post('nip');
    $jabatan    = $this->input->post('jabatan');
    $password   = $this->input->post('password');
    $tanggal    = $this->input->post('dateregistered');
    $status     = $this->input->post('activate');

    $key = $this->config->item('encryption_key');
                    $salt1 = hash('sha512', $key . $password);
                    $salt2 = hash('sha512', $password . $key);
                    $hashed_password = hash('sha512', $salt1 . $password . $salt2);
    
    //memasukan ke array
    $data = array(

      'instansi'   => $instansi,
      'alamat'     => $alamat,
      'telp'       => $telp,
      'email'      => $email,
      'nama'       => $nama,
      'nip'        => $nip,      
      'jabatan'    => $jabatan,
      'password'   => $hashed_password,
      'tanggal'    => date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))),
      'foto'       => 'profil.jpg',
      'status'     => $status
    );

    //tambahkan akun ke database
    $cek = $this->M_register->check_email_availablity($email);

    if ($cek == false) {
            $this->session->set_flashdata('message', ' Email sudah di gunakan !!!');
            redirect('Signup');
          } else {
    $id = $this->M_register->add_account($data);
    
    
    
  //enkripsi id
    $encrypted_id = md5($id);
  
  $this->load->library('email');
    $config = array();
    $config['charset'] = 'utf-8';
    $config['useragent'] = 'Codeigniter';
    $config['protocol']= "smtp";
    $config['mailtype']= "html";
    $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
    $config['smtp_port']= "465";
    $config['smtp_timeout']= "400";
    $config['smtp_user']= "satriyopujonr1@gmail.com"; // isi dengan email kamu
    $config['smtp_pass']= "epsontx121x"; // isi dengan password kamu
    $config['crlf']="\r\n"; 
    $config['newline']="\r\n"; 
    $config['wordwrap'] = TRUE;
    //memanggil library email dan set konfigurasi untuk pengiriman email
      
    $this->email->initialize($config);
    //konfigurasi pengiriman
    $this->email->from($config['smtp_user'],'INDEKS KAMI');
    $this->email->to($email);
    $this->email->subject("Verifikasi Pendaftaran");
    $this->email->message(
      "terimakasih telah melakuan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>".
      site_url("Signup/verification/$encrypted_id")
    );
    

    
    if($this->email->send())
    {
       $this->session->set_flashdata('message', 'Pendaftaran Berhasil , Segera Cek email dan Verifikasi Pendaftaran Anda!');
            redirect('Auth');
    }else
    {
       $this->session->set_flashdata('error_msg', 'Pendaftaran Berhasil , Namun tidak dapat mengirim email verifikasi pendaftaran Anda!');
            redirect('Auth');
    }
    
    
  }}
  
  public function verification($key)
  {
    $this->load->helper('url');
    $this->load->model('M_register');
    $this->M_register->changeActiveState($key);
    $this->load->view('template_email');
  }

}