<?php

class User_model extends CI_Model {
  
  function addUser($username, $password, $nama, $alamat, $noHP) {
    $data = array(
      'username' => $username,
      'password' => $password,
      'nama' =>  $nama,
      'alamat' => $alamat,
      'no_HP' => $noHP
    );
    $query = $this->db->insert('user', $data);

    //  return $query->result();
  }

  function cekUsername($username) {
    $this->db->where('username', $username);
    $query = $this->db->get('user');

    return $query->result();
  }

  public function getAllUser(){ //only admin can use, all user except admin
    $except = "admin";
    $this->db->where_not_in('username', $except);
    $query = $this->db->get('user');

    return $query->result();

  }

  public function loginValidate($username, $password){

    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $query = $this->db->get('user');

    if($query->num_rows() == 1){
      // If there is a user, then create session data
      
      $row = $query->row();
      $data = array(
        'username' => $row->username,
        'nama' => $row->nama,
        'alamat' => $row->alamat,
        'no_HP' => $row->no_HP,
        'validated' => true
        );
      $this->session->set_userdata($data);
      return true;
    }
    // If the previous process did not validate
    // then return false.
    return false;
  }

  function logout(){
    $this->session->sess_destroy();
  }
  
}
