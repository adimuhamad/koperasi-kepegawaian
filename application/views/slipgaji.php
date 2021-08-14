<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Tabel Data Slip Gaji
      </h1>
    </section>
    <section class="content">
    	<?php echo $this->session->flashdata('message') ?>
    	<?php echo anchor('slipgaji/tambah_slip/', '<div class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Slip</div>') ?>

    <section class="content">
      <table class="table table-bordered table-striped">
        <tr>
          <th>ID Slip</th>
          <th>NIP</th>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Gaji</th>
          <th>Tunjangan</th>
          <th>Lembur</th>
          <th>Potongan</th>
          <th colspan="2"><center>Tindakan</center></th>
        </tr>

        <?php
          include "koneksi.php";
          $tampil = mysqli_query($mysqli, "select a.*, b.*, c.* from tb_slipgaji a inner join tb_pangkat b inner join tb_pegawai c on a.Id_pangkat=b.Id_pangkat and a.nip=c.NIP");
          while($hasil = mysqli_fetch_array($tampil)) { ?>
        <tr>
          <td><?php echo $hasil['id_slip']; ?></td>
          <td><?php echo $hasil['NIP']; ?></td>
          <td><?php echo $hasil['nama']; ?></td>
          <td><?php echo $hasil['Nama_jabatan']; ?></td>
          <td><?php echo "Rp. ".number_format ($hasil['gaji']); ?></td>
          <td><?php echo "Rp. ".number_format ($hasil['tunjangan']); ?></td>
          <td><?php echo "Rp. ".number_format ($hasil['lembur']); ?></td>
          <td><?php echo "Rp. ".number_format ($hasil['potongan']); ?></td>

          <td><?php echo anchor('slipgaji/edit/'.$hasil['id_slip'], '<center><div class="btn btn-primary"><i class="fa fa-edit"></i></div>') ?></td>
  		  <td><?php echo anchor('slipgaji/detail/'.$hasil['id_slip'], '<center><div class="btn btn-success"><i class="fa fa-file-text-o"></i></div>') ?></td>
        </tr>

      <?php } ?>
      </table>
    </section>
</div>