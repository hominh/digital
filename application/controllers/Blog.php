<?php
    header('Content-type: text/html; charset=utf-8');
    if (!defined('BASEPATH'))
        exit('No direct script access allowed');
    require_once (APPPATH . 'controllers/Application.php');
	class Blog extends Application {
        protected $_datahome;
        protected $_data = array();
		function __construct() {
            parent::__construct();
            $this->load->model('blog_model');
        }

        function detail($alias) {
            $this->_data['subview'] = 'site/pages/blog';
            $this->_data['blog'] = $this->blog_model->getBlogByAlias($alias);
            $this->_data['title'] = $this->_data['blog']['title'];
            $this->load->view('site/layout',$this->_data);
        }

	}
?>