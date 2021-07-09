
    <!-- <?php //var_dump($pengurus);?> -->
    <div id="content-wrapper" class="d-flex flex-column ">

      <!-- Begin Page Content -->
      <div class="container-fluid">
        <div class="alert bg-content" role="alert">
          <i class="fas fa-plus-square"></i> Edit Data Kriteria
        </div>
       
      <?php echo $this->session->flashdata('pesan');?>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="card mb-4 py-3 border-left-danger">
                <div class="card-body">
                  <h4><i class="far fa-edit"></i> <b >Form Edit Kriteria</b></h4>
                  <div class="garis" style="width: 100%; margin-bottom: 2%;"></div>
                <?php foreach ($kriteria as $kr ) : ?>


                <form method="post" action="<?php echo base_url().'hrd/kriteria/update'; ?>">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Kriteria</label>
                    <div class="col-sm-8">
                      <input type="hidden" name="id_kriteria" class="form-control" value="<?php echo $kr->id_kriteria?>">
                      <input required="required" type="text" name="nama_kriteria"  class="form-control" value="<?php echo  $kr->nama_kriteria?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Bobot</label>
                    <div class="col-sm-8">
                      <input required="required" type="number" name="bobot"  class="form-control" value="<?php echo  $kr->bobot?>" step="0.001">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Keterangan</label>
                    <div class="col-sm-8">
                      <select name="keterangan" class="form-control select2" style="width: 100%;" required="required">
                        <option value="<?php echo $kr->keterangan;?>"><?php echo $kr->keterangan;?></option>
                      </select>
                      <?php echo form_error('keterangan','<div class="text-danger small ml-3">','</div>') ?>
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