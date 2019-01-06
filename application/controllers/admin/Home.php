<?php
	class Home extends MY_Controller {
		function index() {
			$this->data['temp'] = 'admin/index';
			$this->load->view('admin/index',$this->data);
		}
	}
?>
