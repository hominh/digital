<?php
    class slide extends MY_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('slide_model');
            $this->load->helper('admin');
        }

        function index() {
            if(login()) {
                $list = $this->slide_model->get_list();

                $this->load->model('slide_model');

                $message = $this->session->flashdata('message');
                $this->data['message'] = $message;
                $this->data['list'] = $list;
                $this->load->view('admin/slide/index',$this->data);
            }
            else {
                redirect(base_url()."admin/slide");
            }

        }

        function create() {
            if(login()) {
                $this->load->library('form_validation');
                $this->load->helper('form');
                $this->load->model('slide_model');
                $datetime = date('Y-m-d h:i:s',time());
                if($this->input->post()) {
                    $this->form_validation->set_rules('name','Name','required|min_length[8]');
                    if($this->form_validation->run() == TRUE) {
                        $image = "";
                        $this->load->library('upload_library');
                        $upload_path = './upload/slides/';
                        $upload_data = $this->upload_library->upload($upload_path,'image');
                        if(isset($upload_data['file_name'])) {
                            $image = $upload_data['file_name'];
                            $image_name = $upload_data['file_name'];
                        }

                        $name = $this->input->post('name');
                        $link = $this->input->post('link');
                        $sort_order = 10;
                        $title1 = $this->input->post('title1');
                        $title2 = $this->input->post('title2');
                        $title3 = $this->input->post('title3');
                        $created_at = $datetime;
                        $updated_at = $datetime;
                        $data = array(
                            'name'          =>  $name,
                            'image'         =>  $image,
                            'link'          =>  $link,
                            'title1'        =>  $title1,
                            'title2'        =>  $title2,
                            'title3'        =>  $title3,
                            'sort_order'    =>  $sort_order,
                            'created_at'    =>  $datetime,
                            'updated_at'    =>  $datetime
                        );
                        if($this->slide_model->create($data)) {
                            $this->session->set_flashdata('message','Insert data successfully');
                        }
                        else {
    						$this->session->set_flashdata('message','Insert data unsuccessful');
                        }
                        redirect(base_url()."admin/slide");
                    }
                }
                $this->load->view('admin/slide/create',$this->data);
            }
            else {
                redirect(base_url()."admin/slide");
            }
        }

        function update() {
            if(login()) {
                $id = $this->uri->segment('4');
                $id = intval($id);
                $this->load->library('form_validation');
    			$this->load->helper('form');

                $input = array();
                $info = $this->slide_model->get_info($id);
                if(!$info) {
                    $this->session->set_flashdata('message','Not exist slide');
                    redirect(base_url()."admin/slide");
                }
                else {
                    $this->data['info'] = $info;
                    $this->load->model('slide_model');
                    $datetime = date('Y-m-d h:i:s',time());


                    if($this->input->post()) {
                        $this->form_validation->set_rules('name','Name','required|min_length[8]');
                        if($this->form_validation->run() == TRUE) {
                            $image = "";
                            $this->load->library('upload_library');
                            $upload_path = './upload/slides';
                            $upload_data = $this->upload_library->upload($upload_path,'image');
                            if(isset($upload_data['file_name'])) {
                                $image = $upload_data['file_name'];
                                $image_name = $upload_data['file_name'];
                            }

                            $name = $this->input->post('name');
                            $link = $this->input->post('link');
                            $sort_order = 10;
                            $title1 = $this->input->post('title1');
                            $title2 = $this->input->post('title2');
                            $title3 = $this->input->post('title3');
                            $created_at = $datetime;
                            $updated_at = $datetime;
                            $data = array(
                                'name'          =>  $name,
                                'image'         =>  $image,
                                'link'          =>  $link,
                                'title1'        =>  $title1,
                                'title2'        =>  $title2,
                                'title3'        =>  $title3,
                                'sort_order'    =>  $sort_order,
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
                            if($this->slide_model->update($id,$data)) {
                                $this->session->set_flashdata('message','Update slide successful');
                            }
                            else {
                                $this->session->set_flashdata('message','Update slide unsuccessful');
                            }
                            redirect(base_url()."admin/slide");
                        }
                    }
                    $this->load->view('admin/slide/edit',$this->data);
                }
            }
            else {
                redirect(base_url()."admin/admin");
            }

        }

        function delete() {
            $id = $this->uri->segment('4');
            $id = intval($id);
            $info = $this->slide_model->get_info($id);
            if(!$info) {
                $this->session->set_flashdata('message','Not exist slide');
                redirect(base_url()."admin/slide");
            }
            else {
                $image = './upload/slides/'.$info->image;
                $this->slide_model->delete($id);

                if(file_exists('./upload/slides/'.$info->image)) {
                    unlink($image);
                }

                $image_list = json_decode($info->image_list);
                if(is_array($image_list)) {
                    foreach($image_list as $img) {
                        $path_image = './upload/slides/'.$img;
                        if(file_exists($path_image)) {
                            unlink($path_image);
                        }
                    }
                }

                $this->session->set_flashdata('message','Delete data successfully');
                redirect(base_url()."admin/slide");
            }
        }
    }
?>
