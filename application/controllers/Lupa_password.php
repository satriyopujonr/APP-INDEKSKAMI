<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Lupa_password extends CI_Controller {
  function __construct()
   {
    parent::__construct();
  $this->load->helper(array('form', 'url'));
  $this->load->helper(array('string', 'text'));
  $this->load->model('M_pengguna');
  $this->load->library('encryption');
  $this->load->library('encrypt'); 
  }
  
     function index(){   

      $this->load->view('_frontend/forgot_password');

    }

    public function kirim_email(){
        date_default_timezone_set("Asia/jakarta");
       
        $email = $this->input->post('email');
       
        $rs = $this->M_pengguna->getByEmail($email);
       
        // cek email ada atau engga
        if (!$rs->num_rows() > 0){
          $this->session->set_flashdata('error_msg', 'Email tidak terdaftar. cek kembali email yang anda masukan!');
          redirect ('Lupa_password/index');
        }
       
        $user = $rs->row();
       
        // get id user
        $user_token = $user->id;
       
        //create valid dan expire token
        $date_create_token = date("Y-m-d H:i");
        $date_expired_token = date('Y-m-d H:i',strtotime('+2 hour',strtotime($date_create_token)));
       
        // create token string
        $tokenstring = md5(sha1($user_token.$date_create_token));
       
        // simpan data token
        $data = array('token'=>$tokenstring,'id'=>$user_token,'created'=>$date_create_token,'expired'=>$date_expired_token);
        $simpan = $this->M_pengguna->simpanToken($data);
       
        if ($simpan > 0){
       
          // email link reset
          $config['protocol'] = "smtp";
          $config['smtp_host'] = "ssl://smtp.googlemail.com";
          $config['smtp_port'] = "465";
          $config['smtp_user'] = "satriyopujonr1@gmail.com"; 
          $config['smtp_pass'] = "epsontx121x"; 
          $config['charset'] = "iso-8859-1";
          $config['mailtype'] = "html";
          $config['newline'] = "\r\n";
       
          $this->email->initialize($config);
       
          $this->email->from('satriyopujonr1@gmail.com', 'INDEKS KAMI');
          $this->email->to($email);
          $this->email->subject('Reset Password');
       
          $this->email->message("
             Token ini berlaku untuk 2 jam dari pengiriman token ini:<br>
             Klik link untuk reset password anda : http://localhost/Indeks_Keamanan_Informasi/Lupa_password/reset/token/".$tokenstring
          );

          if (!$this->email->send()) {
             echo $this->email->print_debugger();
             exit;
          }
          $this->session->set_flashdata('message', 'Silahkan cek email anda!');
       
          redirect ('Auth');
        }
      }

public function reset(){
  date_default_timezone_set("Asia/jakarta");
  $token = $this->uri->segment(4);
 
  // get token ke nodel user
  $cekToken = $this->M_pengguna->cekToken($token);
  $rs = $cekToken->num_rows();
 
  // cek token ada atau engga
  if ($rs > 0){
 
    $data = $cekToken->row();
    $tokenExpired = $data->expired;
    $timenow = date("Y-m-d H:i:s");
 
    // cek token expired atau engga
    if ($timenow < $tokenExpired){
 
      // tampilkan form reset
      $datatoken['token'] = $token;
      $this->load->view('reset_password',$datatoken);
 
    }else{
 
      // redirect form forgot
      $this->session->set_flashdata('error_msg', 'Maaf, Token Anda Sudah Expired! <br> Coba masukkan email anda kembali');
 
      redirect ('Lupa_password/index');
    }
  }else{
    $this->session->set_flashdata('error_msg', 'Maaf, Token Anda Tidak Ditemukan! <br> Coba masukkan email anda kembali');
    redirect ('password/forgot');
  }
}

public function kirim_reset(){
    $this->form_validation->set_rules('password', 'Password Baru', 'trim|required');
    $this->form_validation->set_rules('passkonf', 'Password Konfirmasi', 'trim|required');

    if ($this->form_validation->run() == TRUE) {
      if ($this->input->post('password') != $this->input->post('passkonf')) {
        $this->session->set_flashdata('error_msg', 'Password baru dan password Konfirmasi tidak sama');
        $this->load->view('password_reset');
        } else {
 
  $password = $this->input->post('password');
  $token = $this->input->post('token');
  $cekToken = $this->M_pengguna->cekToken($token);
  $data = $cekToken->row();
  $id = $data->id;

     $key = $this->config->item('encryption_key');
                    $salt1 = hash('sha512', $key . $password);
                    $salt2 = hash('sha512', $password . $key);
                    $hashed_password = hash('sha512', $salt1 . $password . $salt2);
 
   
  // ubah password
  $data = array ('password'=>$hashed_password);
 
  $simpan = $this->M_pengguna->ubahData($data,$id);
 
  if ($simpan > 0){
    $this->session->set_flashdata('message', 'Password Berhasil Dirubah, Silahkan login kembali!');
  }else{
    $this->session->set_flashdata('error_msg', 'Password Gagal Dirubah <br> Cek kembali yang anda masukkan');
  }
  redirect('Auth');
}
}}
    
}
?>