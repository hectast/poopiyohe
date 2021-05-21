</div> <!-- .wrapper -->

<script src="<?= $base_url; ?>assets/js/jquery.min.js"></script>
<script src="<?= $base_url; ?>assets/js/jquery.steps.min.js"></script>
<script src="<?= $base_url; ?>assets/js/popper.min.js"></script>
<script src="<?= $base_url; ?>assets/js/moment.min.js"></script>
<script src="<?= $base_url; ?>assets/js/bootstrap.min.js"></script>
<script src="<?= $base_url; ?>assets/js/simplebar.min.js"></script>
<script src='<?= $base_url; ?>assets/js/daterangepicker.js'></script>
<script src='<?= $base_url; ?>assets/js/jquery.stickOnScroll.js'></script>
<script src="<?= $base_url; ?>assets/js/tinycolor-min.js"></script>
<script src="<?= $base_url; ?>assets/js/config.js"></script>
<script src="<?= $base_url; ?>assets/js/apps.js"></script>
<script src='<?= $base_url; ?>assets/js/jquery.dataTables.min.js'></script>
<script src='<?= $base_url; ?>assets/js/dataTables.bootstrap4.min.js'></script>
<script src='<?= $base_url; ?>assets/js/select2.min.js'></script>

<!-- <script src="assets/notif_plug/sweetalert2/sweetalert2.min.js"></script>
<scrip src="assets/notif_plug/toastr/toastr.min.js"></script> -->
<script>
  $(function() {
    $("#wizard").steps({
      headerTag: "h2",
      bodyTag: "section",
      previous: "false",
      transitionEffect: "slideLeft"
    });
  });

  $('#dataTable-1').DataTable({
    "responsive": true,
    "autoWidth": true,
  });
  $('#dataTable-2').DataTable({
    "responsive": true,
    "autoWidth": true,
  });
  $('#dataTable-3').DataTable({
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

<script>
  $(document).ready(function() {
    function load_unseen_notification(view = '', baseUrl = 'http://localhost/poopiyohe/')
    {
      $.ajax({
        url: "<?= $base_url; ?>app/controllers/auditan/notifikasi/fetch.php",
        method: "POST",
        data: {view:view, id:<?= $_SESSION['id']; ?>, baseUrl:baseUrl},
        dataType: "json",
        success: function(data)
        {
          $('.notifContent').html(data.notification);
          if (data.unseen_notification > 0)
          {
            $('.notifCount').html(data.unseen_notification);
          }
        }
      });
    }

    load_unseen_notification();

    $(document).on('click', '.notifBtn', function(){
      $('.notifCount').html('');
        load_unseen_notification('yes');
    });

    setInterval(function(){
      load_unseen_notification();
    }, 5000);
    });
</script>
</body>

</html>