    <!-- <?php //var_dump($pengurus);?> -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Begin Page Content -->
      <div class="container-fluid">
        <div class="alert bg-content" role="alert">
          <i class="fas fa-cogs"></i> Hasil Perhitungan Penilaian
        </div>
        <?php echo $this->session->flashdata('pesan');?>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
              <div class="card mb-4 py-3 border-left-danger">
                <div class="card-body">
                  <h4><i class="far fa-edit"></i> <b >Hasil Perhitungan Penilaian</b></h4>
                  <div class="garis" style="width: 100%; margin-bottom: 2%;"></div>
                </div>

                <div class="row">
                  <!-- Begin Page Content -->
                  <div class="container-fluid">
                    <div class="card shadow mb-4"> 
                      <br>
                      <center><h3>Data Kriteria</h3></center>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered" width="100%" cellspacing="0.5">
                            <thead>
                              <tr style="font-size: 12px; text-align: center;">
                                <th>No</th>
                                <th>Nama Kriteria</th>
                                <th>Bobot</th>
                                <th>Keterangan</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $no=1;
                                foreach ($kriteria as $sts) :
                              ?> 
                              <tr style="font-size: 12px; text-align:center;">
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $sts->nama_kriteria; ?></td>
                                <td><?php echo $sts->bobot; ?></td>
                                <td><?php echo $sts->keterangan; ?></td>
                              </tr> 
                            <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <!-- Nilai -->
                     <div class="card shadow mb-4"> 
                      <br>
                      <center><h3>Data Nilai Karyawan</h3></center>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0.5">
                            <thead>
                              <tr style="font-size: 12px; text-align: center;">
                                <th>No</th>
                                <th>Nama Karyawan</th>
                                <th>Kesetiaan</th>
                                <th>Prestasi Kerja</th>
                                <th>Tanggung Jawab</th>
                                <th>Ketaatan</th>
                                <th>Kejujuran</th>
                                <th>Kerjasama</th>
                                <th>Prakarsa</th>
                                <th>Kepimpinan</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $no=1;
                                foreach ($nilai as $sts) :
                              ?> 
                              <tr style="font-size: 12px; text-align:center;">
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $sts->nama_karyawan; ?></td>
                                <td><?php echo $sts->C1; ?></td>
                                <td><?php echo $sts->C2; ?></td>
                                <td><?php echo $sts->C3; ?></td>
                                <td><?php echo $sts->C4; ?></td>
                                <td><?php echo $sts->C5; ?></td>
                                <td><?php echo $sts->C6; ?></td>
                                <td><?php echo $sts->C7; ?></td>
                                <td><?php echo $sts->C8; ?></td>
                              </tr> 
                            <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div> 
                    <!-- Normalisasi -->
                     <div class="card shadow mb-4"> 
                      <br>
                      <center><h3>Tabel Pembobotan</h3></center>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered" width="100%" cellspacing="0.5">
                            <thead>
                              <tr style="font-size: 12px; text-align: center;">
                                <th>No</th>
                                <th>Nama Karyawan</th>
                                <th>Subbidang</th>
                                <th>Kesetiaan</th>
                                <th>Prestasi Kerja</th>
                                <th>Tanggung Jawab</th>
                                <th>Ketaatan</th>
                                <th>Kejujuran</th>
                                <th>Kerjasama</th>
                                <th>Prakarsa</th>
                                <th>Kepimpinan</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $no=1;
                                foreach ($bobot as $sts) :
                              ?> 
                              <tr style="font-size: 12px; text-align:center;">
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $sts[8]; ?></td>
                                <td><?php echo $sts[12]; ?></td>
                                <td><?php echo $sts[0]; ?></td>
                                <td><?php echo $sts[1]; ?></td>
                                <td><?php echo $sts[2]; ?></td>
                                <td><?php echo $sts[3]; ?></td>
                                <td><?php echo $sts[4]; ?></td>
                                <td><?php echo $sts[5]; ?></td>
                                <td><?php echo $sts[6]; ?></td>
                                <td><?php echo $sts[7]; ?></td>
                              </tr> 
                            <?php endforeach; ?>
                            </tbody> 
                          </table>
                        </div>
                      </div>
                    </div>  
                  
                  <!-- End Normalisasi -->
                  <!-- Normalisasi -->
                    <div class="card shadow mb-4"> 
                      <br>
                      <center><h3>Tabel Normalisasi</h3></center>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered" width="100%" cellspacing="0.5">
                            <thead>
                              <tr style="font-size: 12px; text-align: center;">
                                <th>No</th>
                                <th>Nama Karyawan</th>
                                <th>Subbidang</th>
                                <th>Kesetiaan</th>
                                <th>Prestasi Kerja</th>
                                <th>Tanggung Jawab</th>
                                <th>Ketaatan</th>
                                <th>Kejujuran</th>
                                <th>Kerjasama</th>
                                <th>Prakarsa</th>
                                <th>Kepimpinan</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $no=1;
                                foreach ($norm as $sts) :
                              ?> 
                              <tr style="font-size: 12px; text-align:center;">
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $sts[0]; ?></td>
                                <td><?php echo $sts[3]; ?></td>
                                <td><?php echo $sts[4]; ?></td>
                                <td><?php echo $sts[5]; ?></td>
                                <td><?php echo $sts[6]; ?></td>
                                <td><?php echo $sts[7]; ?></td>
                                <td><?php echo $sts[8]; ?></td>
                                <td><?php echo $sts[9]; ?></td>
                                <td><?php echo $sts[10]; ?></td>
                                <td><?php echo $sts[11]; ?></td>
                              </tr> 
                            <?php endforeach; ?>
                            </tbody> 
                          </table>
                        </div>
                      </div>
                    </div>  

                    <!-- Hasil Akhir -->
                    <div class="card shadow mb-4"> 
                      <br>
                      <center><h3>Tabel akhir</h3></center>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered" width="100%" cellspacing="0.5">
                            <thead>
                              <tr style="font-size: 12px; text-align: center;">
                                <th>No</th>
                                <th>Nama Karyawan</th>
                                <th>Subbidang</th>
                                <th>Nilai Akhir</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $no=1;
                                foreach ($wr as $sts) :
                              ?> 
                              <tr style="font-size: 12px; text-align:center;">
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $sts[0]; ?></td>
                                <td><?php echo $sts[3]; ?></td>
                                <td><?php echo $sts[4]; ?></td>
                              </tr> 
                            <?php endforeach; ?>
                            </tbody> 
                          </table>
                        </div>
                      </div>
                    </div>  
                    <!-- End Hasil Akhir -->
                  </div>

                  <!-- End Container Fluid -->
                  </div>
                  <!-- End Nilai -->
                 
                <!-- Nilai -->
                
                </div>
              </div>
            </div>
        </div>

      </div>
      <!-- End of Main Content -->

      <!-- Button trigger modal -->

   </div>
    <!-- End of Content Wrapper -->
      
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <img src="<?php echo base_url('assets/img/out.png')?>" width="40%">
            <h3 class="modal-title" id="exampleModalLabel">Anda yakin ingin keluar?</h3>

            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <a class="btn btn-primary" href="<?php echo base_url('auth/logout') ?>">Keluar</a>
          </div>
        </div>
      </div>
    </div>