<html>
  <head>
    <title>Pinjam</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  
  <body>
    <div>
      <nav class="main-navbar navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header" >
            <a class="navbar-brand" href="<?php echo base_url() ?>index.php/Home_controller">
              <img src="<?php echo asset_url()?>imgs/sewa.png" alt="Logo" width="100px">
            </a>
          </div>
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url() ?>index.php/Home_controller" style="color:#ffa245">Pinjam</a></li>
            <li><a href="<?php echo base_url() ?>index.php/Home_controller/history">Riwayat</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url() ?>index.php/Home_controller/logout" style="">
            <span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
          </ul>
        </div>
      </nav>
    </div>
    
    <div class="container">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
          <div class="item active"><center>
            <img src="<?php echo asset_url()?>imgs/besthorror.jpg" style="width:100%;">
            <div class="carousel-caption">
              <h3>7 Film Horror Terbaik di Indonesia</h3>
            </div>
          </center></div>

          <div class="item">
            <img src="<?php echo asset_url()?>imgs/gog.jpg" style="width:100%;">
            <div class="carousel-caption">
              <h3>Tokoh-tokoh film Guardian of Galaxy</h3>
            </div>
          </div>
    
          <div class="item">
            <img src="<?php echo asset_url()?>imgs/bestaction.jpg" style="width:100%;">
              <div class="carousel-caption">
                <h3>Film Best Action versi FOX Movie TV</h3>
              </div>
          </div>
        </div>

        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>


      
    <div style="margin: 30px;"><center>
      <h2>List CD</h2>
    </center></div>
    <div class="outer container-fluid">
      <?php
      $i = 0;
      foreach ($listCD as $cd) {
        $i = $i +1;
      ?>
      <div class="col-md-2 col-sm-2 col-xs-4 card">
        <img src="
        <?php 
        if($cd->cdName=='Twilight Saga'){
          echo asset_url()?>imgs/twilight.jpg
        <?php }elseif($cd->cdName=='Ayah'){
          echo asset_url()?>imgs/ayah.jpg
        <?php } elseif($cd->cdName=='Mars met Venus'){
          echo asset_url()?>imgs/marsvenus.jpg
        <?php } elseif($cd->cdName=='Hangout'){
          echo asset_url()?>imgs/hangout.jpg
        <?php } elseif($cd->cdName=='Divergent'){
          echo asset_url()?>imgs/divergent.jpg
        <?php } elseif($cd->cdName=='The Expendable 2'){
          echo asset_url()?>imgs/expendable2.jpg
        <?php } elseif($cd->cdName=='Soekarno'){
          echo asset_url()?>imgs/soekarno.jpg
        <?php } elseif($cd->cdName=='Epen & Cupen'){
          echo asset_url()?>imgs/epen.jpg
        <?php } elseif($cd->cdName=='Insya Allah Sah'){
          echo asset_url()?>imgs/insyaallah.jpg
        <?php } elseif($cd->cdName=='Sepatu Dahlan'){
          echo asset_url()?>imgs/dahlan.jpg
        <?php } else{
          echo asset_url()?>imgs/cd.jpg  
        <?php } ?>"
        
        style="width: 100%">
        <div class="content"><center>
            <p><?php echo $cd->cdName;?></p>
            <p><?php echo $cd->stock;?> pcs</p>
            <p>Rp. <?php echo $cd->hargaSewa;?></p>
            <a href="<?php echo base_url() ?>index.php/Home_controller/konfirmasi/<?php echo $cd->cd_id;?>" style="color:#FF2776;">Pinjam</a>
        </center></div>
      </div>
      <?php } ?>
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
        .outer{
          padding: 0px;
          margin: 50px;
        }
        .content{
          padding: 8px;
        }
        .card{
          float: left;
          padding: 0px;
          box-shadow: 1px 1px 1px 1px #A5A5A5;
          margin: 20px;
        }
        .penutup{
          clear: left;
        }

    </style>
</html>