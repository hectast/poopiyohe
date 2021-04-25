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

    var options = {
      series: [40, 30, 20],
      colors: ['#dc3545', '#eea303', '#3ad29f'],
      chart: {
        width: "60%",
        offsetX: 100,
        type: 'pie',
      },
      // dataLabels: {
      //   enabled: false,
      // },
      legend: {
        show: false
      },
      labels: ['Belum Validasi', 'Sudah Validasi', 'Selesai'],
      responsive: [{
        breakpoint: 1000,
        options: {
          chart: {
            width: "80%",
            offsetX: 40,
          }
        }
      }]
    };

    var chart = new ApexCharts(document.querySelector("#pdpPieChart"), options);
    chart.render();
  });
</script>
</body>

</html>