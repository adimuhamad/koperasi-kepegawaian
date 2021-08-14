<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Form Edit Data
      </h1>
    </section>
	<section class="content">
		<?php  foreach($tb_pegawai as $pgw) { ?>

		<form action="<?php echo base_url().'pegawai/update'; ?>" method="post">

		  <div class="form-group">
            <label>NIP</label>
            <input type="hidden" name="NIP" class="form-control" value="<?php  echo $pgw->NIP ?>"> 
            <input type="text" name="nip" class="form-control" value="<?php  echo $pgw->NIP ?>">
          </div>

          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php  echo $pgw->Nama ?>">
          </div>

          <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?php  echo $pgw->Alamat ?>">
          </div>

          <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" value="<?php  echo $pgw->Telepon ?>">
          </div>

          <div class="form-group">
            <label>Pangkat</label>
            <div>
                <select name="pangkat" class="form-control col-sm-10">
                  <option value="<?php echo $pgw->id_pangkat ?>"><?php  echo $pgw->id_pangkat ?></option>
                  <?php
                    include "koneksi.php";                
                    $tampil = mysqli_query($mysqli, "select * from tb_pangkat");
                    $no = 1;
                    while($hasil = mysqli_fetch_array($tampil)){
                  ?>
                  <option value="<?php echo $hasil['Id_pangkat']; ?>">
                  <?php echo $hasil['Nama_jabatan']; ?>
                  </option>
                  <?php } ?>
                </select>
              </div>
            </div>

          <hr>
          <div class="form-group">
            <label>Gaji</label>
            <input type="number" name="gaji" class="form-control" value="<?php  echo $pgw->Gaji_bersih ?>">
          </div>

          <div class="form-group">
            <label>Tipe Pegawai</label>
            <div>
                <select name="tipe" class="form-control col-sm-10">
                  <option value="<?php echo $pgw->id_tipe ?>"><?php echo $pgw->id_tipe ?></option>
                  <?php
                    include "koneksi.php";                
                    $tampil = mysqli_query($mysqli, "select * from tb_tipepegawai");
                    $no = 1;
                    while($hasil = mysqli_fetch_array($tampil)){
                  ?>
                  <option value="<?php echo $hasil['id_tipe']; ?>">
                  <?php echo $hasil['nama_tipe']; ?>
                  </option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <hr>
            <div class="form-group">
            <label>Slip Gaji</label>
            <div>
                <select name="slip" class="form-control col-sm-10">
                  <option value="<?php echo $pgw->id_slip ?>"><?php echo $pgw->id_slip ?></option>
                  <?php
                    include "koneksi.php";                
                    $tampil = mysqli_query($mysqli, "select * from tb_slipgaji");
                    $no = 1;
                    while($hasil = mysqli_fetch_array($tampil)){
                  ?>
                  <option value="<?php echo $hasil['id_slip']; ?>">
                  <?php echo $hasil['id_slip']; ?>
                  </option>
                  <?php } ?>
                </select> 
              </div>
            </div>
          
          <hr>
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-warning">Reset</button>
			
		</form>
		<?php } ?>
	</section>
</div>