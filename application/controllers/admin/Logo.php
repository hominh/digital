<?php
    class logo extends MY_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('logo_model');
            $this->load->helper('admin');
        }

        function index() {
            if(login()) {
                $input = array();
                $list = $this->logo_model->get_list();
                $message = $this->session->flashdata('message');
                $this->data['message'] = $message;
                $this->data['list'] = $list;
                $this->load->view('admin/logo/index',$this->data);
            }
            else {
                redirect(base_url()."admin/admin");
            }

        }

        function create() {
            $this->load->library('form_validation');
            $this->load->helper('form');
            $datetime = date('Y-m-d h:i:s',time());
            if($this->input->post()) {
                $this->form_validation->set_rules('name','Name','required|min_length[8]');
                if($this->form_validation->run() == TRUE) {
                    $image = "";
                    $this->load->library('upload_library');
                    $upload_path = './upload/logos';
                    $upload_data = $this->upload_library->upload($upload_path,'image');
                    if(isset($upload_data['file_name'])) {
                        $image = $upload_data['file_name'];
                    }
                    $name = $this->input->post('name');
                    $title = $this->input->post('title');
                    $logo_type = $this->input->post('logo_type');

                    $data = array(
                        'name'          =>  $name,
                        'title'         =>  $title,
                        'image'         =>  $image,
                        'created_at'    =>  $datetime,
                        'updated_at'    =>  $datetime
                    );

                    if($this->logo_model->create($data)) {
                        $this->session->set_flashdata('message','Insert data successfully');
                    }
                    else {
						$this->session->set_flashdata('message','Insert data unsuccessful');
                    }
                    redirect(base_url()."admin/logo");
                }
            }
        }

        public function update() {
            if(login()) {
                $id = $this->uri->segment('4');
                $id = intval($id);
                $this->load->library('form_validation');
    			$this->load->helper('form');

                $input = array();
                $info = $this->logo_model->get_info($id);
                if(!$info) {
                    $this->session->set_flashdata('message','Not exist logo');
                    redirect(base_url()."admin/logo");
                }
                else {
                    $this->data['info'] = $info;
                    $this->load->model('logo_model');
                    $datetime = date('Y-m-d h:i:s',time());


                    if($this->input->post()) {
                        $this->form_validation->set_rules('name','Name','required|min_length[8]');
                        if($this->form_validation->run() == TRUE) {
                            $image = "";
                            $this->load->library('upload_library');
                            $upload_path = './upload/logos';
                            $upload_data = $this->upload_library->upload($upload_path,'image');
                            if(isset($upload_data['file_name'])) {
                                $image = $upload_data['file_name'];
                            }
                            $name = $this->input->post('name');
                            $title = $this->input->post('title');
                            $url = $this->input->post('url');

                            $data = array(
                                'name'          =>  $name,
                                'title'         =>  $title,
                                'image'         =>  $image,
                                'url'           =>  $url,
                                'created_at'    =>  $datetime,
                                'updated_at'     =>  $datetime
                            );
                            if($image != '')
                            {
                                $data['image'] = $image;
                            }

                            if($this->logo_model->update($id,$data)) {
                                $this->session->set_flashdata('message','Update logo successful');
                            }
                            else {
                                $this->session->set_flashdata('message','Update logo unsuccessful');
                            }
                            redirect(base_url()."admin/logo");
                        }
                    }
                    $this->load->view('admin/logo/edit',$this->data);
                }
            }
            else {
                redirect(base_url()."admin/logo");
            }
        }

        public function delete() {
            $id = $this->uri->segment('4');
            $id = intval($id);
            $info = $this->logo_model->get_info($id);
            if(!$info) {
                $this->session->set_flashdata('message','Not exist logo');
                redirect(base_url()."admin/logo");
            }
            $this->logo_model->delete($id);
            $this->session->set_flashdata('message','Delete data successfully');
            redirect(base_url()."admin/logo");
        }

    }
?>
