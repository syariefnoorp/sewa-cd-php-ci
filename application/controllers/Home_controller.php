<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once("application/core/Auth_Controller.php");

class Home_controller extends Auth_Controller {

  function __construct(){
    parent::__construct();
  }

  public function index(){
    $this->load->model('CD_model');

    $listCD = $this->CD_model->getListCD();
    $data['listCD'] = $listCD;

    $this->load->view('homeCD', $data);
  }

  public function konfirmasi($cdID){
    $this->load->model('CD_model');

    $thisCD = $this->CD_model->getCD($cdID);
    date_default_timezone_set("Asia/Jakarta");
    $tanggalPinjam = date("d-m-Y");
    $date = strtotime("+7 day");
    $batasTanggal = date('d-m-Y', $date);
    
    $data = array(
      'selectedCD' => $thisCD,
      'tanggalPinjam' => $tanggalPinjam,
      'batasTanggal' => $batasTanggal
    );
    $this->load->view('pinjamCD', $data);
  }

  public function pinjamCD($cdID){
    //update cd stock
    $this->load->model('CD_model');

    $thisCD = $this->CD_model->getCD($cdID);
    foreach($thisCD as $cd){
      $namaCD = $cd->cdName;
      $stock = $cd->stock;
      $hargaSewa = $cd->hargaSewa;
    }
    $this->CD_model->updateCD($cdID, $namaCD,  
        $stock-1, $hargaSewa);

    // insert ke peminjaman
    $this->load->model('Peminjaman_model');

    $inserted = $this->Peminjaman_model->pinjam($cdID, $hargaSewa);

    // balik ke home
    redirect(base_url("index.php/home_controller"));
  }

  public function history() {
    $this->load->model('Peminjaman_model');
    $this->load->model('CD_model');
 
    $listPeminjamanCD = $this->Peminjaman_model->getHistoryUser($this->session->userdata('username'));
    $history = array();
    foreach($listPeminjamanCD as $list){
      $temp = $this->CD_model->getCD($list->cd_id);
      foreach($temp as $cd){
        $tanggalPengembalian = $list->tanggalPengembalian;
        $hargaSewa = $cd->hargaSewa;
        $totalDenda = $list->totalDenda;
        if($tanggalPengembalian == null){
          $tanggalPengembalian = "-";
          $tanggalSekarang = date_create(date("d-m-Y"));
          $tanggalPinjam = date_create($list->tanggalPinjam);
          $diff = date_diff($tanggalPinjam, $tanggalSekarang);
          $diff = $diff->format("%a");
          $totalDenda = 0;
          if($diff > 7){
            $totalDenda = ($diff-7) * 1000;
          }
          
          $totalHarga = ($hargaSewa * 7) + $totalDenda; 
        } else {
          $totalHarga = $list->totalHarga;
        }
        
        $row = array(
          'cdID' => $list->cd_id,
          'namaCD' => $cd->cdName,
          'tanggalPinjam' => $list->tanggalPinjam,
          'batasTanggal' => $list->batasTanggal,
          'hargaSewa' => $hargaSewa,
          'denda' => $totalDenda,
          'totalHarga' => $totalHarga,
          'tanggalPengembalian' => $tanggalPengembalian
        );
      }
      $history[] = $row;
    }
    
    $data['history'] = $history;
    $this->load->view('historiCD', $data);
  }
  
  public function logout() {
    $data = array(
      'username', 'nama',
      'alamat', 'no_HP',
      'validated'
      );
    $this->session->unset_userdata($data);
    redirect(base_url("index.php/login_controller"));
  }
}