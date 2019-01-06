<?php
    class Product extends MY_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('product_model');
            $this->load->helper('admin');
        }

        function index() {
            if(login()) {
                $this->load->library('pagination');
                $total_rows = $this->product_model->get_total();
                $this->data['total_rows'] = $total_rows;

                //Config pagination
                /*$config = array();
                $config['total_rows'] = $total_rows;
                $config['base_url'] = 'http://localhost/digital/admin/product';
                $config['per_page'] = 10;
                $config['uri_segment'] = 4;
                $config['next_link'] = 'Next';
                $config['prev_link'] = 'Previous';*/
                //$this->pagination->initialize($config);

                $segment = $this->uri->segment(4);
                $segment = intval($segment);

                $input = array();
                //$input['limit'] = array($config['per_page'],$segment);
                $list = $this->product_model->get_list();

                $this->load->model('catalog_model');
                $inputcatalog = array();
                $inputcatalog['where'] = array('parent_id' => 0);
                $catalogs = $this->catalog_model->get_list($inputcatalog);
                foreach($catalogs as $row)
                {
                    $inputcatalog['where'] = array('parent_id' => $row->id);
                    $subs = $this->catalog_model->get_list($inputcatalog);
                    $row->subs = $subs;
                }

                foreach($list as $row)
                {
                    $inputc['where'] = array('id' => $row->catalog_id);
                    $subcatalog = $this->catalog_model->get_list($inputc);
                    $row->catalog = $subcatalog;
                }


                $message = $this->session->flashdata('message');
                $this->data['message'] = $message;
                $this->data['list'] = $list;
                $this->load->view('admin/product/index',$this->data);
            }
            else {
                redirect(base_url()."admin/admin");
            }

        }

        function create() {
            if(login()) {
                $this->load->library('form_validation');
                $this->load->helper('form');
                $this->load->model('catalog_model');
                $input = array();
                $input['where'] = array('parent_id' => 0);
                $catalogs = $this->catalog_model->get_list($input);

                $datetime = date('Y-m-d h:i:s',time());

                foreach($catalogs as $row) {
                    $input['where'] = array('parent_id' => $row->id);
                    $subs = $this->catalog_model->get_list($input);
                    $row->subs = $subs;
                }
                $this->data['catalogs'] = $catalogs;

                if($this->input->post()) {
                    $this->form_validation->set_rules('name','Name','required|min_length[8]');
                    if($this->form_validation->run() == TRUE) {
                        $image = "";
                        $this->load->library('upload_library');
                        $upload_path = './upload/products';
                        $upload_data = $this->upload_library->upload($upload_path,'image');
                        if(isset($upload_data['file_name'])) {
                            $image = $upload_data['file_name'];
                        }
                        $imagelist = array();
                        $imagelist = $this->upload_library->upload_files($upload_path, 'imagelist');
                        $imagelist = json_encode($imagelist);
                        $name = $this->input->post('name');
                        $catalog_id = $this->input->post('catalog');
                        $maker_id = 1;
                        $price = $this->input->post('price');
                        $content = $this->input->post('content');

                        $discount = $this->input->post('discount');
                        $discount = str_replace(',', '', $discount);
                        $create = 1;
                        $view = 0;
                        $title = $this->input->post('title');
                        $keyword = $this->input->post('keyword');
                        $warranty = $this->input->post('warranty');
                        $total = 1;
                        $buyed = 0;
                        $rate_total = 0;
                        $rate_count = 0;
                        $gifts = $this->input->post('gifts');
                        $video = 'video';
                        $description = $this->input->post('description');
                        $feature = 1;
                        $created_at = $datetime;
                        $updated_at = $datetime;
                        $data = array(
                            'name'          =>  $name,
                            'catalog_id'    =>  $catalog_id,
                            'maker_id'      =>  $maker_id,
                            'price'         =>  $price,
                            'content'       =>  $content,
                            'discount'      =>  $discount,
                            'image'         =>  $image,
                            'image_list'    =>  $imagelist,
                            'created'       =>  $create,
                            'view'          =>  $view,
                            'keyword'       =>  $keyword,
                            'title'         =>  $title,
                            'warranty'      =>  $warranty,
                            'total'         =>  $total,
                            'buyed'         =>  $buyed,
                            'rate_total'    =>  $rate_total,
                            'rate_count'    =>  $rate_count,
                            'gifts'         =>  $gifts,
                            'video'         =>  $video,
                            'description'   =>  $description,
                            'feature'       =>  $feature,
                            'created_at'    =>  $created_at,
                            'updated_at'    =>  $update_at
                        );
                        if($this->product_model->create($data)) {
                            $this->session->set_flashdata('message','Insert data successfully');
                        }
                        else {
    						$this->session->set_flashdata('message','Insert data unsuccessful');
                        }
                        redirect(base_url()."admin/product");

                    }
                }
                $this->load->view('admin/product/create',$this->data);
            }
            else {
                redirect(base_url()."admin/login");
            }

        }

        function update() {
            if(login()) {
                $id = $this->uri->segment('4');
                $id = intval($id);
                $this->load->library('form_validation');
    			$this->load->helper('form');

                $input = array();
                $info = $this->product_model->get_info($id);
                if(!$info) {
                    $this->session->set_flashdata('message','Not exist product');
                    redirect(base_url()."admin/product");
                }
                else {
                    $this->data['info'] = $info;
                    $this->load->model('catalog_model');
                    $input = array();

                    $input['where'] = array('id' => $info->catalog_id);
                    $currentcataglog = $this->catalog_model->get_list($input);
                    $inputother['where_not_in'] = array('id' => $info->catalog_id);
                    $inputother['where_parentid'] = array('parent_id' => 0);
                    $othercatalogs = $this->catalog_model->get_list_ignore($inputother);

                    $datetime = date('Y-m-d h:i:s',time());

                    foreach($othercatalogs as $row) {
                        $input['where'] = array('parent_id' => $row->id);
                        $subs = $this->catalog_model->get_list($input);
                        $row->subs = $subs;
                    }
                    $this->data['currentcataglog'] = $currentcataglog;
                    $this->data['othercatalogs'] = $othercatalogs;
                    if($this->input->post()) {
                        $this->form_validation->set_rules('name','Name','required|min_length[8]');
                        if($this->form_validation->run() == TRUE) {
                            $image = "";
                            $this->load->library('upload_library');
                            $upload_path = './upload/products';
                            $upload_data = $this->upload_library->upload($upload_path,'image');
                            if(isset($upload_data['file_name'])) {
                                $image = $upload_data['file_name'];
                            }
                            $imagelist = array();
                            $imagelist = $this->upload_library->upload_files($upload_path, 'imagelist');
                            $imagelist = json_encode($imagelist);
                            $name = $this->input->post('name');
                            $catalog_id = $this->input->post('catalog');
                            $maker_id = 1;
                            $price = $this->input->post('price');
                            $content = $this->input->post('content');

                            $discount = $this->input->post('discount');
                            $discount = str_replace(',', '', $discount);
                            $create = 1;
                            $view = 0;
                            $title = $this->input->post('title');
                            $keyword = $this->input->post('keyword');
                            $warranty = $this->input->post('warranty');
                            $total = 1;
                            $buyed = 0;
                            $rate_total = 0;
                            $rate_count = 0;
                            $gifts = $this->input->post('gifts');
                            $video = 'video';
                            $description = $this->input->post('description');
                            $feature = 1;
                            $created_at = $datetime;
                            $updated_at = $datetime;
                            $data = array(
                                'name'          =>  $name,
                                'catalog_id'    =>  $catalog_id,
                                'maker_id'      =>  $maker_id,
                                'price'         =>  $price,
                                'content'       =>  $content,
                                'discount'      =>  $discount,
                                'created'       =>  $create,
                                'view'          =>  $view,
                                'keyword'       =>  $keyword,
                                'title'         =>  $title,
                                'warranty'      =>  $warranty,
                                'total'         =>  $total,
                                'buyed'         =>  $buyed,
                                'rate_total'    =>  $rate_total,
                                'rate_count'    =>  $rate_count,
                                'gifts'         =>  $gifts,
                                'video'         =>  $video,
                                'description'   =>  $description,
                                'feature'       =>  $feature,
                                'created_at'    =>  $created_at,
                                'updated_at'    =>  $update_at,
                            );
                            if($image != '')
                            {
                                $data['image'] = $image;
                            }
                            if(!empty($imagelist)) {
                                $data['image_list'] = $imagelist;
                            }
                            if($this->product_model->update($id,$data)) {
                                $this->session->set_flashdata('message','Update product successful');
                            }
                            else {
                                $this->session->set_flashdata('message','Update product unsuccessful');
                            }
                            redirect(base_url()."admin/product");
                        }
                    }
                    $this->load->view('admin/product/edit',$this->data);
                }
            }
            else {
                redirect(base_url()."admin/login");
            }

        }

        function delete() {
            $id = $this->uri->segment('4');
            $id = intval($id);
            $info = $this->product_model->get_info($id);
            if(!$info) {
                $this->session->set_flashdata('message','Not exist product');
                redirect(base_url()."admin/product");
            }
            else {
                $image = './upload/products/'.$info->image;
                $this->product_model->delete($id);

                if(file_exists('./upload/products/'.$info->image)) {
                    unlink($image);
                }

                $image_list = json_decode($info->image_list);
                if(is_array($image_list)) {
                    foreach($image_list as $img) {
                        $path_image = './upload/products/'.$img;
                        if(file_exists($path_image)) {
                            unlink($path_image);
                        }
                    }
                }

                $this->session->set_flashdata('message','Delete data successfully');
                redirect(base_url()."admin/product");
            }
        }

    }
?>
