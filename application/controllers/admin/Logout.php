<?php
    class Logout extends MY_Controller {

        function index() {
            $this->session->set_userdata('logged_in', FALSE);
            $this->session->session_destroy();
            redirect(base_url()."admin/admin");
        }
    }
?>
