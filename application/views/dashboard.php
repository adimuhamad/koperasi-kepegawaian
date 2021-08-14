 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>  
    </section>
    <div class="col-lg-12">
    <br>
    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo $this->session->flashdata('message') ?>
    </div>
    <br>
    <div class="col-lg-12">
    <div class="row">
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        <?php
                            $this->db->select('*');
                            $this->db->from('tb_pegawai');
                            echo $this->db->count_all_results();
                        ?>
                    </h3>
                    <p>
                        Total Data Pegawai
                    </p>
                </div>
                
                <a href="<?php echo site_url('pegawai');?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                        <?php
                            $this->db->select('*');
                            $this->db->from('tb_tunjangan');
                            echo $this->db->count_all_results();
                        ?>
                    </h3>
                    <p>
                        Total Data Tunjangan
                    </p>
                </div>
                
                <a href="<?php echo site_url('tunjangan');?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                        <?php
                            $this->db->select('*');
                            $this->db->from('tb_potongan');
                            echo $this->db->count_all_results();
                        ?>                                    
                    </h3>
                    <p>
                        Total Data Potongan
                    </p>
                </div>
                
                <a href="<?php echo site_url('potongan');?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
         <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        <?php
                            $this->db->select('*');
                            $this->db->from('tb_jadwal');
                            echo $this->db->count_all_results();
                        ?>                                    
                    </h3>
                    <p>
                        Total Data Jadwal
                    </p>
                </div>
                
                <a href="<?php echo site_url('jadwal');?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
         <div class="small-box bg-blue">
                <div class="inner">
                    <h3>
                        <?php
                            $this->db->select('*');
                            $this->db->from('tb_lembur');
                            echo $this->db->count_all_results();
                        ?>                                    
                    </h3>
                    <p>
                        Total Data Lembur
                    </p>
                </div>
                
                <a href="<?php echo site_url('lembur');?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
         <div class="small-box bg-orange">
                <div class="inner">
                    <h3>
                        <?php
                            $this->db->select('*');
                            $this->db->from('tb_slipgaji');
                            echo $this->db->count_all_results();
                        ?>                                    
                    </h3>
                    <p>
                        Total Data Slip Gaji
                    </p>
                </div>
                
                <a href="<?php echo site_url('slipgaji');?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
    </div>
  </div>

      <div class="row">
        <div class="col-lg-12">
      <div class='col-lg-12'>
        <div class='panel panel-default'>
          <div class='panel-heading'>
            Informasi Pembuat
          </div>
          <div class='panel-body'>
            <ul class='nav nav-tabs'>
              <li class='active'><a href='#home' data-toggle='tab'><i class="fa fa-home"></i> Home</a>
              </li>
              <li><a href='#biodata' data-toggle='tab'><i class="fa fa-id-card"></i> Biodata</a>
              </li>
              <li><a href='#akademik' data-toggle='tab'><i class="fa fa-graduation-cap"></i> Akademik</a>
              </li>
              <li><a href='#kontak' data-toggle='tab'><i class="fa fa-address-book"></i> Kontak</a>
              </li>
            </ul>
            <div class='tab-content'>
              <div class='tab-pane fade in active' id='home'>
                <table>
                    <tr><br>
                      Website ini dibuat untuk memenuhi nilai <b>Ujian Akhir Semester</b>
                      <td align='left' width='100px'><b>Kode MK</b></td><td>: 01125</td></tr>
                      <tr><td align='left'><b>Mata Kuliah</b></td><td>: Basis Data 2 (Sistem Basis Data)</td></tr>
                      <tr><td align='left'><b>SKS</b></td><td>: 4</td></tr>
                      <tr><td align='left'><b>Dosen</b></td><td>: Alif Finandhita, S.Kom., M.T</td></tr></tr>
                      </td>
                    </tr>
                  </table>
              </div>
              <div class='tab-pane fade' id='biodata'>                        
                  <table>
                    <tr><br>
                      <td align='left' width='180px'><b>Nama Lengkap</b></td><td>: Mochamad Adi Maulia Rahman</td></tr>
                      <tr><td align='left'><b>Nomor Induk Mahasiswa</b></td><td>: 10119253</td></tr>
                      <tr><td align='left'><b>Kelas</b></td><td>: IF-7</td></tr>
                      <tr><td align='left'><b>Jenis Kelamin</b></td><td>: Laki-laki</td></tr>
                      <tr><td align='left'><b>Tempat, tanggal lahir</b></td><td>: Bandung, 06 Februari 2001</td></tr>
                      </td>
                    </tr>
                  </table>                            
              </div>
              <div class='tab-pane fade' id='akademik'>
                <table>
                    <tr><br>
                      <td align='left' width='150px'><b>Fakultas</b></td><td>: Teknik & Ilmu Komputer</td></tr>
                      <tr><td align='left'><b>Jurusan</b></td><td>: Teknik Informatika S1</td></tr>
                      <tr><td align='left'><b>Kelas/Tahun Masuk</b></td><td>: IF-7 / 2019</td></tr>
                      <tr><td align='left'><b>Semester</b></td><td>: Genap (IV) 2020/2021</td></tr>
                      <tr><td align='left'><b>Dosen Wali</b></td><td>: Alif Finandhita, S.Kom, M.T</td></tr>
                      </td>
                    </tr>
                  </table>
              </div>
              <div class='tab-pane fade' id='kontak'>
                <table>
                    <tr><br>
                      <td align='left' width='150px'><b>Email Pribadi</b></td><td>: mmochamadadi23@gmail.com</td></tr>
                      <tr><td align='left'><b>Email Kampus</b></td><td>: adi.10119253@mahasiswa.unikom.ac.id</td></tr>
                      <tr><td align='left'><b>Username Telegram</b></td><td>: mochadhi62</td></tr>
                      </td>
                    </tr>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>          
    </div>
  </div>
</section>
</div>
</body>
</html>
