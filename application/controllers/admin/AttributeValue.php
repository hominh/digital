<?php
    class AttributeValue extends MY_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('attributevalue_model');
            $this->load->helper('admin');
        }

        function index() {
            if(login()) {
                $input = array();
                $list = $this->attribute_model->get_list();
                $message = $this->session->flashdata('message');
                $this->data['message'] = $message;
                $this->data['list'] = $list;
                $this->load->view('admin/attributevalue/index',$this->data);
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
                $this->form_validation->set_rules('value','Value','required|min_length[2]');
                if($this->form_validation->run() == TRUE) {
                    $value = $this->input->post('value');
                    $display = $this->input->post('display');
                    $attribute_id = $this->input->post('attribute_id');
                    $data = array(
                        'value'         =>  $value,
                        'display'       =>  $display,
                        'attribute_id'  =>  $attribute_id,
                    );

                    if($this->attributevalue_model->create($data)) {
                        $this->session->set_flashdata('message','Insert data successfully');
                    }
                    else {
						$this->session->set_flashdata('message','Insert data unsuccessful');
                    }
                    redirect(base_url()."admin/attributevalue");
                }
            }
            $this->load->view('admin/attributevalue/create',$this->data);
        }

        public function update() {
            if(login()) {
                $id = $this->uri->segment('4');
                $id = intval($id);
                $this->load->library('form_validation');
    			$this->load->helper('form');

                $info = $this->attribute_model->get_info($id);
                if(!$info) {
                    $this->session->set_flashdata('message','Not exist attribute');
                    redirect(base_url()."admin/attributevalue");
                }
                $this->data['info'] = $info;
                if($this->input->post()) {
                    $this->form_validation->set_rules('value','Value','required|min_length[2]');
                    if($this->form_validation->run() == TRUE) {
                        $code = $this->input->post('code');
                        $label = $this->input->post('label');
                        $type = $this->input->post('type');
                        $is_required = $this->input->post('required');
                        $is_unique = $this->input->post('unique');
                        $note = $this->input->post('note');
                        $data = array(
                            'code'          =>  $code,
                            'label'         =>  $label,
                            'type'          =>  $type,
                            'is_required'   =>  $is_required,
                            'is_unique'     =>  $is_unique,
                            'note'          =>  $note
                        );
                        if($this->attribute_model->update($id,$data)) {
    						$this->session->set_flashdata('message','Update data successfully');
    					}
                        else {
    						$this->session->set_flashdata('message','Update data unsuccessful');
    					}
                        redirect(base_url()."admin/attributevalue");
                    }
                }
            }
        }

        public function delete() {
            $id = $this->uri->segment('4');
            $id = intval($id);
            $info = $this->catalog_model->get_info($id);
            if(!$info) {
                $this->session->set_flashdata('message','Not exist attribute');
                redirect(base_url()."admin/attribute");
            }
            $this->attribute_model->delete($id);
            $this->session->set_flashdata('message','Delete data successfully');
            redirect(base_url()."admin/attributevalue");
        }

        public function login() {
            $logged = $_SESSION['username'];
            if ($logged) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

    }
?>
