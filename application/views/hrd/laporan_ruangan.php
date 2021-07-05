<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Print Laporan Ruangan</title>
  <!-- Custom fonts for this template-->
  <link rel="shortcut icon" href="<?php echo base_url('assets/img/shortcut.png')?>" />
  <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <style type="text/css">
  	footer .pagenum:before {
      content: counter(page);
	}
	footer{
		position: fixed; 
        bottom: 0cm; 
        left: 0cm; 
        right: 0cm;
        height: 0cm;
        text-align: right;
        font-size: 9pt;
	}
	header{
		position: fixed; 
        top: -1.3cm; 
        left: 0cm; 
        right: 0cm;
        height: 0cm;
        text-align: center;
	}
  table.table-bordered > thead > tr > th{
    border:1px solid black;
    color: black;
    padding: 0.8px;
    text-align: center;
  }
  table.table-bordered > tbody > tr > td{
    border:1px solid black;
    color: black;
    padding: 0.5px 0.5px 0.5px 2px;

  }
  </style>

</head>
<body>
		<header>
      <img src="assets/img/bar.png" style="width: 120%;">
    </header>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <img src="assets/img/logo.png" style="width: 20%; left: 0.5cm; position: fixed;">
        </div>
        <div class="col-md-8" style="text-align: right;position: fixed; right: 0.5cm; font-size: 9pt;">
        <?php 
          if($bidang == 1){
           echo "004/L3/RM/UMUM.RT-UTDSMG";
          }else if($bidang == 2){
           echo "004/L3/RM/UMUM.RT-MRSMG"; 
          }else if($bidang == 3){
           echo "004/L3/RM/UMUM.RT-UPJSMG"; 
          }
        ?>          
        </div>
      </div>
    </div>
    <div class="container" style="left: 0cm; top:1.3cm; position: fixed;font-size: 9pt; color: black;">
      <span style="text-transform: uppercase; "><b>DAFTAR INVENTARIS BARANG <?php echo $bid;?> PMI KOTA SEMARANG</h5></span>
      <p>Tahun : <?php echo date("Y"); ?><br />
      Ruang : <?php echo $ruang->nama_ruang; ?> (Lt <?php echo $ruang->lantai; ?>)</p>
    </div><br />
    <div class="table-responsive" style="left: 0.5cm; top:3.2cm; right:0.5cm; position: fixed;font-size: 9pt;">
      <table class="table table-bordered" width="100%">
        <thead class="table-primary">
          <tr>
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Nomor Inventaris</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $no = 1;
          foreach ($inventaris as $iv) : 
        ?>
          <tr>
            <td style="text-align: center;"><?php echo $no++; ?></td>
            <td><?php echo $iv->nama_barang; ?></td>
            <td style="text-align: center;"><?php echo $iv->jumlah_barang; ?></td>
            <td><?php echo $iv->no_inventaris; ?></td>
            <td>Baik(<?php echo $iv->jumlah_baik; ?>) Buruk(<?php echo $iv->jumlah_buruk; ?>)</td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>

    </div>
			
		<footer>
      <div class="pagenum-container">Page <span class="pagenum"></span></div>
		</footer>
<!-- JS -->
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>