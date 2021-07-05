    <!-- <?php //var_dump($pengurus);?> -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Begin Page Content -->
      <div class="container-fluid">
        <div class="alert bg-content" role="alert">
          <i class="fas fa-cogs"></i> Kelola Aset Peralatan dan Perlengkapan Kantor
        </div>
        <?php echo $this->session->flashdata('pesan');?>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-3">
              <div class="card mb-4 py-3 border-bottom-danger">
                <div class="card-body">
                  <b>Menu</b>
                  <div class="garis"></div>
                  <div class="menu">
                    <div class="menu-active">
                      <?php echo anchor('user/kantor','<i class="fas fa-clipboard"></i> &nbsp;Kelola Barang'); ?>
                    </div>
                    <div class="menu-active" style="background: #ff968c;" style="font-size: 12pt;">
                      <i class="fas fa-list-alt"></i> &nbsp;Kelola Inventaris</div>
                      <form method="post" action="<?php echo base_url('user/kantor/inventaris') ?>">
                        <select name="nama" class="form-control select2" style="width: 100%;">
                          <option value="">-- Pilih Nama Barang --</option>
                          <?php foreach($barang as $bg) : ?>
                          <option value="<?php echo $bg->id_barang; ?>"><?php echo $bg->nama_barang; ?> (<?php echo $bg->tahun_perolehan;?>)</option>
                          <?php endforeach; ?>
                        </select>
                        <br />
                        <button type="submit" name="edit" class="btn btn-success" size="8px" style="margin-top: 2%;"><i class="fas fa-search"></i> Cari</button>
                      </form> 
                </div>
                </div>
              </div>
              <?php echo anchor('user/kantor/print_qrcode','<div class="btn btn-info btn-md"><i class="fas fa-print"></i> &nbsp;Print All QRcode</div>'); ?>
            </div>
            <div class="col-md-9 kecil">
              <div class="card mb-4 py-3 border-left-danger">
                <div class="card-body">
                  <h4><i class="far fa-edit"></i> <b >Kelola Inventaris </b></h4>
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
                                <!-- <th>No</th> -->
                                <th>Nama Barang</th>
                                <th>Inventaris</th>
                                <!-- <th>Merk</th> -->
                                <!-- <th>Type</th> -->
                                <th>Total</th>
                                <th>Baik</th>
                                <th>Buruk</th>
                                <th>Ruang</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php  
                                // $no=1;
                                foreach ($inventaris as $iv) :
                              ?>
                              <tr style="font-size: 12px;">
                                <!-- <td><?php echo $no++; ?></td> -->
                                <td><?php echo $iv->nama_barang; ?>
                                </td>
                                <td><?php echo $iv->no_inventaris; ?>
                                </td>
                                <!-- <td><?php echo $iv->merk; ?></td> -->
                                <!-- <td><?php echo $iv->type; ?></td> -->
                                <td><?php echo $iv->jumlah_barang; ?></td>
                                <td><?php echo $iv->jumlah_baik; ?></td>
                                <td><?php echo $iv->jumlah_buruk; ?></td>
                                <td><?php echo $iv->nama_ruang; ?> (Lt <?php echo $iv->lantai; ?>)</td>
                                <td><?php echo anchor('user/kantor/barang_inventaris_edit/'.$iv->id_inventaris, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>'); ?>
                                  <?php echo anchor('user/kantor/qrcode/'.$iv->id_inventaris, '<div class="btn btn-warning btn-sm"><i class="fas fa-qrcode"></i></div>'); ?>
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