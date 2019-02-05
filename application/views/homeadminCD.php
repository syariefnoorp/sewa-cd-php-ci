<html>
    <head>
      <title>Admin</title>
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
              <li class="active">
                <a href="<?php echo base_url(); ?>index.php/Admin_controller" style="color:#ffa245">Daftar CD</a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>index.php/Admin_controller/listUser">Daftar User</a>
              </li>
              <li>
                <a href="<?php echo base_url(); ?>index.php/Admin_controller/history">Riwayat</a>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo base_url(); ?>index.php/Admin_controller/logout" style="">
              <span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
            </ul>
          </div>
        </nav>
      </div>
      <div class="container">
        <div><center>
          <h2 style="margin:40px 0px 40px 0px">Daftar CD</h2>
          <a href="<?php echo base_url(); ?>index.php/Admin_controller/tambah" style="color:#FF2776;">Tambah CD</a>
          <table class="table table-hover">
          <thead>
            <tr>
              <th style="width:5%; text-align: center;">No</td>
              <th style="width:60%;">Nama CD</td>
              <th style="width:10%; text-align:center">Stock</td>
              <th style="width:15%;">Harga</td>
              <th colspan=2 style="width:10%; text-align:center">Aksi</td>
            </tr>
          </thead>
          <tbody>
            <?php 
              $i = 0;
              foreach($daftarCD as $cd):
                $i = $i + 1;?>
            <tr>
              <td style="text-align:center;"><?php echo $i;?>.</td>
              <td><?php echo $cd['cdName'];?></td>
              <td style="text-align:center"><?php echo $cd['stock'];?></td>
              <td >Rp. <?php echo $cd['hargaSewa'];?></td>
              <td style=""><a href="<?php echo base_url(); ?>index.php/Admin_controller/ubah/<?php echo $cd['cd_id'];?>"
                style="color:#FF2776;">Ubah</a></td>
              <?php
                echo "<td style=\"\">";
                if($cd['dapatDihapus']){
                  echo "<a href=\"" . base_url() . "index.php/Admin_controller/hapusCD/" . 
                  $cd['cd_id'] . "\"style=\"color:#FF2776;\">Hapus</a>"; 
                } else {
                  echo "Hapus";
                }
                echo "</td>";
              ?>
            </tr>
            <?php endforeach ?>
          </tbody>
          </table>
          </center>
        </div>
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