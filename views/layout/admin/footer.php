</div> <!-- .wrapper -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/simplebar.min.js"></script>
<script src='assets/js/daterangepicker.js'></script>
<script src='assets/js/jquery.stickOnScroll.js'></script>
<script src="assets/js/tinycolor-min.js"></script>
<script src="assets/js/config.js"></script>
<script src="assets/js/apps.js"></script>
<script src='assets/js/jquery.dataTables.min.js'></script>
<script src='assets/js/dataTables.bootstrap4.min.js'></script>
<script src='assets/js/select2.min.js'></script>
<!-- <script src="assets/notif_plug/sweetalert2/sweetalert2.min.js"></script>
<script src="assets/notif_plug/toastr/toastr.min.js"></script> -->
<script>
  $('#dataTable-1').DataTable({
    "responsive": true,
    "autoWidth": true,
  });

  $('#dataTable-audit').DataTable({
    "info":false,
    "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]],
  });

  $('#dataTable-provinsi').DataTable({
    "responsive": true,
    "autoWidth": true,
  });


  $('#dataTable-kota').DataTable({
    "responsive": true,
    "autoWidth": true,
  });
  $('#dataTable-kabgor').DataTable({
    "responsive": true,
    "autoWidth": true,
  });
  $('#dataTable-gorut').DataTable({
    "responsive": true,
    "autoWidth": true,
  });
  $('#dataTable-bonbol').DataTable({
    "responsive": true,
    "autoWidth": true,
  });
  $('#dataTable-boal').DataTable({
    "responsive": true,
    "autoWidth": true,
  });
  $('#dataTable-pohu').DataTable({
    "responsive": true,
    "autoWidth": true,
  });
  
  
  $('.select1').select2({
    theme: 'bootstrap4',
  });
  


  $(document).ready(function() {
    setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 2000);
  });
</script>
<script>
    $(function() {

        $('#id_pemda').change(function() {
            $('.instansi_row').remove();
            if ($('#id_pemda').val() != '-- Pilih Pemerintah Daerah --') {
                $.get('app/controllers/admin/daftar_dynoption.php', {
                        id_pemda: $('#id_pemda').val()
                    })
                    .done(function(data) {
                        $('div.pemda_row').after(data);
                    })
            }
        });

    });
</script>
</body>

</html>