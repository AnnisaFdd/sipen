
    <!-- <?php //var_dump($pengurus);?> -->
    <div id="content-wrapper" class="d-flex flex-column ">

      <!-- Begin Page Content -->
      <div class="container-fluid">
        <div class="alert bg-content" role="alert">
          <i class="fas fa-plus-square"></i> Edit Data Pegawai 
        </div>
       
      <?php echo $this->session->flashdata('pesan');?>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="card mb-4 py-3 border-left-danger">
                <div class="card-body">
                  <h4><i class="far fa-edit"></i> <b >Form Edit Pegawai <?php echo $user['nama_subbidang']; ?></b></h4>
                  <div class="garis" style="width: 100%; margin-bottom: 2%;"></div>
                <?php foreach ($pegawai as $kr ) : ?>


                <form method="post" action="<?php echo base_url().'user/pegawai/update'; ?>">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nama Pegawai</label>
                    <div class="col-sm-8">
                      <input type="hidden" name="id_pegawai" class="form-control" value="<?php echo $kr->id_pegawai?>">
                      <input type="hidden" name="subbidang" class="form-control" value="<?php echo $kr->id_subbidang?>">
                      <input required="required" type="text" name="nama_pegawai"  class="form-control" value="<?php echo  $kr->nama_pegawai?>" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)">
                    </div>
                  </div>


                   <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                      <select name="jenis_kelamin" class="form-control select2" style="width: 100%;" required="required">
                        <option value="<?php echo $kr->jenis_kelamin;?>"><?php echo $kr->jenis_kelamin;?></option>
                        <option value="pria">Pria</option>
                        <option value="wanita">Wanita</option>
                      </select>
                      <?php echo form_error('jenis_kelamin','<div class="text-danger small ml-3">','</div>') ?>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                      <input required="required" type="text" name="alamat"  class="form-control" value="<?php echo  $kr->alamat?>">
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