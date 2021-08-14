<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Tabel Data Pegawai
      </h1>
    </section>
    <section class="content">
      <?php echo $this->session->flashdata('pesan') ?>
      <?php echo $this->session->flashdata('message'); ?>
      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"> Tambah Data Pegawai</i></button>

    <section class="content">
      <table class="table table-bordered table-striped">
        <tr>
          <th>Nomor</th>
          <th>NIP</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Telepon</th>
          <th>Pangkat</th>
          <th>Gaji</th>
          <th>Tipe</th>
          <th colspan="2"><center>Tindakan</center></th>
        </tr>

        <?php
          include "koneksi.php";
          $tampil = mysqli_query($mysqli, "select a.*, b.*, c.*, d.* from tb_pegawai a inner join tb_pangkat b inner join tb_tipepegawai c inner join tb_slipgaji d on a.Id_pangkat=b.Id_pangkat and a.id_tipe=c.id_tipe and a.id_slip=d.id_slip");
          $no = 1;
          while($hasil = mysqli_fetch_array($tampil)) { ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $hasil['NIP']; ?></td>
          <td><?php echo $hasil['Nama']; ?></td>
          <td><?php echo $hasil['Alamat']; ?></td>
          <td><?php echo $hasil['Telepon']; ?></td>
          <td><?php echo $hasil['Nama_jabatan']; ?></td>
          <td><?php echo "Rp. ".number_format ($hasil['Gaji_bersih']); ?></td>
          <td><?php echo $hasil['nama_tipe']; ?></td>

          <td><?php echo anchor('pegawai/edit/'.$hasil['NIP'], '<center><div class="btn btn-primary"><i class="fa fa-edit"></i></div>') ?>

          <td onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini?')">
            <?php echo anchor('pegawai/hapus/'.$hasil['NIP'], '<center><div class="btn btn-danger"><i class="fa fa-trash"></i></div>') ?></td>
        </tr>

      <?php } ?>
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
        <form method="post" action="<?php echo base_url().'pegawai/tambah_aksi' ?>">

          <div class="form-group">
            <label>NIP</label>
            <input type="number" name="nip" class="form-control"placeholder="Masukan NIP" required>
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control"placeholder="Masukan Nama" required>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control"placeholder="Masukan Alamat" required>
          </div>
          <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control"placeholder="Masukan Nomor Telepon" required>
          </div>
          
          <div class="form-group">
            <label>Pangkat</label>
            <div>
              <select name="pangkat" class="form-control col-sm-10">
                <option value="">Pilih Pangkat</option>
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
            <div>
              <select name="gaji" class="form-control col-sm-10">
                <option value="">Pilih Gaji</option>
                <?php
                  include "koneksi.php";                
                  $tampil = mysqli_query($mysqli, "select * from tb_pangkat");
                  $no = 1;
                  while($hasil = mysqli_fetch_array($tampil)){
                ?>
                <option value="<?php echo $hasil['Besar_gaji']; ?>">
                <?php echo $hasil['Besar_gaji']; ?>
                </option>
                <?php } ?>
              </select> 
            </div>
          </div>
          <hr>
          <div class="form-group">
            <label>Tipe Pegawai</label>
            <div>
                <select name="tipe" class="form-control col-sm-10">
                  <option value="">Pilih Tipe Pegawai</option>
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
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-warning">Reset</button>

        </form>

      </div>
    </div>
  </div>
</div>
</div>