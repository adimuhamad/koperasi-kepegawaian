<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Form Edit Data
      </h1>
    </section>
	<section class="content">
		<?php  foreach($tb_slipgaji as $sgj) { ?>

		<form action="<?php echo base_url().'slipgaji/update'; ?>" method="post">

		  <div class="form-group">
	        <label>NIP</label>
	        <input type="hidden" name="id" class="form-control" value="<?php  echo $sgj->id_slip ?>">
	        <div>
	            <select name="nip" class="form-control col-sm-10">
	              <option value="<?php echo $sgj->nip ?>"><?php  echo $sgj->nip ?></option>
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
            <label>Pangkat</label>
            <div>
                <select name="pangkat" class="form-control col-sm-10">
                  <option value="<?php echo $sgj->id_pangkat ?>"><?php  echo $sgj->id_pangkat ?></option>
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
            <label>Jumlah Gaji</label>
            <input type="number" name="gaji" class="form-control" value="<?php  echo $sgj->gaji ?>">
          </div>

          <div class="form-group">
            <label>Jumlah Tunjangan</label>
            <input type="number" name="tunjangan" class="form-control" value="<?php  echo $sgj->tunjangan ?>">
          </div>

          <div class="form-group">
            <label>Jumlah Potongan</label>
            <input type="number" name="potongan" class="form-control" value="<?php  echo $sgj->potongan ?>">
          </div>

          <div class="form-group">
            <label>Jumlah Uang Lembur</label>
            <input type="number" name="lembur" class="form-control" value="<?php  echo $sgj->lembur ?>">
          </div>
          
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-warning">Reset</button>
			
		</form>
		<?php } ?>
	</section>
</div>