<?php 

class Login_controller extends CI_Controller {

  function __construct(){
    parent::__construct();
  }

  public function index(){
    
    $this->load->view('loginCD');
  }

  public function process(){
    // Load the model
    $this->load->model('User_model');
    // Validate the user can login
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $validate = $this->User_model->loginValidate($username, $password);
    // Now we verify the result
    if($username == "admin" && $password == "admin"){
      redirect(base_url("index.php/admin_controller"));
    } else if($validate){
      // $this->load->view('homeCD');
      redirect(base_url("index.php/home_controller"));
    }else{
      echo "email dan password salah !";
    }        
  }

  public function regist(){
    $this->load->view('registUser');
  }

  public function registUser() {
    $this->load->model('User_model');
    
    $password = $this->input->post('password');
    $confirmPassword = $this->input->post('konfirmasi');
    
    if($password == $confirmPassword){
      $username = $this->input->post('username');
      $nama = $this->input->post('namalengkap');
      $phone = $this->input->post('phone');
      $alamat = $this->input->post('alamat');
       $this->User_model->addUser($username, $password, $nama, $alamat, $phone);
      
      $this->User_model->loginValidate($username, $password);
      redirect(base_url("index.php/home_controller"));
    }else {
      echo "ERRRORRRR";
    }  
  }

  
}