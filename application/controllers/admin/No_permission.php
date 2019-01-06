<?php
    class No_permission extends MY_Controller {
		/**
		 * Admin constructor.
		 */
		function __construct() {
            parent::__construct();
            $this->load->library('session');


        }

        function index() {
            $this->load->view('admin/no_permission/index');
        }
    }
?>
