    <!-- <?php //var_dump($pengurus);?> -->
    <div id="content-wrapper" class="d-flex flex-column ">

      <!-- Begin Page Content -->
      <div class="container-fluid">
        <div class="alert bg-content" role="alert">
          <i class="fas fa-plus-square"></i> Tambah Data Penilaian
        </div>
        <?php echo $this->session->flashdata('pesan');?>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="card mb-4 py-3 border-left-danger">
                <div class="card-body">
                  <h4><i class="far fa-edit"></i> <b >Form Tambah Data Penilaian <?php echo $user['nama_subbidang']; ?></b></h4>
                  <div class="garis" style="width: 100%; margin-bottom: 2%;"></div>

                <form method="post" action="<?php echo site_url('user/nilai/tambah_aksi') ?>">
                   <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nama Pegawai</label>
                    <div class="col-sm-8">
                      <select name="nama" class="form-control select2" style="width: 100%;" required="required">
                        <option value="">-- Pilih Pegawai --</option>
                        <?php foreach($pegawai as $bg) : ?>
                        <option value="<?php echo $bg->id_pegawai; ?>"><?php echo $bg->nama_pegawai; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <?php echo form_error('nama','<div class="text-danger small ml-3">','</div>') ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nilai Kesetiaan</label>
                    <div class="col-sm-8">
                      <input required="required" type="number" name="c1" min="0" max="100" class="form-control"  placeholder="Masukkan Nilai dari 0 - 100" required="required">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nilai Prestasi Kerja</label>
                    <div class="col-sm-8">
                      <input required="required" type="number" name="c2" min="0" max="100" class="form-control" placeholder="Masukkan Nilai dari 0 - 100" required="required">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nilai Tanggung Jawab</label>
                    <div class="col-sm-8">
                      <input required="required" type="number" name="c3" min="0" max="100" class="form-control" placeholder="Masukkan Nilai dari 0 - 100" required="required">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nilai Ketaatan</label>
                    <div class="col-sm-8">
                      <input required="required" type="number" name="c4" min="0" max="100" class="form-control" placeholder="Masukkan Nilai dari 0 - 100" required="required">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nilai Kejujuran</label>
                    <div class="col-sm-8">
                      <input required="required" type="number" name="c5" min="0" max="100" class="form-control" placeholder="Masukkan Nilai dari 0 - 100" required="required">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nilai Kerja Sama</label>
                    <div class="col-sm-8">
                      <input required="required" type="number" name="c6" min="0" max="100" class="form-control" placeholder="Masukkan Nilai dari 0 - 100" required="required">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nilai Prakarsa</label>
                    <div class="col-sm-8">
                      <input required="required" type="number" name="c7" min="0" max="100" class="form-control" placeholder="Masukkan Nilai dari 0 - 100" required="required">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nilai Kepemimpinan</label>
                    <div class="col-sm-8">
                      <input required="required" type="number" name="c8" min="0" max="100" class="form-control" placeholder="Masukkan Nilai dari 0 - 100" required="required">
                    </div>
                  </div>

                 
                  <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </form>
                </div>
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