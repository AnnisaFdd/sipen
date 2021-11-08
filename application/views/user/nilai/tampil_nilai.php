    <!-- <?php //var_dump($pengurus);?> -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Begin Page Content -->
      <div class="container-fluid">
        <div class="alert bg-content" role="alert">
          <i class="fas fa-cogs"></i> Kelola Data Penilaian
        </div>
        <?php echo $this->session->flashdata('pesan');?>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
              <div class="card mb-4 py-3 border-left-danger">
                <div class="card-body">
                  <h4><i class="far fa-edit"></i> <b >Kelola Data Nilai <?php echo $user['nama_subbidang']; ?> </b></h4>
                  <div class="garis" style="width: 100%; margin-bottom: 2%;"></div>
                </div>

                <div class="row">
                  <!-- Begin Page Content -->
                  <div class="container-fluid">
                    <div class="card shadow mb-4">
                      <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-primary"></h4>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0.5">
                            <thead>
                              <tr style="font-size: 12px; text-align: center;">
                                <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>Kesetiaan</th>
                                <th>Prestasi Kerja</th>
                                <th>Tanggung Jawab</th>
                                <th>Ketaatan</th>
                                <th>Kejujuran</th>
                                <th>Kerjasama</th>
                                <th>Prakarsa</th>
                                <th>Kepimpinan</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $no=1;
                                foreach ($nilai as $sts) :
                              ?> 
                              <tr style="font-size: 12px; text-align:center;">
                                <td><?php echo $no++; ?></td>
                                <td style="text-align: left"><?php echo $sts->nama_pegawai; ?></td>
                                <td><?php echo $sts->C1; ?></td>
                                <td><?php echo $sts->C2; ?></td>
                                <td><?php echo $sts->C3; ?></td>
                                <td><?php echo $sts->C4; ?></td>
                                <td><?php echo $sts->C5; ?></td>
                                <td><?php echo $sts->C6; ?></td>
                                <td><?php echo $sts->C7; ?></td>
                                <td><?php echo $sts->C8; ?></td>
                                <td class="center">
                                  <?php echo anchor('user/nilai/edit/'.$sts->id_nilai, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>'); ?>
                                  <?php $onclick = array('onclick'=>"return confirm('Anda yakin untuk menghapus data?')");?>
                                  <?php echo anchor('user/nilai/hapus/'.$sts->id_nilai, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>',$onclick); ?>
                                </td>
                              </tr> 
                            <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
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