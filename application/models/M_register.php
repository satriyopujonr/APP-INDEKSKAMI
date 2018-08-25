<?php
	
	class M_register extends CI_Model {
		function __construct() {
    		parent::__construct();
    	}
		
		
		function add_account($data)
		{
			
            $this->load->database();
			$this->db->insert_id('pengguna',$data);
			$this->db->insert('pengguna',$data);
			$id=$this->db->insert_id();
			
			return  $id;
		}
		
		function changeActiveState($key)
		{
			$this->load->database();
			$data = array(
               'status' => 1
            );

			$this->db->where('md5(id)', $key);
			$this->db->update('pengguna', $data);

			return true;
		}

		function check_email_availablity()
			{
			    $email = trim($this->input->post('email'));
				$email = strtolower($email);	
				
				$query = $this->db->query('SELECT * FROM pengguna where email="'.$email.'"');
				
				if($query->num_rows() > 0)
				return false;
				else
				return true;
			}

		
	}
?>