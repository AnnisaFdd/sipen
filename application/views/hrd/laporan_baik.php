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
    padding: 0.5px 0.5px 0.5px 0.5px;
    text-align: center;

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
        </div>
      </div>
    </div>
    <div class="container-fluid" style="left: 0cm; top:1.3cm; position: fixed;font-size: 9pt; color: black;">
      <center>
        <span style="text-transform: uppercase;"><b><?php echo $bid;?></b><br />
          <b>PALANG MERAH INDONESIA</b><br />
          <b>KOTA SEMARANG</b><br />
          <b>DAFTAR ASET TETAP</b><br />
          <b><?php echo $kategori;?></b><br />
          <?php 
            $semester = date("m",strtotime($tgl));
            $tahun = date("Y",strtotime($tgl));
            echo "<b>";
            if ($semester>6){
              echo "JULI S.D. DESEMBER ".$tahun;
            }else{
              echo "JANUARI S.D. JUNI ".$tahun;
            }
            echo "</b><br />";

          ?>
        </span>
    </center>
    </div><br />
    <div class="table-responsive" style="left: 0.2cm; top:4.5cm; right:0.2cm; position: fixed;font-size: 7.5pt;">
      <table class="table table-bordered" width="100%">
        <thead class="table-primary">
          <tr>
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Merk</th>
            <th>Type</th>
            <th>Tahun Perolehan</th>
            <th>Jumlah Barang</th>
            <th>Harga Satuan</th>
            <th>Nilai Perolehan</th>
            <th>Kondisi</th>
            <th>Sumber</th>
            <th>Status Kepemilikan</th>
            <th>Keterangan</th>
          </tr>
          <tr>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
            <th>10</th>
            <th>11</th>
            <th>12</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $no = 1;
          foreach ($inventari as $iv) : 
        ?>
          <tr>
            <td><?php echo $no++;?></td>
            <td style="text-align: left;"><?php echo $iv->nama_barang;?></td>
            <td><?php echo $iv->merk;?></td>
            <td><?php echo $iv->type;?></td>
            <td><?php echo $iv->tahun_perolehan;?></td>
            <?php 
              $jumlah=0;
              foreach ($ruang as $rg) :
               if($rg->id_barang == $iv->id_barang){
                $jumlah=$jumlah+($rg->jumlah_baik);
              }
            ?>
            <?php endforeach; ?>
            <td><?php echo $jumlah;?></td>
            <td><?php echo $iv->harga_satuan;?></td>
            <?php 
              $harga = $iv->harga_satuan;
              $total = $jumlah * $harga;
            ?>
            <td><?php echo $total;?></td>
            <td>Baik</td>
            <td><?php echo $iv->nama_sumber;?></td>
            <td><?php echo $iv->nama_status;?></td>
            <td style="text-align: left;">
            <?php foreach ($ruang as $rg) : ?>
            <?php
              if($rg->id_barang == $iv->id_barang){
                echo $rg->nama_ruang.' Lt '.$rg->lantai.' ('.$rg->jumlah_baik.')<br/>';
            }
            ?>
            <?php endforeach; ?>
            </td>
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