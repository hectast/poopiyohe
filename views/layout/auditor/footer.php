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
<script src="assets/js/Chart.min.js"></script>
<script src="assets/js/apexcharts.min.js"></script>
<script src="assets/js/apexcharts.custom.js"></script>
<script src="assets/js/dynamicTemuan.js"></script>
<!-- <script src="assets/notif_plug/sweetalert2/sweetalert2.min.js"></script>
<script src="assets/notif_plug/toastr/toastr.min.js"></script> -->
<script>
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