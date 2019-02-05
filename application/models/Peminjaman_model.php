<?php

class Peminjaman_model extends CI_Model {
  
  function pinjam($cdID, $hargaSewa){
    $username = $this->session->userdata('username');
    date_default_timezone_set("Asia/Jakarta");
    $tanggalPinjam = date("d-m-Y");
    $date = strtotime("+7 day");
    $batasTanggal = date('d-m-Y', $date);

    $data = array(
      'username' => $username,
      'cd_id' => $cdID,
      'tanggalPinjam' => $tanggalPinjam,
      'batasTanggal' => $batasTanggal
    );
    $query = $this->db->insert('peminjaman', $data);

    if($this->db->affected_rows() > 0){
    // Code here after successful insert
      return true; // to the controller
    }else{
      return false;
    }
    
  }

  public function getDetailPeminjaman($idPeminjaman){
    $this->db->where('idPeminjaman', $idPeminjaman);
    $query = $this->db->get('peminjaman');

    return $query->result();
  }
  
  public function getListCDDipinjam($cdID){
    $this->db->where('cd_id', $cdID);
    $query = $this->db->get('peminjaman');

    return $query->result();
  }

  function getHistoryUser($username) {
    $this->db->where('username', $username);
    $query = $this->db->get('peminjaman');

    return $query->result();
  }

  public function getAllHistory() {
    $query = $this->db->get('peminjaman');

    return $query->result();
  }

  function pengembalian($idPeminjaman, $tanggalPengembalian, $totalDenda, $totalHarga) {
    $data = array(
      'tanggalPengembalian' => $tanggalPengembalian,
      'totalDenda' => $totalDenda,
      'totalHarga' => $totalHarga
    );

    $this->db->set($data);
    $this->db->where('idPeminjaman', $idPeminjaman);
    $this->db->update('peminjaman');
  }

}
