<!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script>

  <!-- For Table -->
  <script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="<?php echo base_url() ?>assets/js/demo/datatables-demo.js"></script>

  <!-- Datepicker -->
  <script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.min.js"></script>


  <!-- Addition -->
  <script src="<?php echo base_url() ?>assets/js/select2.min.js"></script>
  <!-- Page Script -->
  <script>
    $(function (){
      //Initialize Select2 Elements
      $('.select2').select2()

      //Date picker
      $('#datepicker').datepicker({
      autoclose: true
      })
      
      $('#datepicker2').datepicker({
      autoclose: true
      })
    })
    
    $('#datepicker').datepicker({
       format: 'yyyy-mm-dd'
    });
    $('#datepicker2').datepicker({
       format: 'yyyy-mm-dd'
    });
  </script>

</body>

</html>