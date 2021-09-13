<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Pendukung Keputusan</title>

  <style>
    body {
            background: #F6703A;
            line-height: 32px;
            word-wrap:break-word !important;
            font-family: 'Open Sans', sans-serif;
            }

          .tabs {
              width: 100%;
              float: none;
              list-style: none;
              padding: 0;
              margin: 0 auto;
          }
          .tabs li {
              display: block;
          }
          .labels:after {
              content: '';
              display: table;
              clear: both;
          }
          .tabs label {
              display: inline-block;
              float: left;
              padding: 10px 20px;
              color: #FFFFFF;
              font-size: 18px;
              font-weight: normal;
              background: #e20a16;
              cursor: pointer;
          }
          .tabs label:hover {
              background: #000;
          }
          .tab-content {
              display: none;
              width: 100%;
              padding: 15px;
              border:1px solid #ccc;
              background-color:#ffffff;
          }
          .tabs input[type=radio] {
              display:none;
          }
          [id^=tab]:checked ~ div[id^=tab-content] {
              display: block;
          }
          [id^=tab]:checked ~ [id^=label]  {
              background: #08C;
              color: white;
          }
  </style>

  <!-- Custom fonts for this template-->
   <link rel="shortcut icon" href="<?php echo base_url('assets/img/shortcut.png')?>" />
  <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/select2.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/select2.min.css" rel="stylesheet">

  <!-- DataTables -->
  <link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- DatePicker -->
  <link href="<?php echo base_url() ?>assets/css/bootstrap-datepicker.min.css" rel="stylesheet">


</head>