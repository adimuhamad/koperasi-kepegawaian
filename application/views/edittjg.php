<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Form Edit Data
      </h1>
    </section>
	<section class="content">
		<?php  foreach($tb_tunjangan as $tjg) { ?>

		<form action="<?php echo base_url().'tunjangan/update'; ?>" method="post">

		  <div class="form-group">
	        <label>NIP</label>
	        <input type="hidden" name="id" class="form-control" value="<?php  echo $tjg->Id_tunjangan ?>">
	        <div>
	            <select name="nip" class="form-control col-sm-10">
	              <option value="<?php echo $tjg->NIP ?>"><?php  echo $tjg->NIP ?></option>
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
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" value="<?php  echo $tjg->Deskripsi ?>">
          </div>

          <div class="form-group">
            <label>Jumlah Tunjangan</label>
            <input type="number" name="jumlah" class="form-control" value="<?php  echo $tjg->Besar_tunj ?>">
          </div>
          
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-warning">Reset</button>
			
		</form>
		<?php } ?>
	</section>
</div>