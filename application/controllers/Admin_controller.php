<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once("application/core/Auth_Controller.php");

class Admin_controller extends Auth_Controller {

  function __construct(){
    parent::__construct();
  }

  public function index(){
    $this->load->model('CD_model');
    $this->load->model('Peminjaman_model');

    $daftarCD = array();
    $listCD = $this->CD_model->getListCD();
    foreach($listCD as $list){
      $temp = $this->Peminjaman_model->getListCDDipinjam($list->cd_id);
      $dapatDihapus = true;
      foreach($temp as $cdDipinjam){
        if($cdDipinjam->tanggalPengembalian == null){
          $dapatDihapus = false;
          break;
        }
      }
      $thisCD = array(
        'cd_id' => $list->cd_id,
        'cdName' => $list->cdName,
        'stock' => $list->stock,
        'hargaSewa' => $list->hargaSewa,
        'dapatDihapus' => $dapatDihapus
      );
      $daftarCD[] = $thisCD;
    }
    $data['daftarCD'] = $daftarCD;

    $this->load->view('homeadminCD', $data);
  }

  public function tambah() {
    $this->load->view('tambahCD');
  }

  public function tambahCD() {
    $this->load->model('CD_model');
    
    $nama_cd = $this->input->post('nama_cd');
    $stock_cd = $this->input->post('stock_cd');
    $harga_cd = $this->input->post('harga_cd');

    $this->CD_model->addCD($nama_cd, $stock_cd, $harga_cd);
      
    redirect(base_url("index.php/Admin_controller"));
  }

  public function ubah($cdID){
    $this->load->model('CD_model');
    $thisCD = $this->CD_model->getCD($cdID);

    $data['thisCD'] = $thisCD;

    $this->load->view('ubahCD', $data);
  }

  public function ubahCD($cdID) {
    $this->load->model('CD_model');
    
    $nama_cd = $this->input->post('nama_cd');
    $stock_cd = $this->input->post('stock_cd');
    $harga_cd = $this->input->post('harga_cd');

    $this->CD_model->updateCD($cdID, $nama_cd, $stock_cd, $harga_cd);

    redirect(base_url("index.php/Admin_controller"));
  }

  public function hapusCD($cdID){
    //update cd stock
    $this->load->model('CD_model');

    $thisCD = $this->CD_model->deleteCD($cdID);
    
    redirect(base_url("index.php/admin_controller"));
  }

  public function hitungSelisihTanggal($tanggalPinjam) {
    $tanggalSekarang = date_create(date("d-m-Y"));
    $tanggalPinjam = date_create($tanggalPinjam);
    $diff = date_diff($tanggalPinjam, $tanggalSekarang);
    return $diff->format("%a");
  }

  public function pengembalianCD($idPeminjaman){
    $this->load->model('Peminjaman_model');
    $this->load->model('CD_model');
    $peminjaman = $this->Peminjaman_model->getDetailPeminjaman($idPeminjaman);
    
    foreach($peminjaman as $temp){
      $diff = $this->hitungSelisihTanggal($temp->tanggalPinjam);
      $totalDenda = 0;
      if($diff > 7){
        $totalDenda = ($diff-7) * 1000;
      }

      $thisCD = $this->CD_model->getCD($temp->cd_id);
      foreach($thisCD as $cd){
        $hargaSewa = $cd->hargaSewa;
      }
      $totalHarga = ($hargaSewa * 7) + $totalDenda;

    }
    
    $tanggalPengembalian = date("d-m-Y");
    $this->Peminjaman_model->pengembalian($idPeminjaman, $tanggalPengembalian, $totalDenda, $totalHarga);

    // balik ke admin history
    redirect(base_url("index.php/admin_controller/history"));
  }

  public function history() {
    $this->load->model('Peminjaman_model');
    $this->load->model('CD_model');
 
    $listPeminjamanCD = $this->Peminjaman_model->getAllHistory();
    $history = array();

    foreach($listPeminjamanCD as $list){
      $temp = $this->CD_model->getCD($list->cd_id);
      foreach($temp as $cd){
        $tanggalPengembalian = $list->tanggalPengembalian;
        $hargaSewa = $cd->hargaSewa;
        $totalDenda = $list->totalDenda;
        if($tanggalPengembalian == null){
          $tanggalPengembalian = "-";
          $diff = $this->hitungSelisihTanggal($list->tanggalPinjam);
          $totalDenda = 0;
          if($diff > 7){
            $totalDenda = ($diff-7) * 1000;
          }
          
          $hargaSewa = $cd->hargaSewa;
          $totalHarga = ($hargaSewa * 7) + $totalDenda; 
        } else {
          $totalHarga = $list->totalHarga;
        }
        
        $row = array(
          'idPeminjaman' => $list->idPeminjaman,      
          'username' => $list->username,
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
    $this->load->view('historiadminCD', $data);
  }

  public function listUser(){
    $this->load->model('User_model');

    $allUser = $this->User_model->getAllUser();

    $data['allUser'] = $allUser;

    return $this->load->view('daftaruserCD', $data);
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