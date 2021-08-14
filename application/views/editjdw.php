<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Form Edit Data
      </h1>
    </section>
	<section class="content">
		<?php  foreach($tb_jadwal as $jdw) { ?>

		<form action="<?php echo base_url().'jadwal/update'; ?>" method="post">

		  <div class="form-group">
	        <label>NIP</label>
	        <input type="hidden" name="id" class="form-control" value="<?php  echo $jdw->Id_jadwal ?>">
	        <div>
	            <select name="nip" class="form-control col-sm-10">
	              <option value="<?php echo $jdw->NIP ?>"><?php  echo $jdw->NIP ?></option>
	              <?php
	                include "koneksi.php";                
	                $tampil = mysqli_query($mysqli, "select * from tb_pegawai");
	                $no = 1;
	                while($hasil = mysqli_fetch_array($tampil)){
	              ?>
	              <option value="<?php echo $hasil['NIP']; ?>">
	              <?php echo $hasil['NIP']; ?>
	              </option>
	              <?php } ?>
	            </select>
	          </div>
	        </div>

	        <hr>
          <div class="form-group">
            <label>Jam Mulai</label>
            <input type="time" name="mulai" class="form-control"placeholder="Masukan Jam Mulai" value="<?php  echo $jdw->jam_mulai ?>" required>
          </div>

          <div class="form-group">
            <label>Jam Selesai</label>
            <input type="time" name="selesai" class="form-control"placeholder="Masukan Jam Selesai" value="<?php  echo $jdw->jam_selesai ?>" required>
          </div>

          <div class="form-group">
            <label>Alasan</label>
            <input type="text" name="alasan" class="form-control"placeholder="Masukan Alasan" value="<?php  echo $jdw->alasan ?>" required>
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control"placeholder="Masukan Keterangan" value="<?php  echo $jdw->keterangan ?>" required>
          </div>
          
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-warning">Reset</button>
			
		</form>
		<?php } ?>
	</section>
</div>