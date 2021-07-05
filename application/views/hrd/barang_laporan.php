    <!-- <?php //var_dump($pengurus);?> -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Begin Page Content -->
      <div class="container-fluid">
        <div class="alert bg-content" role="alert">
          <i class="fas fa-newspaper"></i> Laporan Aset Peralatan dan Perlengkapan Kantor
        </div>
        <?php echo $this->session->flashdata('pesan');?>
        <!-- Content Row -->
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="card mb-2 py-1 border-left-danger">
                <div class="card-body">
                  <h5><i class="fas fa-store-alt"></i> <b >Laporan Inventaris Ruangan</b></h5>
                  <div class="garis" style="width: 100%; margin-bottom: 2%;"></div>
                </div>
                <form method="post" action="<?php echo base_url('user/kantor/laporan_ruangan') ?>">
                  <div class="form-group row">
                    <div class="col-md-8 ml-3">
                      <select name="ruang" class="form-control select2" style="width: 100%;">
                        <option value="">-- Pilih Ruang --</option>
                        <?php foreach($ruang as $rg) : ?>
                        <option value="<?php echo $rg->id_ruang; ?>"><?php echo $rg->nama_ruang; ?> (Lt <?php echo $rg->lantai;?>)</option>
                        <?php endforeach; ?>
                      </select>
                      <?php echo form_error('ruang','<div class="text-danger small ml-3">','</div>') ?>
                    </div>
                    <div class="col-md-2">
                      <button type="submit" name="edit" class="btn btn-success btn-sm" size="8px" style="margin-top: 2%;"><i class="fas fa-eye"></i> Lihat</button>
                    </div>
                  </div>
                  <br />
                </form>
            </div>
          </div>
          <div class="col-md-2"></div>
        </div>

        <!-- Content Row -->
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="card mb-2 py-1 border-left-danger">
                <div class="card-body">
                  <h5><i class="fas fa-vote-yea"></i> <b >Laporan Aset Kondisi Baik</b></h5>
                  <div class="garis" style="width: 100%; margin-bottom: 2%;"></div>
                </div>
                <form method="post" action="<?php echo base_url('user/kantor/laporan_baik') ?>">
                  <div class="form-group row">
                    <div class="col-md-8 ml-3">
                      <div class="input-group date">
                        <input type="text" placeholder="Masukkan tanggal akhir semester" class="form-control pull-right" id="datepicker" name="tgl_baik">
                     </div>
                    </div>
                    <div class="col-md-2">
                      <button type="submit" name="edit" class="btn btn-success btn-sm" size="8px" style="margin-top: 2%;"><i class="fas fa-eye"></i> Lihat</button>
                    </div>
                  </div>
                  <br />
                </form>
            </div>
          </div>
          <div class="col-md-2"></div>
        </div>

        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="card mb-2 py-1 border-left-danger">
                <div class="card-body">
                  <h5><i class="fas fa-exclamation-triangle"></i> <b >Laporan Aset Kondisi Buruk</b></h5>
                  <div class="garis" style="width: 100%; margin-bottom: 2%;"></div>
                </div>
                <form method="post" action="<?php echo base_url('user/kantor/laporan_buruk') ?>">
                  <div class="form-group row">
                    <div class="col-md-8 ml-3">
                      <div class="input-group date">
                        <input type="text" placeholder="Masukkan tanggal akhir semester" class="form-control pull-right" id="datepicker2" name="tgl_buruk">
                     </div>
                    </div>
                    <div class="col-md-2">
                      <button type="submit" name="edit" class="btn btn-success btn-sm" size="8px" style="margin-top: 2%;"><i class="fas fa-eye"></i> Lihat</button>
                    </div>
                  </div>
                  <br />
                </form>
            </div>
          </div>
          <div class="col-md-2"></div>
        </div>

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->
      
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


    <!-- Modal -->
    <div class="modal fade" id="profilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

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