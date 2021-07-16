    <!-- <?php //var_dump($pengurus);?> -->
    <div id="content-wrapper" class="d-flex flex-column kecil">

      <!-- Begin Page Content -->
      <div class="container-fluid">
        <div class="alert bg-content" role="alert">
        <i class="fas fa-tachometer-alt"></i> Dashboard
      </div>

      <div class="alert alert-success" role="alert">
        <hr />
        <h4><i class="fas fa-smile-wink"></i> Selamat Datang!</h4>
        <p>Selamat Datang di <b>SISTEM PENDUKUNG KEPUTUSAN PMI KOTA SEMARANG</b>,
         Anda Login Sebagai <strong><?php echo $usernya["nama_user"]; ?></strong></p>
        <hr />
      </div>
        <!-- Content Row -->
        <div class="row">

          
          <!-- Pending Requests Card Example -->
         <!--  <div class="col-md-4 col-sm-8 mb-4 btn-zoom">
            <div class="card bg-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="h6 font-weight-bold text-light text-uppercase mb-1">Humas dan IT</div>
                    <div class="h3 mb-0 font-weight-bold text-light">5</div>
                  </div>
                  <div class="col-auto">
                    <i class="far fa-building fa-4x text-light"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div> -->

     

        <!-- Content Row -->
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <footer class="footer fixed-bottom">
        <div class="sticky-footer my-auto bg-white">
          <!-- <div class="sticky-footer bg-white"> -->
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; PMI Kota Semarang 2021</span>
          </div>
        <!-- </div> -->
        </div>
      </footer> 
      <!-- End of Footer -->
    
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