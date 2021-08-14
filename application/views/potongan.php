<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Tabel Data Potongan Gaji Pegawai
      </h1>
    </section>
    <section class="content">
      <?php echo $this->session->flashdata('pesan') ?>
      <?php echo $this->session->flashdata('message'); ?>
      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus "> Tambah Data</i></button>

 	<section class="content">
      <table class="table table-bordered table-striped">
        <tr>
          <th>Nomor</th>
          <th>NIP</th>
          <th>Nama</th>
          <th>Deskripsi</th>
          <th>Besar Potongan</th>
          <th colspan="2"><center>Tindakan</center></th>
        </tr>

        <?php
          include "koneksi.php";
          $tampil = mysqli_query($mysqli, "select a.*, b.* from tb_potongan a inner join tb_pegawai b on a.NIP=b.NIP");
          $no = 1;
          while($hasil = mysqli_fetch_array($tampil)) { ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $hasil['NIP']; ?></td>
          <td><?php echo $hasil['Nama']; ?></td>
          <td><?php echo $hasil['Desk_potongan']; ?></td>
          <td><?php echo "Rp. ".number_format ($hasil['Besar_pot']); ?></td>

          <td><?php echo anchor('potongan/edit/'.$hasil['id_potongan'], '<center><div class="btn btn-primary"><i class="fa fa-edit"></i></div>') ?>

          <td onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini?')">
            <?php echo anchor('potongan/hapus/'.$hasil['id_potongan'], '<center><div class="btn btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
        </tr>

      <?php 

  	  } ?>
      </table>
   </section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Form Input Data</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'potongan/tambah_aksi' ?>">

          
          <div class="form-group">
            <label>NIP</label>
            <div>
              <select name="nip" class="form-control col-sm-10">
                <option value="">Pilih NIP</option>
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
            <label>Slip Gaji</label>
            <div>
                <select name="slip" class="form-control col-sm-10">
                  <option value="">Pilih Slip Gaji</option>
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
          <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control"placeholder="Masukan Deskripsi" required>
          </div>
          <div class="form-group">
            <label>Jumlah Potongan</label>
            <input type="number" name="jumlah" class="form-control"placeholder="Masukan Jumlah Potongan" required>
          </div>
          
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-warning">Reset</button>

        </form>

      </div>
    </div>
  </div>
</div>
</div>