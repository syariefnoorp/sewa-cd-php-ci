<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    
    <body>
        <div>
            <nav class="main-navbar navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header" >
                        <a class="navbar-brand" href="#">
                          <img src="<?php echo asset_url()?>imgs/sewa.png" alt="Logo" width="100px">
                        </a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#" style="color:#ffa245">Pinjam</a></li>
                        <li><a href="#">Histori</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" style=""><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="container">
            <center>
            <h2 style="margin: 40px 0px 40px 0px">Konfirmasi Peminjaman</h2>
            <div class="detail">
              <?php foreach($selectedCD as $cd):?>
                <pre>ID             : <span><?php echo $cd->cd_id;?></span></pre>
                <pre>Nama CD        : <span><?php echo $cd->cdName;?></span></pre>
                <pre>Tgl Pinjam     : <span><?php echo $tanggalPinjam;?></span></pre>
                <pre>Batas Kembali  : <span><?php echo $batasTanggal;?></span></pre>
                <pre>Harga          : <span><?php echo $cd->hargaSewa * 7;?></span></pre>
              
            </div>
            <div>
                <span>
                    <a href="<?php echo base_url() ?>index.php/Home_controller"><button class="btn btn-cancel">Cancel</button></a>
                    <a href="<?php echo base_url() ?>index.php/Home_controller/pinjamCD/<?php echo "$cd->cd_id";?>"
                    <button class="btn btn-submit">Submit</button></a>
                </span>
            </div>
            <?php endforeach ?> 
            </center>
        </div>

    </body>

<style type="text/css">
    .detail{
        width:50%;
        text-align:left;
    }
    .btn{
        border-radius: 4px;
        background-color: #ffa245;
        border:0px;
        color:white;
        width:10%;
        padding:5px;
        margin:20px 10px 20px 10px;
    }
    .btn:hover,
    .btn:focus{
        color:white;
    }
    .btn-cancel{
        background-color:#c7000a;
    }
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