<?php
	function admin_url($url) {
		return base_url('admin/'.$url);
	}
	function login() {
		$logged = $_SESSION['username'];
		if ($logged) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
?>
