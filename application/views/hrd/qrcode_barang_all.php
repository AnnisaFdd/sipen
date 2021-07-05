<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Print All QRCode</title>
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
	}
	header{
		position: fixed; 
        top: -0.8cm; 
        left: 0cm; 
        right: 0cm;
        height: 0cm;
        text-align: center;
	}
  </style>

</head>
<body>
		<header><b>QRCode Aset Peralatan dan Perlangkapan Kantor</b></header>
		<?php foreach ($idin as $id) : ?>
			<?php 
				$x = 1;
				$imagesPerRow = 5;
				while ($x <= $id->jumlah_barang) { 
			?>
				<figure style="display: inline;">
					<img src="assets/uploads/qrcode/item-<?= $id->id_inventaris;?>.png" style="width: 120px; margin-top : 2%; margin-left: 2%; border: 2px solid #000">
				</figure>
			<?php 
					if($x % $imagesPerRow == 0){
						echo '<br />';
					}
					$x++; 
				} 
			?>
		<?php endforeach; ?>
		<footer>
            <div class="pagenum-container">Page <span class="pagenum"></span></div>
		</footer>
<!-- JS -->
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>