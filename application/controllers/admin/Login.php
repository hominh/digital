<?php
	class Login extends MY_Controller {
		function index() {
			$data = array();
			$data['temp'] = 'admin/login/index';
			$this->load->view('admin/login/index',$data);
			$this->load->library('form_validation');
			$this->load->helper('form');
			if($this->input->post()) {
				$this->form_validation->set_rules('login','login','callback_check_login');
				if($this->form_validation->run() == TRUE) {
					//redirect(base_url()."admin/admin");
					switch ($_SESSION['admin_group_id']) {
		                case '1':
		                    redirect(base_url()."admin/no_permission");
		                    break;
						case '2':
							redirect(base_url()."admin/admin");
		                default:
		                    # code...
		                    break;
		            }
				}
			}
		}

		function check_login() {
			$this->load->library('session');

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$password = md5($password);
			$this->load->model('admin_model');
			$where = array('username' => $username, 'password' => $password);
			if($this->admin_model->check_exists($where)) {
				$result = $this->admin_model->getDataLogin($username,$password);
				foreach ($result as $row) {
					$sess_data = [
		                'username' => $row->username,
		                //'user_id' => $row->id,
						'admin_group_id' => $row->admin_group_id,
						'KCFINDER' => array(
              				'disabled' => false,
              				'uploadURL' => base_url().'uploads/images/'
        				),
		            ];
				}
				$this->session->set_userdata($sess_data);
				return true;
			}
			$this->form_validation->set_message(__FUNCTION__,'Wrong username or password, try again ! ');
			return false;
		}
	}
?>
