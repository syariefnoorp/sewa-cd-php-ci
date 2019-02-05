<html>
  <head>
    <title>Ubah CD</title>
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
                    <img src="<?php echo asset_url()?>imgs/sewa.png" alt="Logo" width="100px">
                  </a>
              </div>
              <ul class="nav navbar-nav">
                  <li><a href="<?php echo base_url() ?>index.php/Admin_controller">Daftar CD</a></li>
                  <li><a href="<?php echo base_url() ?>index.php/Admin_controller/history">Riwayat</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                  <li><a href="<?php echo base_url() ?>index.php/Admin_controller/logout" style="">
                  <span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
              </ul>
          </div>
        </nav>
      </div>
      <div>
        <center>
            <div style="display: inline-block">
                <div>
                    <div class="head">
                        <img src="<?php echo asset_url()?>imgs/sewa2.png" alt="Logo" width="20%">
                    </div>
                    <div>
                        <h3 class="subhead">Ubah CD</h3>
                    </div>  
                    <div>
                      <?php foreach($thisCD as $cd): ?>
                        <form action="<?php echo base_url() ?>index.php/Admin_controller/ubahCD/<?php echo $cd->cd_id?>" method="POST">
                            <div>
                                <input class="input" type="text" name="nama_cd" size="48" placeholder="Nama CD"
                                  value="<?php echo $cd->cdName; ?>">
                            </div>
                            <div>
                                <input class="input" type="tel" name="stock_cd" size="48" placeholder="Stock CD"
                                  value="<?php echo $cd->stock; ?>">
                            </div>
                            <div>
                                <input class="input" type="text" name="harga_cd" size="48" placeholder="Harga CD"
                                  value="<?php echo $cd->hargaSewa; ?>">
                            </div>
                            <div>
                                <a href="<?php echo base_url() ?>index.php/Admin_controller"><input class="btnCancle" type="button" name="batal" value="Batal"></a>  
                                <input class="btnDaftar" type="submit" name="submit" value="Ubah">
                            </div>
                        </form>
                      <?php endforeach ?>
                    </div>
                </div>
            </div>
        </center>
      </div>
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
        .login{
          border-radius: 3px;
          width: 30%;
          margin: 8%;
          background-color: white;
          padding-bottom: 80px;
          box-shadow:1px 1px 8px black;
        }
        .subhead{
          font-weight: bold;
          margin-bottom:20px;
        }
        .head{
          margin-top: 60px;
          margin-bottom:40px;
          color: #005680;
        }
        body{
          background-color: #fff;
        }
        .btnDaftar{
          width: 100px;
          padding: 5px;
          border: none;
          background-color: #ffa245;
          color: white;
          border-radius: 4px;
          margin-top: 20px;
          margin-bottom: 20px;
        }
        .btnCancle{
          width: 100px;
          padding: 5px;
          border: none;
          background-color: #c7000a;
          color: white;
          border-radius: 4px;
          margin-top: 20px;
          margin-bottom: 20px;
        }
        .input{
          border-radius: 4px;
          border:1px solid #b3b3b3;
          padding: 5px;
          margin-bottom: 10px;
        }
        a{
          color:#FF2776;
        }
        p{
        width:390px;
        }
    </style>
  </body>

</html>