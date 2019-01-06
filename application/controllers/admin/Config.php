<?php
    class Config extends MY_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('config_model');
            $this->load->helper('admin');
        }

        function index() {
            if(login()) {
                $input = array();
                $list = $this->config_model->get_list();
                $message = $this->session->flashdata('message');
                $this->data['message'] = $message;
                $this->data['list'] = $list;
                $this->load->view('admin/config/index',$this->data);
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
                    $this->form_validation->set_rules('title','Title','required|min_length[8]');
                    $this->form_validation->set_rules('description','Description','required|min_length[8]');
                    $this->form_validation->set_rules('keyword','Keyword','required|min_length[8]');
                    if($this->form_validation->run() == TRUE) {
                        $image = "";
                        $this->load->library('upload_library');
                        $upload_path = './upload/logo/';
                        $upload_data = $this->upload_library->upload($upload_path,'image');
                        if(isset($upload_data['file_name'])) {
                            $image = $upload_data['file_name'];
                        }

                        $title = $this->input->post('title');
                        $description = $this->input->post('description');
                        $keyword = $this->input->post('keyword');
                        $address = $this->input->post('address');
                        $phone = $this->input->post('phone');
                        $email = $this->input->post('email');
                        $facebook_address = $this->input->post('facebook_address');
                        $twitter_address = $this->input->post('twitter_address');
                        $youtube_address = $this->input->post('youtube_address');
                        $linkedin_address = $this->input->post('linkedin_address');

                        $data = array(
                            'logo'              =>  $image,
                            'title'             =>  $title,
                            'description'       =>  $description,
                            'keyword'           =>  $keyword,
                            'address'           =>  $address,
                            'phone'             =>  $phone,
                            'email'             =>  $email,
                            'facebook_address'  =>  $facebook_address,
                            'twitter_address'   =>  $twitter_address,
                            'youtube_address'   =>  $youtube_address,
                            'linkedin_address'  =>  $linkedin_address
                        );

                        if($this->config_model->create($data)) {
                            $this->session->set_flashdata('message','Insert data successfully');
                        }
                        else {
    						$this->session->set_flashdata('message','Insert data unsuccessful');
                        }
                        redirect(base_url()."admin/config");
                    }
                }
                $this->load->view('admin/config/create',$this->data);
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

                $info = $this->config_model->get_info($id);
                if(!$info) {
                    $this->session->set_flashdata('message','Not exist contact');
                    redirect(base_url()."admin/config");
                }
                $this->data['info'] = $info;
                if($this->input->post()) {
                    $this->form_validation->set_rules('title','Title','required|min_length[8]');
                    $this->form_validation->set_rules('description','Description','required|min_length[8]');
                    $this->form_validation->set_rules('keyword','Keyword','required|min_length[8]');
                    if($this->form_validation->run() == TRUE) {
                        $title = $this->input->post('title');
                        $description = $this->input->post('description');
                        $keyword = $this->input->post('keyword');
                        $address = $this->input->post('address');
                        $phone = $this->input->post('phone');
                        $email = $this->input->post('email');
                        $facebook_address = $this->input->post('facebook_address');
                        $twitter_address = $this->input->post('twitter_address');
                        $youtube_address = $this->input->post('youtube_address');
                        $linkedin_address = $this->input->post('linkedin_address');

                        $data = array(
                            'logo'              =>  $image,
                            'title'             =>  $title,
                            'description'       =>  $description,
                            'keyword'           =>  $keyword,
                            'address'           =>  $address,
                            'phone'             =>  $phone,
                            'email'             =>  $email,
                            'facebook_address'  =>  $facebook_address,
                            'twitter_address'   =>  $twitter_address,
                            'youtube_address'   =>  $youtube_address,
                            'linkedin_address'  =>  $linkedin_address
                        );
                        if($this->config_model->update($id,$data)) {
    						$this->session->set_flashdata('message','Update data successfully');
    					}
                        else {
    						$this->session->set_flashdata('message','Update data unsuccessful');
    					}
                        redirect(base_url()."admin/config");
                    }
                }
                $this->load->view('admin/config/edit',$this->data);
            }
            else {
                redirect(base_url()."admin/login");
            }
        }

        public function delete() {
            $id = $this->uri->segment('4');
            $id = intval($id);
            $info = $this->config_model->get_info($id);
            if(!$info) {
                $this->session->set_flashdata('message','Not exist attribute');
                redirect(base_url()."admin/config");
            }
            $this->config_model->delete($id);
            $this->session->set_flashdata('message','Delete data successfully');
            redirect(base_url()."admin/config");
        }
    }
?>
