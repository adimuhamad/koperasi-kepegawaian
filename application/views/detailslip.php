<div class="content-wrapper">
	<section class="content-header">
      <h1>
        Slip Gaji Pegawai
      </h1>
    </section>
	<section class="content">
		<?php
		foreach($tb_slipgaji as $sgj)
		$gajibersih = $sgj->gaji + $sgj->tunjangan + $sgj->lembur - $sgj->potongan;
		{ ?>

		<table class="table table-bordered table-striped">
			<tr>
				<th width="200">NIP</th>
				<td width="1">:</td>
				<td width="0"><?php echo $sgj->nip ?></td>
			</tr>
			<tr>
				<th>NAMA</th>
				<td>:</td>
				<td><?php echo $sgj->nama ?></td>
			</tr>
			<tr>
				<th>JABATAN</th>
				<td>:</td>
				<td><?php echo $sgj->id_pangkat ?></td>
			</tr>
		</table>

		<h3>Perhitungan Gaji</h3>

		<table class="table table-bordered table-striped">
			<tr>
				<th width="200">GAJI KOTOR</th>
				<td width="1">:</td>
				<td width="0"><?php echo "Rp. ".number_format ($sgj->gaji) ?></td>
			</tr>
			<tr>
				<th>TUNJANGAN</th>
				<td>:</td>
				<td><?php echo "Rp. ".number_format ($sgj->tunjangan) ?></td>
			</tr>
			<tr>
				<th>LEMBUR</th>
				<td>:</td>
				<td><?php echo "Rp. ".number_format ($sgj->lembur) ?></td>
			</tr>
			<tr>
				<th>POTONGAN</th>
				<td>:</td>
				<td><?php echo "Rp. ".number_format ($sgj->potongan) ?></td>
			</tr>
			<tr>
				<th>GAJI BERSIH</th>
				<td>:</td>
				<td><b><?php echo "Rp. ".number_format ($gajibersih) ?></b></td>
			</tr>
		</table>

		<?php } ?>
	</section>
</div>