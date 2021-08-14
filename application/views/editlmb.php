<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Form Edit Data
      </h1>
    </section>
	<section class="content">
		<?php  foreach($tb_lembur as $lmb) { ?>

		<form action="<?php echo base_url().'lembur/update'; ?>" method="post">

		  <div class="form-group">
	        <label>NIP</label>
	        <input type="hidden" name="id" class="form-control" value="<?php  echo $lmb->id_lembur ?>">
	        <div>
	            <select name="nip" class="form-control col-sm-10">
	              <option value="<?php echo $lmb->NIP ?>"><?php  echo $lmb->NIP ?></option>
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
            <label>Mulai Lembur</label>
            <input type="time" name="mulai" class="form-control"placeholder="Masukan Jam Mulai" value="<?php  echo $lmb->mulai_lembur ?>" required>
          </div>

          <div class="form-group">
            <label>Selesai Lembur</label>
            <input type="time" name="selesai" class="form-control"placeholder="Masukan Jam Selesai" value="<?php  echo $lmb->selesai_lembur ?>" required>
          </div>

          <div class="form-group">
            <label>Gaji Lembur</label>
            <input type="number" name="gaji" class="form-control" value="<?php  echo $lmb->gaji_lembur ?>">
          </div>
          
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-warning">Reset</button>
			
		</form>
		<?php } ?>
	</section>
</div>