<html>
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  </head>
  
  <body class="container-fluid row" style="background-color: #005680;">
    <div class="col-1"></div>
    <div class="main-left col-5">
        <img src="<?php echo asset_url()?>imgs/sewa.png" alt="Logo" width="70%">
    </div>
    <div class="col-1"></div>
    <div class="main-right col-4">
      <div class="parent-form">
        <h2 class="head">Login</h2>
        <form method="POST" action="<?php echo base_url() ?>index.php/Login_controller/process">
          <div>
            <input class="input" type="text" name="username" placeholder="Username">
          </div>
          <div>
            <input class="input" type="password" name="password" placeholder="Password">
          </div>
          <div>
            <input class="btn-login" type="submit" name="submit" value="Login">
          </div>
          <div>
            <p>Belum memiliki akun ? <a href="<?php echo base_url() ?>index.php/Login_controller/regist">Daftar</a></p>
          </div>
        </form>
      </div>
    </div>
  </body>

  <style type="text/css">
    .main-left{
      display: flex;
      flex-direction: column; /* Komponen2 dalam Flexbox diurutkan Top-down vertikal */
      justify-content: center;
    }
    .main-right{
      display: flex; /* Flexbox untuk penataan komponen2 di dalamnya */
      flex-direction: column; /* Komponen2 dalam Flexbox diurutkan Top-down vertikal */
      justify-content: center; /* X Axis */
    }
    .head{
      color:#005680;
      margin: 40px 0px 40px 0px
    }
    .parent-form{
      background-color:#fff; 
      text-align:center;
      border-radius:4px;
      box-shadow:3px 3px 8px rgba(0, 0, 0, .5);
    }
    .input{
      border-radius: 4px;
      border:1px solid #b3b3b3;
      padding: 5px;
      width: 70%;
      margin-bottom: 10px;
    }
    .btn-login{
      width: 70%;
      padding: 5px;
      border: none;
      background-color: #ffa245;
      color: white;
      border-radius: 4px;
      margin-top: 20px;
      margin-bottom: 20px;
    }
    a{
      color:#FF2776;
    }
    p{
      margin-bottom:40px;
    }
  </style>
</html>