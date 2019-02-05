<html>
  <head>
    <title>Riwayat Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  
  <body>
    <div>
      <nav class="main-navbar navbar navbar-inverse">
          <div class="container-fluid">
              <div class="navbar-header" >
                  <a class="navbar-brand" href="<?php echo base_url() ?>index.php/Admin_controller">
                  <img src="<?php echo asset_url()?>imgs/sewa.png" alt="Logo" width="100px"></a>
              </div>
              <ul class="nav navbar-nav">
                  <li><a href="<?php echo base_url() ?>index.php/Admin_controller">Daftar CD</a></li>
                  <li>
                    <a href="<?php echo base_url(); ?>index.php/Admin_controller/listUser">Daftar User</a>
                  </li>
                  <li class="active"><a href="<?php echo base_url() ?>index.php/Admin_controller/history"
                   style="color:#ffa245">Riwayat</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                  <li><a href="<?php echo base_url() ?>index.php/Admin_controller/logout" style="">
                  <span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
              </ul>
          </div>
      </nav>
    </div>
    <div class="container">
      <center>
        <h2 style="margin:40px 0px 40px 0px">Histori Peminjaman</h2>
        <table class="table table-hover">
          <thead>
            <tr>
              <th style="width:5%;">No</td>
              <th style="width:5%;">username</td>
              <th style="width:25%;">Nama CD</td>
              <th style="width:9%; text-align:center">Tgl Pinjam</td>
              <th style="width:9%; text-align:center">Batas Kembali</td>
              <th style="width:10%">Harga</td>
              <th style="width:10%">Denda</td>
              <th style="width:12%">Total</td>
            </tr>
          </thead>
          <tbody>
            <?php 
              $i = 0;
              foreach($history as $row):
                $i = $i + 1;?>
            <tr>
              <td style="text-align:right"><?php echo $i;?>.</td>
              <td style="text-align:center"><?php echo $row['username'];?></td>
              <td><?php echo $row['namaCD'];?></td>
              <td style="text-align:center"><?php echo $row['tanggalPinjam'];?></td>
              <td style="text-align:center"><?php echo $row['batasTanggal'];?></td>
              <td>Rp. <?php echo $row['hargaSewa'];?></td>
              <td>Rp. <?php echo $row['denda'];?></td>
              <td>Rp. <?php echo $row['totalHarga'];?></td>
              <?php
                echo "<td style=\"text-align:center\">";
                if($row['tanggalPengembalian'] == "-"){
                  echo "<a href=\"" . base_url() . "index.php/Admin_controller/pengembalianCD/" . $row['idPeminjaman'] 
                  . "\"><button class=\"btn\">Dikembalikan</button></a>";
                } else{
                  echo $row['tanggalPengembalian'];
                }
                echo "</td>";
              ?>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </center>
    </div>
  </body> 
  <style type="text/css">
    .main-navbar{
      border-color:#005680;
      background-color:#005680;
      border-radius:0px
    }
    .navbar-inverse .navbar-nav > .active > a, 
    .navbar-inverse .navbar-nav > .active > a:focus, 
    .navbar-inverse .navbar-nav > .active > a:hover {
        background-color: #004263;
    }
    .nav.navbar-nav.navbar-right li a:hover,
    .nav.navbar-nav.navbar-right li a:focus
    {
        color:#ffa245;
    }
    .nav.navbar-nav.navbar-right li a{
        color:#fff;
    }
    .nav.navbar-nav li a{
        color:#fff;
    }
    .nav.navbar-nav li a:hover,
    .nav.navbar-nav li a:focus{
        color:#ffa245;
    }
  </style>
</html>