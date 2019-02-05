<?php

class CD_model extends CI_Model {

  function addCD($namaCD, $stok, $hargaSewa) {
    $data = array(
      'cdName' => $namaCD,
      'stock' => $stok,
      'hargaSewa' =>  $hargaSewa
    );
    $query = $this->db->insert('cd', $data);
  }

  function getListCD() {
    $this->db->select('*');
    $this->db->from('cd');
    $query = $this->db->get();

    return $query->result();
  }

  public function getCD($cdID) {
    $this->db->where('cd_id', $cdID);
    $query = $this->db->get('cd');

    return $query->result();
  }

  function deleteCD($cdID) {
    $this->db->where('cd_id', $cdID);
    $query = $this->db->delete('cd');
  }

  function updateCD($cd_id, $namaCD, $stock, $hargaSewa) {
    $data = array(
      'cdName' => $namaCD,
      'stock' => $stock,
      'hargaSewa' =>  $hargaSewa
    );

    $this->db->set($data);
    $this->db->where('cd_id', $cd_id);
    $this->db->update('cd');

  }

}
