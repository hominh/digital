<?php
    class Admin extends MY_Controller {
		/**
		 * Admin constructor.
		 */
		function __construct() {
            parent::__construct();
            $this->load->library('session');
            $this->load->model('admin_model');
            $this->load->helper('admin');
        }

        function index() {
            $input = array();
            $list = $this->admin_model->get_list($input);
            $this->data['list'] = $list;
            $message = $this->session->flashdata('message');
            $this->data['message'] = $message;
            $user_data = $this->session->userdata('login');
            $this->load->view('admin/home/index',$this->data);
        }


        function create() {
			$this->load->library('form_validation');
			$this->load->helper('form');

			if($this->input->post()) {
				$this->form_validation->set_rules('name','Tên','required|min_length[8]');
				$this->form_validation->set_rules('username','Tài khoản đăng nhập','required|callback_check_username');
				$this->form_validation->set_rules('password','Mật khẩu','required|min_length[6]');
				$this->form_validation->set_rules('repassword','Nhập lại mật khẩu','matches[password]');
				//die("aa: ".$this->form_validation->run());
				if($this->form_validation->run() == TRUE) {
					//die("this->form_validation->run()");
					$name = $this->input->post('name');
					$username = $this->input->post('username');
					$password = $this->input->post('password');
                    $password = md5($password);
					$admin_group_id = 1;
					$data = array(
						'name'	=>	$name,
						'username'	=>	$username,
						'password'	=>	$password,
						'admin_group_id' => $admin_group_id
					);
					if($this->admin_model->create($data)) {
						$this->session->set_flashdata('message','Insert data successfully');
					}
					else {
						$this->session->set_flashdata('message','Insert data unsuccessful');
					}
					redirect(base_url()."admin/admin");
				}

			}
			$redirect(base_url()."admin/admin");
        }

        function update() {
            $id = '1';
            $data = array();
            $data['username'] = 'nhuquynh3';
            $data['password'] = 'nhuquynh4';
            $data['name'] = 'Bui Nhu Quynh5';
            if($this->admin_model->update($id, $data)) {
                echo "Update successfully";
            }
            else {
                echo "Update unsuccessful";
            }
        }

        function delete() {
            $id = $this->uri->segment('4');
            $id = intval($id);
            $info = $this->admin_model->get_info($id);
            if(!$info) {
                $this->session->set_flashdata('message','Không tồn tại quản trị viên');
                redirect(base_url()."admin/admin");
            }
            $this->admin_model->delete($id);
            $this->session->set_flashdata('message','Delete data successfully');
            redirect(base_url()."admin/admin");
        }

        function check_username() {
			$username = $this->input->post('username');
			$where = array('username' => $username);
			if($this->admin_model->check_exists($where)) {
				$this->form_validation->set_message(__FUNCTION__,"Account already exists");
				return false;
			}
			else {
				return true;
			}
		}

		function edit() {
			$id = $this->uri->segment('4');
            $id = intval($id);
            $this->load->library('form_validation');
			$this->load->helper('form');

			$info = $this->admin_model->get_info($id);
			if(!$info) {
                $this->session->set_flashdata('message','Không tồn tại quản trị viên');
                redirect(base_url()."admin/admin");
            }
            $this->data['info'] = $info;
            if($this->input->post()) {
                $this->form_validation->set_rules('name','Tên','required|min_length[8]');
				$this->form_validation->set_rules('username','Tài khoản đăng nhập','required');

                $password = $this->input->post('password');
                if($password) {
                    $this->form_validation->set_rules('password','Mật khẩu','required|min_length[6]');
    				$this->form_validation->set_rules('repassword','Nhập lại mật khẩu','matches[password]');
                }
                if($this->form_validation->run() == TRUE) {
                    $name = $this->input->post('name');
					$username = $this->input->post('username');
					$admin_group_id = 1;
					$data = array(
						'name'	=>	$name,
						'username'	=>	$username,
						'admin_group_id' => $admin_group_id
					);
                    if($password) {
                        $data['password'] = md5($password);
                    }

					if($this->admin_model->update($id,$data)) {
						$this->session->set_flashdata('message','Update data successfully');
					}
					else {
						$this->session->set_flashdata('message','Update data unsuccessful');
					}
					redirect(base_url()."admin/admin");
                }
            }
			$this->load->view('admin/home/edit',$this->data);
		}

        function logout() {
            if($this->session->userdata('login')) {
                $this->session->unset_userdata('login');
                //redirect ??
            }
            redirect(base_url()."admin/login");
        }

    }
?>
