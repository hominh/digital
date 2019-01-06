<?php
    class Catalog extends MY_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('catalog_model');
            $this->load->helper('admin');
        }

        function index() {
            if(login()) {

                $input = array();
                $list = $this->catalog_model->get_list($input);

                $this->data['list'] = $list;
                $message = $this->session->flashdata('message');
                $this->data['message'] = $message;
                //$this->data['temp'] = 'admin/home/index';
                $this->load->view('admin/catalog/index',$this->data);
            }
            else {
                redirect(base_url()."admin/admin");
            }

        }

        function create() {
            if(login()) {
                $this->load->library('form_validation');
    			$this->load->helper('form');

                $input = array();
                $input['where'] = array('parent_id' => 0);
                $list = $this->catalog_model->get_list($input);
                $this->data['list'] = $list;

    			if($this->input->post()) {
    				$this->form_validation->set_rules('name','Name','required|min_length[8]');
    				//die("aa: ".$this->form_validation->run());
    				if($this->form_validation->run() == TRUE) {
    					//die("this->form_validation->run()");
    					$name = $this->input->post('name');
    					$title = $this->input->post('title');
                        $description = $this->input->post('description');
                        $keyword = $this->input->post('keyword');
                        $datetime = date('Y-m-d h:i:s',time());
                        $order = $this->input->post('order');
                        $parent_id = $this->input->post('catalog');
    					$data = array(
    						'name'	=>	$name,
    						'site_title'	=>	$title,
    						'meta_desc'	=>	$description,
    						'meta_key' => $keyword,
                            'sort_order' => $order,
                            'parent_id' => $parent_id,
                            'created_at' => $datetime,
                            'updated_at' => $datetime,
    					);
    					if($this->catalog_model->create($data)) {
    						$this->session->set_flashdata('message','Insert data successfully');
    					}
    					else {
    						$this->session->set_flashdata('message','Insert data unsuccessful');
    					}
    					redirect(base_url()."admin/catalog");
    				}


    			}
    			$this->load->view('admin/catalog/create',$this->data);
            }
            else {
                redirect(base_url()."admin/catalog");
            }

        }

        function edit() {

        }

        function update() {
            if(login()) {
                $id = $this->uri->segment('4');
                $id = intval($id);
                $this->load->library('form_validation');
    			$this->load->helper('form');

                $input = array();
                $input['where'] = array('parent_id' => 0);
                $list = $this->catalog_model->get_list($input);
                $this->data['list'] = $list;

    			$info = $this->catalog_model->get_info($id);
    			if(!$info) {
                    $this->session->set_flashdata('message','Not exist catalog');
                    redirect(base_url()."admin/catalog");
                }
                $this->data['info'] = $info;
                if($this->input->post()) {
                    $this->form_validation->set_rules('name','Name','required|min_length[8]');

                    if($this->form_validation->run() == TRUE) {
                        $name = $this->input->post('name');
    					$title = $this->input->post('title');
                        $description = $this->input->post('description');
                        $keyword = $this->input->post('keyword');
                        $datetime = date('Y-m-d h:i:s',time());
                        $order = $this->input->post('order');
                        $parent_id = $this->input->post('catalog');
                        $data = array(
    						'name'	=>	$name,
    						'site_title'	=>	$title,
    						'meta_desc'	=>	$description,
    						'meta_key' => $keyword,
                            'sort_order' => $order,
                            'parent_id' => $parent_id,
                            'created_at' => $datetime,
                            'updated_at' => $datetime,
    					);
    					if($this->catalog_model->update($id,$data)) {
    						$this->session->set_flashdata('message','Update data successfully');
    					}
    					else {
    						$this->session->set_flashdata('message','Update data unsuccessful');
    					}
    					redirect(base_url()."admin/catalog");
                    }
                }
                $this->load->view('admin/catalog/edit',$this->data);
            }
            else {
                redirect(base_url()."admin/login");
            }
        }

        function delete() {
            $id = $this->uri->segment('4');
            $id = intval($id);
            $info = $this->catalog_model->get_info($id);
            if(!$info) {
                $this->session->set_flashdata('message','Not exist catalog');
                redirect(base_url()."admin/catalog");
            }
            $this->catalog_model->delete($id);
            $this->session->set_flashdata('message','Delete data successfully');
            redirect(base_url()."admin/catalog");
        }

        function check_catalogname() {

        }
    }
?>
