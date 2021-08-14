  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a><?php
echo "<font color='white'><b>KOPERASI</b></font><br>"?></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Masuk untuk memulai sesi</p>
    <?php echo $this->session->flashdata('pesan') ?>
    <form action="<?php echo base_url('login') ?>" method="post">
      <div class="form-group has-feedback">
        <input type="username" class="form-control" name="username" placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat form-control">Masuk</button>
          <br>
          <center><a href="<?php echo base_url('signup') ?>" class="text-center">Belum punya akun? Daftar</a></center>
      </div>
    </div>
  </form>
</div>
</div>
    </form>
</body>
</html>