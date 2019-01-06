<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Upload_library {
        var $CI = '';

        function __construct() {
            $this->CI = & get_instance();
        }

        function upload($upload_path = '',$file_name) {
            $config = $this->config($upload_path);
            $this->CI->load->library('upload', $config);
            if($this->CI->upload->do_upload($file_name))
            {
                $data = $this->CI->upload->data();
            }else{
                $data = $this->CI->upload->display_errors();
            }
            return $data;
        }

        function upload_files($upload_path = '',$file_name) {
            $imagelist = array();
            $config = $this->config($upload_path);
            $files = $_FILES['imagelist'];
            $count = count($files['name']);
            for($i = 0; $i <= $count - 1; $i++) {
                $_FILES['userfile']['name'] = $files['name'][$i];
                $_FILES['userfile']['type'] = $files['type'][$i];
                $_FILES['userfile']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['userfile']['error'] = $files['error'][$i];
                $_FILES['userfile']['size'] = $files['size'][$i];

                $this->CI->load->library('upload',$config);
                if($this->CI->upload->do_upload()) {
                    $data = $this->CI->upload->data();
                    $imagelist[] = $data['file_name'];
                }
            }
            return $imagelist;
        }

        function config($upload_path = '') {
            $config = array();
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|png|gif';
            $config['max_size'] = '3000';
            $config['max_width'] = '3000';
            $config['max_height'] = '3000';
            return $config;
        }
    }
?>
