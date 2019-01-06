<?php
    class Contact extends MY_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('contact_model');
            $this->load->helper('admin');
        }

        function index() {
            if(login()) {
                $input = array();
                $list = $this->contact_model->get_list();
                $message = $this->session->flashdata('message');
                $this->data['message'] = $message;
                $this->data['list'] = $list;
                $this->load->view('admin/contact/index',$this->data);
            }
            else {
                redirect(base_url()."admin/admin");
            }

        }

        function create() {
            if(login()) {
                $this->load->library('form_validation');
                $this->load->helper('form');
                $datetime = date('Y-m-d h:i:s',time());
                if($this->input->post()) {
                    $this->form_validation->set_rules('name','Name','required|min_length[8]');
                    if($this->form_validation->run() == TRUE) {
                        $name = $this->input->post('name');
                        $email = $this->input->post('email');
                        $address = $this->input->post('address');
                        $title = $this->input->post('title');
                        $content = $this->input->post('content');
                        $phone = $this->input->post('phone');

                        $data = array(
                            'name'          =>  $name,
                            'email'         =>  $email,
                            'address'       =>  $address,
                            'title'         =>  $title,
                            'content'       =>  $content,
                            'phone'         =>  $phone,
                        );

                        if($this->contact_model->create($data)) {
                            $this->session->set_flashdata('message','Insert data successfully');
                        }
                        else {
    						$this->session->set_flashdata('message','Insert data unsuccessful');
                        }
                        redirect(base_url()."admin/contact");
                    }
                }
                $this->load->view('admin/contact/create',$this->data);
            }
            else {
                redirect(base_url()."admin/login");
            }
        }

        public function update() {
            if(login()) {
                $id = $this->uri->segment('4');
                $id = intval($id);
                $this->load->library('form_validation');
    			$this->load->helper('form');

                $info = $this->contact_model->get_info($id);
                if(!$info) {
                    $this->session->set_flashdata('message','Not exist contact');
                    redirect(base_url()."admin/contact");
                }
                $this->data['info'] = $info;
                if($this->input->post()) {
                    $this->form_validation->set_rules('code','Code','required|min_length[8]');
                    if($this->form_validation->run() == TRUE) {
                        $name = $this->input->post('name');
                        $email = $this->input->post('email');
                        $address = $this->input->post('address');
                        $title = $this->input->post('title');
                        $content = $this->input->post('content');
                        $phone = $this->input->post('phone');

                        $data = array(
                            'name'          =>  $name,
                            'email'         =>  $email,
                            'address'       =>  $address,
                            'title'         =>  $title,
                            'content'       =>  $content,
                            'phone'         =>  $phone,
                        );
                        if($this->contact_model->update($id,$data)) {
    						$this->session->set_flashdata('message','Update data successfully');
    					}
                        else {
    						$this->session->set_flashdata('message','Update data unsuccessful');
    					}
                        redirect(base_url()."admin/contact");
                    }
                }
            }
            else {
                redirect(base_url()."admin/login");
            }
        }

        public function delete() {
            $id = $this->uri->segment('4');
            $id = intval($id);
            $info = $this->catalog_model->get_info($id);
            if(!$info) {
                $this->session->set_flashdata('message','Not exist contact');
                redirect(base_url()."admin/contact");
            }
            $this->contact_model->delete($id);
            $this->session->set_flashdata('message','Delete data successfully');
            redirect(base_url()."admin/contact");
        }
    }
?>
