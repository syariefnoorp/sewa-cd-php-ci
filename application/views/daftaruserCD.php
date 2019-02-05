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
                  <li class="active">
                    <a href="<?php echo base_url(); ?>index.php/Admin_controller/listUser" style="color:#ffa245">Daftar User</a>
                  </li>
                  <li ><a href="<?php echo base_url() ?>index.php/Admin_controller/history">Riwayat</a></li>
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
        <h2 style="margin:40px 0px 40px 0px">Daftar Peminjam</h2>
        <table class="table table-hover">
          <thead>
            <tr>
              <th style="width:10%;">Username</td>
              <th style="width:10%;">Password</td>
              <th style="width:30%; text-align:center">Nama</td>
              <th style="width:30%; text-align:center">Alamat</td>
              <th style="width:10%">No HP</td>
            </tr>
          </thead>
          <tbody>
            <?php foreach($allUser as $user) : ?>
              <tr>
                <td style="width:10%;"><?php echo $user->username; ?></td>
                <td style="width:10%;"><?php echo $user->password; ?></td>
                <td style="width:30%; text-align:center"><?php echo $user->nama; ?></td>
                <td style="width:30%; text-align:center"><?php echo $user->alamat; ?></td>
                <td style="width:10%"><?php echo $user->no_HP; ?></td>
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