<html>
    <head>
        <title>Daftar Akun</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <center>
            <div style="display: inline-block">
                <div>
                    <div class="head">
                        <img src="<?php echo asset_url()?>imgs/sewa2.png" alt="Logo" width="20%">
                    </div>
                    <div>
                        <h6 class="subhead">Daftar akun baru sekarang</h3>
                    </div>
                    <div>
                        <form action="<?php echo base_url() ?>index.php/Login_controller/registUser" method="post">
                            <div>
                                <input class="input" type="text" name="namalengkap" size="48" placeholder="Nama Lengkap">
                            </div>
                            <div>
                                <input class="input" type="text" name="username" size="48" placeholder="Username">
                            </div>
                            <div>
                                <input class="input" type="tel" name="phone" size="48" placeholder="Nomor Telepon">
                            </div>
                            <div>
                                <input class="input" type="text" name="alamat" size="48" placeholder="Alamat">
                            </div>
                            <div>
                                <input class="input" type="password" name="password" size="48" placeholder="Password">
                            </div>
                            <div>
                                <input class="input" type="password" name="konfirmasi" size="48" placeholder="Konfirmasi Password">
                            </div>
                            <div>
                                <p align="justify">Dengan klik daftar, kamu telah menyetujui <a href="#">Aturan Pengguna</a> dan 
                                <a href="#">Kebijakan Privasi</a></p>
                            </div>
                            <div>
                                <input class="btnDaftar" type="submit" name="submit" value="Daftar">  
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </center>
    </body>
    <style type="text/css">
    .input-gender{
        margin:10px 5px 20px;
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
      width: 390px;
      padding: 5px;
      border: none;
      background-color: #ffa245;
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
</html>