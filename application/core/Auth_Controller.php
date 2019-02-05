<?php

class Auth_Controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect(base_url("index.php/Login_Controller"));
		}
	}
}