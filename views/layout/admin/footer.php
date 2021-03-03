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
<script>
    $('#dataTable-1').DataTable({
        "responsive": true,
        "autoWidth": true,
    });
</script>

<script>
    <?php
    if (isset($_SESSION['msg_kirim_lamaran'])) {
    ?>
      toastr.options = {
        "closeButton": true,
        "debug": false,
        "onClick": null,
        "timeOut": 10000,
        "extendedTimeOut": 5000
      }
      toastr.success("<?= flash('msg_kirim_lamaran'); ?>");
    <?php
    }
    ?>
  </script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
</script>
</body>

</html>