<?php
	class MY_Controller extends CI_Controller {
		public $data = array();
		function __construct() {
			parent::__construct();

			$controller = $this->uri->segment(2);

			switch ($controller) {
				case "admin" :{
					//admin
					$this->load->helper('admin');
					$this->check_login();
					break;
				}
				default : {
					//echo "This is a client panel";
				}
			}
		}

		private function check_login() {
			$controller = $this->uri->segment(2);
			$controller = strtolower($controller);

			$login = $this->session->userdata('login');
			//echo $login;
			//die();
			if(!$login && $controller != 'login' ) {
				redirect("http://localhost/digital/admin/login");
			}
			if($login && $controller == 'login') {
				redirect("http://localhost/digital/admin/admin");
			}
		}

	}
?>
