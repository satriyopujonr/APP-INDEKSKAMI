<?php
  defined('BASEPATH') OR exit('No direct script access allowed');


  class M_reg extends CI_model
  {

      function reg($data)
          {
            $password = $this->input->post('password');
            $key = $this->config->item('encryption_key');
            $salt1 = hash('sha512', $key . $password);
            $salt2 = hash('sha512', $password . $key);
            $hashed_password = hash('sha512', $salt1 . $password . $salt2);

            $dat= array(
              'nama'      => $this->input->post('nama') ,
              'email'     => $this->input->post('email') ,
              'password' => $hashed_password,
                        );
                        $data = $this->security->xss_clean($dat);
                        $cek=$this->db->insert('users',$data);
                        return $data;
          }


    }
