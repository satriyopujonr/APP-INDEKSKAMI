<?php
	class Template_user {
		protected $_ci;

		function __construct() {
			$this->_ci = &get_instance(); //Untuk Memanggil function load, dll dari CI. ex: $this->load, $this->model, dll
		}

		function views($template_user = NULL, $data = NULL) {
			if ($template_user != NULL) {
				// head
				$data['_meta'] 					= $this->_ci->load->view('view_user/_layout/_meta', $data, TRUE);
				$data['_css'] 					= $this->_ci->load->view('view_user/_layout/_css', $data, TRUE);
				
				// Header
					$data['_nav'] 				= $this->_ci->load->view('view_user/_layout/_nav', $data, TRUE);
				$data['_header'] 				= $this->_ci->load->view('view_user/_layout/_header', $data, TRUE);
				
				//Sidebar
				$data['_sidebar'] 				= $this->_ci->load->view('view_user/_layout/_sidebar', $data, TRUE);
				
				//Content
					$data['_headerContent'] 	= $this->_ci->load->view('view_user/_layout/_headerContent', $data, TRUE);
					$data['_mainContent'] 		= $this->_ci->load->view($template_user, $data, TRUE);
				$data['_content'] 				= $this->_ci->load->view('view_user/_layout/_content', $data, TRUE);
				
				//Footer
				$data['_footer'] 				= $this->_ci->load->view('view_user/_layout/_footer', $data, TRUE);
				
				//JS
				$data['_js'] 					= $this->_ci->load->view('view_user/_layout/_js', $data, TRUE);

				echo $data['_template'] 		= $this->_ci->load->view('view_user/_layout/_template', $data, TRUE);
			}
		}
	}
?>