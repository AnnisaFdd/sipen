    <!-- <?php //var_dump($pengurus);?> -->
    <div id="content-wrapper" class="d-flex flex-column ">

      <!-- Begin Page Content -->
      <div class="container-fluid">
        <div class="alert bg-content" role="alert">
          <i class="fas fa-plus-square"></i> Tambah Data Pegawai
        </div>
        <?php echo $this->session->flashdata('pesan');?>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <div class="card mb-4 py-3 border-left-danger">
                <div class="card-body">
                  <h4><i class="far fa-edit"></i> <b >Form Tambah Data Pegawai <?php echo $user['nama_subbidang']; ?></b></h4>
                  <div class="garis" style="width: 100%; margin-bottom: 2%;"></div>

                <form method="post" action="<?php echo site_url('user/pegawai/tambah_aksi') ?>">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nama Pegawai</label>
                    <div class="col-sm-8">
                      <input required="required" type="text" name="nama_pegawai" class="form-control" placeholder="Masukkan Nama Pegawai" required="required" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                      <select name="jenis_kelamin" class="form-control select2" style="width: 100%;" required="required">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="pria">Pria</option>
                        <option value="wanita">Wanita</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                      <input required="required" type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat Pegawai" required="required">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Subbidang</label>
                    <div class="col-sm-8">
                      <select name="subbidang" class="form-control select2" style="width: 100%;" required="required">
                        <option value="">-- Pilih Subbidang --</option>
                        <?php foreach($pegawai as $bg) : ?>
                        <option value="<?php echo $bg->id_subbidang; ?>"><?php echo $bg->nama_subbidang; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <?php echo form_error('subbidang','<div class="text-danger small ml-3">','</div>') ?>
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