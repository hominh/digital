<?php
    class ProductLink extends MY_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('productlink_model');
            $this->load->helper('admin');
        }

        function index() {
            if(login()) {
                $input = array();
                $list = $this->productlink_model->get_list();
                $message = $this->session->flashdata('message');
                $this->data['message'] = $message;
                $this->data['list'] = $list;
                $this->load->view('admin/productlink/index',$this->data);
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
                $this->form_validation->set_rules('code','Code','required|min_length[8]');
                if($this->form_validation->run() == TRUE) {
                    $product_id = $this->input->post('product_id');
                    $linked_product_id = $this->input->post('linked_product_id');
                    $data = array(
                        'product_id'    =>  $product_id,
                        'linked_product_id' =>  $linked_produc
                    );

                    if($this->productlink_model->create($data)) {
                        $this->session->set_flashdata('message','Insert data successfully');
                    }
                    else {
						$this->session->set_flashdata('message','Insert data unsuccessful');
                    }
                    redirect(base_url()."admin/productlink");
                }
            }
        }

        public function update() {
            if(login()) {
                $id = $this->uri->segment('4');
                $id = intval($id);
                $this->load->library('form_validation');
    			$this->load->helper('form');

                $info = $this->productlink_model->get_info($id);
                if(!$info) {
                    $this->session->set_flashdata('message','Not exist productlink');
                    redirect(base_url()."admin/productlink");
                }
                $this->data['info'] = $info;
                if($this->input->post()) {
                    $this->form_validation->set_rules('code','Code','required|min_length[8]');
                    if($this->form_validation->run() == TRUE) {
                        $code = $this->input->post('code');
                        $label = $this->input-post('label');
                        $type = $this->input-post('type');
                        $is_required = $this->input->post('is_required');
                        $is_unique = $this->input->post('is_unique');
                        $data = array(
                            'code'          =>  $code,
                            'label'         =>  $label,
                            'type'          =>  $type,
                            'is_required'   =>  $is_required,
                            'is_unique'     =>  $is_unique
                        );
                        if($this->catalog_model->update($id,$data)) {
    						$this->session->set_flashdata('message','Update data successfully');
    					}
                        else {
    						$this->session->set_flashdata('message','Update data unsuccessful');
    					}
                        redirect(base_url()."admin/productlink");
                    }
                }
            }
        }

        public function delete() {
            $id = $this->uri->segment('4');
            $id = intval($id);
            $info = $this->catalog_model->get_info($id);
            if(!$info) {
                $this->session->set_flashdata('message','Not exist productlink');
                redirect(base_url()."admin/productlink");
            }
            $this->productlink_model->delete($id);
            $this->session->set_flashdata('message','Delete data successfully');
            redirect(base_url()."admin/productlink");
        }
    }
?>
