<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
  }
  
  // function login(){
	// 	$this->load->view('loginCD');
	// 	$this->load->library('form_valdation');
	// 	$this->form_validation->set_rules('username','Username','required');
	// 	$this->form_validation->set_rules('password','Password','required');
	// 	if($this->form_validation->run()){

	// 		$username = $this->input->post('username');
	// 		$password = $this->input->post('password');
	// 		//model fucntion
	// 		$this->load->model('User_model');
			

	// 		$user=$this->User_model->login($username, $password);
	// 		if(empty($user)){
	// 			header("location:loginCD.php");
	// 		}else{
	// 			header("location:startOrder.php");
	// 		}
	// 	}
	// }
}
