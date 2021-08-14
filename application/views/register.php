  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a><?php
    echo "<font color='white'><b>KOPERASI</b></font><br>"?></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Daftar akun baru</p>

    <form action="<?php echo base_url('signup') ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control form-control-lg" name="nama" placeholder="Nama" required="">
        <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" required="" autocomplete="off">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" required="" autocomplete="off">
        <?php echo form_error('password', '<div class="text-danger small ml-2">', '</div>') ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control form-control-lg" name="passconf" placeholder="Ulangi password" required="">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
        <div class="col-xs-13">
          <button type="submit" class="btn btn-primary btn-block btn-flat btn-user btn-block">Daftar</button>
        </div>
        <br>
        <center><a href="<?php echo base_url('login') ?>" class="text-center">Sudah punya akun? Masuk</a></center>
      </div>
    </form> 
  </div>
</div>
</body>
</html>
