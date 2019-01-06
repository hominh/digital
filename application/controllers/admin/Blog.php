<?php
    class Blog extends MY_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('blog_model');
            $this->load->model('tag_model');
            $this->load->model('blogtag_model');
            $this->load->helper('admin');
            $this->load->helper('createalias');
            $_SESSION['KCFINDER'] = array(
                'disabled' => false,
                //'uploadDir' => '/upload/blogs'
                'uploadURL' => "http://localhost/digital/upload/blogs",
                'uploadDir' => '/var/www/html/digital/upload/blogs'
            );
        }

        function index() {
            if(login()) {
                $input = array();
                $list = $this->blog_model->get_list();
                $message = $this->session->flashdata('message');
                $this->data['message'] = $message;
                $this->data['list'] = $list;
                $this->load->view('admin/blog/index',$this->data);
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
                        $image = "";
                        $count_view = 0;
                        $this->load->library('upload_library');
                        $upload_path = './upload/blogs';
                        $upload_data = $this->upload_library->upload($upload_path,'image');
                        if(isset($upload_data['file_name'])) {
                            $image = $upload_data['file_name'];
                        }
                        $name = $this->input->post('name');
                        $title = $this->input->post('title');
                        $intro = $this->input->post('intro');
                        $description = $this->input->post('description');
                        $keyword = $this->input->post('keyword');
                        $content = $this->input->post('content');
                        $tag = $this->input->post('tag');
                        $alias = changeTitle($name);

                        $data = array(
                            'name'          =>  $name,
                            'alias'         =>  $alias,
                            'title'         =>  $title,
                            'intro'         =>  $intro,
                            'content'       =>  $content,
                            'description'   =>  $description,
                            'keyword'       =>  $keyword,
                            'image'         =>  $image,
                            'count_view'    =>  $count_view,
                            'created_at'    =>  $datetime,
                            'updated_at'    =>  $datetime
                        );

                        $arrTag = explode(",", $tag);

                        if($this->blog_model->create($data)) {
                            $this->session->set_flashdata('message','Insert data successfully');
                            $last_id = $this->blog_model->getLastId();
                            foreach($arrTag as $item) {
                                $input['where'] = array('value' => $item);
                                //check exist tag
                                $checkExistTag = $this->tag_model->get_list($input);
                                if(count($checkExistTag) <= 0) {
                                    $dataTag = array(
                                        'value' => $item,
                                        'created_at'    =>  $datetime,
                                        'updated_at'    =>  $datetime
                                    );
                                    if($this->tag_model->create($dataTag)) {
                                        $this->session->set_flashdata('message','Insert data successfully');
                                        $last_idTag = $this->tag_model->getLastId();

                                    }
                                    else {
                                        $this->session->set_flashdata('message','Error');
                                    }
                                }
                                else {
                                    $last_idTag = $checkExistTag[0]->id;
                                }
                                $dataBlogTag = array(
                                    'blog_id'   =>  $last_id,
                                    'tag_id'    =>  $last_idTag
                                );
                                if($this->blogtag_model->create($dataBlogTag)) {
                                   $this->session->set_flashdata('message','Insert data successfully');
                                }
                            }
                        }
                        else {
    						$this->session->set_flashdata('message','Insert data unsuccessful');
                        }
                        redirect(base_url()."admin/blog");
                    }
                }
                $this->load->view('admin/blog/create',$this->data);
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
                $info = $this->blog_model->get_info($id);

                $tags = $this->blog_model->getTagsBlog($id);
                $strTags = "";
                foreach ($tags as $key => $value) {
                    $strTags.= $value->value;
                    $strTags.= ',';
                }
                $strTags = substr($strTags, 0, -1);
                $info->tags = $strTags;

                if(!$info) {
                    $this->session->set_flashdata('message','Not exist article');
                    redirect(base_url()."admin/blog");
                }
                else {
                    $this->data['info'] = $info;
                    $this->load->model('blog_model');
                    $datetime = date('Y-m-d h:i:s',time());
                    if($this->input->post()) {
                        $this->form_validation->set_rules('name','Name','required|min_length[2]');
                        if($this->form_validation->run() == TRUE) {
                            $image = "";
                            $this->load->library('upload_library');
                            $upload_path = './upload/blog';
                            $upload_data = $this->upload_library->upload($upload_path,'image');
                            if(isset($upload_data['file_name'])) {
                                $image = $upload_data['file_name'];
                            }
                            $name = $this->input->post('name');
                            $alias = changeTitle($name);
                            $title = $this->input->post('title');
                            $intro = $this->input->post('intro');
                            $content = $this->input->post('content');
                            $description = $this->input->post('description');
                            $keyword = $this->input->post('keyword');
                            $count_view = 1;//
                            $tag = $this->input->post('tag');
                            $arrTag = explode(",", $tag);
                            $data = array(
                                'name'          =>  $name,
                                'alias'         =>  $alias,
                                'title'         =>  $title,
                                'intro'         =>  $intro,
                                'content'       =>  $content,
                                'description'   =>  $description,
                                'keyword'       =>  $keyword,
                                'image'         =>  $image,
                                'count_view'    =>  $count_view,
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
                            if($this->blog_model->update($id,$data)) {
                                $this->session->set_flashdata('message','Update data successful');
                                $last_id = $id;
                                foreach($arrTag as $item) {
                                    $input['where'] = array('value' => $item);
                                    //check exist tag
                                    $checkExistTag = $this->tag_model->get_list($input);
                                    if(count($checkExistTag) <= 0) {
                                        $dataTag = array(
                                            'value' => $item,
                                            'created_at'    =>  $datetime,
                                            'updated_at'    =>  $datetime
                                        );
                                        if($this->tag_model->create($dataTag)) {
                                            $this->session->set_flashdata('message','Update data successful');
                                            $last_idTag = $this->tag_model->getLastId();

                                        }
                                        else {
                                            $this->session->set_flashdata('message','Error');
                                        }
                                    }
                                    else {
                                        $last_idTag = $checkExistTag[0]->id;
                                    }
                                    $dataBlogTag = array(
                                        'blog_id'   =>  $last_id,
                                        'tag_id'    =>  $last_idTag
                                    );
                                    if($this->blogtag_model->create($dataBlogTag)) {
                                       $this->session->set_flashdata('message','Update data successful');
                                    }
                                }
                            }
                            else {
                                $this->session->set_flashdata('message','Update data successful');
                            }
                            redirect(base_url()."admin/blog");
                        }
                    }
                    $this->load->view('admin/blog/edit',$this->data);
                }
            }
            else {
                redirect(base_url()."admin/login");
            }
        }

        public function delete() {
            $id = $this->uri->segment('4');
            $id = intval($id);
            $info = $this->blog_model->get_info($id);
            if(!$info) {
                $this->session->set_flashdata('message','Not exist data');
                redirect(base_url()."admin/blog");
            }
            $this->blog_model->delete($id);
            //$input = array('post_id' => $id);
            
            $this->blogtag_model->deleteBlogTagByBlogId($id);
            $this->session->set_flashdata('message','Delete data successfully');
            redirect(base_url()."admin/blog");
        }
    }
?>
