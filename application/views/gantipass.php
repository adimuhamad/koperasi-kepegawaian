<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Form Ganti Password
      </h1>
    </section>
  <section class="content">
    <?php  foreach($tb_akun as $akn) { ?>

    <form action="<?php echo base_url().'gantipass/update'; ?>" method="post">

          <div class="form-group">
            <label>Password Baru</label>
            <input type="hidden" name="idAkun" class="form-control" value="<?php  echo $akn->idAkun ?>"> 
            <input type="text" name="password" class="form-control">
            <?php echo form_error('password', '<div class="text-danger small ml-2">','</div>'); ?>
          </div>

          <div class="form-group">
            <label>Ulangi Password</label>
            <input type="text" name="passconf" class="form-control">
            <?php echo form_error('passconf', '<div class="text-danger small ml-2">','</div>'); ?>
          </div>
          
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-warning">Reset</button>
      
    </form>
    <?php } ?>
  </section>
</div>