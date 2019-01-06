<?php
    header('Content-type: text/html; charset=utf-8');
    if (!defined('BASEPATH'))
        exit('No direct script access allowed');
    require_once (APPPATH . 'controllers/Application.php');
    class Home extends Application {
        
        protected $_datahome;
        protected $_data = array();

        function __construct() {
            parent::__construct();
            $this->load->model('slide_model');
            $this->load->model('catalog_model');
            $this->load->model('brand_model');
            $this->load->model('blog_model');
            $this->load->model('product_model');
            $this->load->model('menu_model');
            $this->load->model('config_model');
        }

        function index() {
            $this->_data['config'] = $this->config_model->get_list();
            $this->_data['subview'] = 'site/pages/index';
            $this->_data['slide'] = $this->slide_model->get_list();
            $this->_data['lastestblog'] = $this->blog_model->getLastestBlogAtHome();
            $this->load->view('site/layout',$this->_data);
        }
    }
?>
