<?php
    class brand extends MY_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('brand_model');
            $this->load->helper('admin');
        }

        function index() {
            if(login()) {
                $input = array();
                $list = $this->brand_model->get_list();
                $message = $this->session->flashdata('message');
                $this->data['message'] = $message;
                $this->data['list'] = $list;
                $this->load->view('admin/brand/index',$this->data);
            }
            else {
                redirect(base_url()."admin/brand");
            }

        }

        function create() {
            if(login()) {
                $this->load->library('form_validation');
                $this->load->helper('form');
                $this->load->model('brand_model');
                $datetime = date('Y-m-d h:i:s',time());
                if($this->input->post()) {
                    $this->form_validation->set_rules('name','Name','required|min_length[2]');
                    if($this->form_validation->run() == TRUE) {
                        $image = "";
                        $this->load->library('upload_library');
                        $upload_path = './upload/brands/';
                        $upload_data = $this->upload_library->upload($upload_path,'image');
                        if(isset($upload_data['file_name'])) {
                            $image = $upload_data['file_name'];
                        }

                        $name = $this->input->post('name');
                        $title = $this->input->post('title');
                        $link = $this->input->post('link');
                        $data = array(
                            'name'          =>  $name,
                            'image'         =>  $image,
                            'link'          =>  $link,
                            'title'         =>  $title,
                            'created_at'    =>  $datetime,
                            'updated_at'    =>  $datetime
                        );
                        if($this->brand_model->create($data)) {
                            $this->session->set_flashdata('message','Insert data successfully');
                        }
                        else {
    						$this->session->set_flashdata('message','Insert data unsuccessful');
                        }
                        redirect(base_url()."admin/brand");
                    }
                }
                $this->load->view('admin/brand/create',$this->data);
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

                $input = array();
                $info = $this->brand_model->get_info($id);
                if(!$info) {
                    $this->session->set_flashdata('message','Not exist brand');
                    redirect(base_url()."admin/brand");
                }
                else {
                    $this->data['info'] = $info;
                    $this->load->model('brand_model');
                    $datetime = date('Y-m-d h:i:s',time());
                    if($this->input->post()) {
                        $this->form_validation->set_rules('name','Name','required|min_length[2]');
                        if($this->form_validation->run() == TRUE) {
                            $image = "";
                            $this->load->library('upload_library');
                            $upload_path = './upload/brands';
                            $upload_data = $this->upload_library->upload($upload_path,'image');
                            if(isset($upload_data['file_name'])) {
                                $image = $upload_data['file_name'];
                            }
                            $name = $this->input->post('name');
                            $title = $this->input->post('title');
                            $link = $this->input->post('link');
                            $data = array(
                                'name'          =>  $name,
                                'image'         =>  $image,
                                'link'          =>  $link,
                                'title'         =>  $title,
                                'created_at'    =>  $datetime,
                                'updated_at'    =>  $datetime
                            );


                            if($image != '')
                            {
                                $data['image'] = $image;
                            }
                            else
                            {
                                $data['image'] = $info->image;
                            }
                            if($this->brand_model->update($id,$data)) {
                                $this->session->set_flashdata('message','Update brand successful');
                            }
                            else {
                                $this->session->set_flashdata('message','Update brand unsuccessful');
                            }
                            redirect(base_url()."admin/brand");
                        }
                    }
                    $this->load->view('admin/brand/edit',$this->data);
                }
            }
            else {
                redirect(base_url()."admin/login");
            }
        }

        public function delete() {
            $id = $this->uri->segment('4');
            $id = intval($id);
            $info = $this->brand_model->get_info($id);
            if(!$info) {
                $this->session->set_flashdata('message','Not exist brand');
                redirect(base_url()."admin/brand");
            }
            $this->brand_model->delete($id);
            $this->session->set_flashdata('message','Delete data successfully');
            redirect(base_url()."admin/brand");
        }
    }
?>
