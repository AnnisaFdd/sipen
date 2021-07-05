
    <!-- <?php //var_dump($pengurus);?> -->
    <div id="content-wrapper" class="d-flex flex-column ">

      <!-- Begin Page Content -->
      <div class="container-fluid">
        <div class="alert bg-content" role="alert">
          <i class="fas fa-plus-square"></i> Edit Data Penilaian
        </div>
       
      <?php echo $this->session->flashdata('pesan');?>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="card mb-4 py-3 border-left-danger">
                <div class="card-body">
                  <h4><i class="far fa-edit"></i> <b >Form Edit Penilaian</b></h4>
                  <div class="garis" style="width: 100%; margin-bottom: 2%;"></div>
                <?php foreach ($nilai as $kr ) : ?>


                <form method="post" action="<?php echo base_url().'user/nilai/update'; ?>">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-8">
                      <input type="hidden" name="id_nilai" class="form-control" value="<?php echo $kr->id_nilai?>">
                      <input type="hidden" name="id_karyawan" class="form-control" value="<?php echo $kr->id_karyawan?>">
                      <input required="required" type="text" name="nama_karyawan"  class="form-control" value="<?php echo  $kr->nama_karyawan?>" readonly>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Kesetiaan</label>
                    <div class="col-sm-8">
                      <input required="required" type="number" name="C1"  class="form-control" value="<?php echo  $kr->C1?>">
                    </div>
                  </div>

                  <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Prestasi Kerja</label>
                    <div class="col-sm-8">
                      <input required="required" type="number" name="C2"  class="form-control" value="<?php echo  $kr->C2?>">
                    </div>
                  </div>

                  <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Tanggung Jawab</label>
                    <div class="col-sm-8">
                      <input required="required" type="number" name="C3"  class="form-control" value="<?php echo  $kr->C3?>">
                    </div>
                  </div>

                  <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Ketaatan</label>
                    <div class="col-sm-8">
                      <input required="required" type="number" name="C4"  class="form-control" value="<?php echo  $kr->C4?>">
                    </div>
                  </div>                  

                  <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Kejujuran</label>
                    <div class="col-sm-8">
                      <input required="required" type="number" name="C5"  class="form-control" value="<?php echo  $kr->C5?>">
                    </div>
                  </div>                  

                  <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Kerjasama</label>
                    <div class="col-sm-8">
                      <input required="required" type="number" name="C6"  class="form-control" value="<?php echo  $kr->C6?>">
                    </div>
                  </div>

                  <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Prakarsa</label>
                    <div class="col-sm-8">
                      <input required="required" type="number" name="C7"  class="form-control" value="<?php echo  $kr->C7?>">
                    </div>
                  </div>

                  <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Kepemimpinan</label>
                    <div class="col-sm-8">
                      <input required="required" type="number" name="C8"  class="form-control" value="<?php echo  $kr->C8?>">
                    </div>
                  </div>

                  <button type="submit" name="submit" class="btn btn-primary">Simpan</button>                 
                </form>


              <?php endforeach;?>
                
              
                </div>
              </div>
            </div>

            <!-- <div class="col-md-3"></div> -->
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