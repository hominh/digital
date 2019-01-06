<?php
    class Attribute extends MY_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('attribute_model');
            $this->load->model('Catalogproductvarchar_model');
            $this->load->helper('admin');
        }

        function index() {
            if(login()) {
                $input = array();
                $list = $this->attribute_model->get_list();
                $message = $this->session->flashdata('message');
                $this->data['message'] = $message;
                $this->data['list'] = $list;
                $this->load->view('admin/attribute/index',$this->data);
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
                    $this->form_validation->set_rules('code','Code','required|min_length[2]');
                    if($this->form_validation->run() == TRUE) {
                        $code = $this->input->post('code');
                        $label = $this->input->post('label');
                        $type = $this->input->post('type');
                        $is_required = $this->input->post('required');
                        $is_unique = $this->input->post('unique');
                        $note = $this->input->post('note');

                        //attribute_value
                        $arr_value = $this->input->post('value');
                        $arr_order = $this->input->post('order');
                        $arr_display = $this->input->post('display');

                        $data = array(
                            'code'          =>  $code,
                            'label'         =>  $label,
                            'type'          =>  $type,
                            'is_required'   =>  $is_required,
                            'is_unique'     =>  $is_unique,
                            'note'          =>  $note
                        );

                        if($this->attribute_model->create($data)) {
                            $last_id = $this->attribute_model->getLastId();
                            for($i = 0; $i < count($arr_value); $i++) {
                                $data_attribute_value = array(
                                    'value'     =>  $arr_value[$i],
                                    'display'   =>  $arr_display[$i],
                                    'attribute_id'  =>  $last_id,
                                    'store_id'      =>  1
                                );
                                if($type == 1) {
                                    $this->Catalogproductvarchar_model->create($data_attribute_value);
                                }
                                if($type == 2) {
                                   $this->Catalogproducttext_model->create($data_attribute_value);
                                }
                                if($type == 3) {
                                    $this->Catalogproductdecimal_model->create($data_attribute_value); 
                                }
                                if($type == 4) {
                                    $this->Catalogproductlink_model->create($data_attribute_value);
                                }
                                $this->session->set_flashdata('message','Insert data successfully');
                            }
                        }
                        else {
    						$this->session->set_flashdata('message','Insert data unsuccessful');
                        }
                        redirect(base_url()."admin/attribute");
                    }
                }
                $this->load->view('admin/attribute/create',$this->data);
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

                $input['where'] = array('attribute_id' => $id);
                $attribute_value = $this->Catalogproductvarchar_model->get_list($input);
                $this->data['attribute_value'] = $attribute_value;

                //type selected
                

                $info = $this->attribute_model->get_info($id);
                if(!$info) {
                    $this->session->set_flashdata('message','Not exist attribute');
                    redirect(base_url()."admin/attribute");
                }
                else {
                    $this->data['info'] = $info;
                    if($this->input->post()) {
                        $this->form_validation->set_rules('code','Code','required|min_length[2]');
                        if($this->form_validation->run() == TRUE) {
                            $code = $this->input->post('code');
                            $label = $this->input->post('label');
                            $type = $this->input->post('type');
                            $is_required = $this->input->post('required');
                            $is_unique = $this->input->post('unique');
                            $note = $this->input->post('note');

                            $arr_value = $this->input->post('value');
                            $arr_order = $this->input->post('order');
                            $arr_display = $this->input->post('display');
                            $data = array(
                                'code'          =>  $code,
                                'label'         =>  $label,
                                'type'          =>  $type,
                                'is_required'   =>  $is_required,
                                'is_unique'     =>  $is_unique,
                                'note'          =>  $note
                            );
                            if($this->attribute_model->update($id,$data)) {
                                for($i = 0; $i < count($attribute_value); $i++) {
                                    $this->deleteAttributeValueByAttributeId($id);
                                }
                                for($j = 0; $j < count($arr_value); $j++) {
                                    $data_attribute_value = array(
                                        'value'     =>  $arr_value[$j],
                                        'display'   =>  $arr_display[$j],
                                        'attribute_id'  =>  $id,
                                        'store_id'      =>  1
                                    );
                                    if($this->Catalogproductvarchar_model->create($data_attribute_value)) {
                                        $this->session->set_flashdata('message','Update data successfully');
                                    }
                                }
        					}
                            else {
        						$this->session->set_flashdata('message','Update data unsuccessful');
        					}
                            redirect(base_url()."admin/attribute");
                        }
                    }
                    $this->load->view('admin/attribute/edit',$this->data);
                }
            }
            else {
                redirect(base_url()."admin/login");
            }
        }

        public function deleteAttributeValueByAttributeId($id) {
            $input['where'] = array('attribute_id' => $id);
            $attribute_value = $this->Catalogproductvarchar_model->get_list($input);
            $attribute_id = $attribute_value[0]->id;
            $this->Catalogproductvarchar_model->delete($attribute_id);
        }

        public function delete() {
            $id = $this->uri->segment('4');
            $id = intval($id);
            $info = $this->attribute_model->get_info($id);

            $input['where'] = array('attribute_id' => $id);
            $attribute_value = $this->Catalogproductvarchar_model->get_list($input);
            $this->data['attribute_value'] = $attribute_value;

            if(!$info) {
                $this->session->set_flashdata('message','Not exist attribute');
                redirect(base_url()."admin/attribute");
            }

            $this->attribute_model->delete($id);
            for($i = 0; $i < count($attribute_value); $i++) {
                $this->deleteAttributeValueByAttributeId($id);
            }
            $this->session->set_flashdata('message','Delete data successfully');
            redirect(base_url()."admin/attribute");
        }
    }
?>
