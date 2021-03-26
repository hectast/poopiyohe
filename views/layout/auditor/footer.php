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

<!--start kondisi -->
<script>
  $(document).ready(function() {

    $('#buttonKriteriaAdd').click(function(e) {
      e.preventDefault();
      // n++;
      $('#kriteriaArea').append('<div class="form-group mb-3" id="kriteriaGroup"> ' +
        '<div class="input-group"> ' +
        '<input class="form-control" type="text" name="input"> ' +
        '<div class="input-group-append"> ' +
        '<button type="button" class="btn btn-link buttonKriteriaRemove"><i class="fe fe-minus-circle fe-16"></i></button> ' +
        '</div> ' +
        '</div> ' +
        '</div>');
    });
    $('#kriteriaArea').on('click', '.buttonKriteriaRemove', function(e) {
      e.preventDefault();
      // const kondisiGroup = $('#kondisiGroup');
      $('#kriteriaGroup:last-child').remove();
      // $('#formArea'+(n-1)+'').remove();
      // $(this).remove();
      // console.log(n);
      // n--;
    });
    // console.log(n++);

  });
</script>
<!-- end kondisi -->
<!-- start sebab -->
<script>
  $(document).ready(function() {

    $('#buttonSebabAdd').click(function(e) {
      e.preventDefault();
      // n++;
      $('#sebabArea').append('<div class="form-group mb-3" id="sebabGroup"> ' +
        '<div class="input-group"> ' +
        '<input class="form-control" type="text" name="input"> ' +
        '<div class="input-group-append"> ' +
        '<button type="button" class="btn btn-link buttonSebabRemove"><i class="fe fe-minus-circle fe-16"></i></button> ' +
        '</div> ' +
        '</div> ' +
        '</div>');
    });
    $('#sebabArea').on('click', '.buttonSebabRemove', function(e) {
      e.preventDefault();
      // const kondisiGroup = $('#kondisiGroup');
      $('#sebabGroup:last-child').remove();
      // $('#formArea'+(n-1)+'').remove();
      // $(this).remove();
      // console.log(n);
      // n--;
    });
    // console.log(n++);

  });
</script>
<!-- end sebab -->
<!-- start sebab -->
<script>
  $(document).ready(function() {

    $('#buttonAkibatAdd').click(function(e) {
      e.preventDefault();
      // n++;
      $('#akibatArea').append('<div class="form-group mb-3" id="akibatGroup"> ' +
        '<div class="input-group"> ' +
        '<input class="form-control" type="text" name="input"> ' +
        '<div class="input-group-append"> ' +
        '<button type="button" class="btn btn-link buttonAkibatRemove"><i class="fe fe-minus-circle fe-16"></i></button> ' +
        '</div> ' +
        '</div> ' +
        '</div>');
    });
    $('#akibatArea').on('click', '.buttonAkibatRemove', function(e) {
      e.preventDefault();
      // const kondisiGroup = $('#kondisiGroup');
      $('#akibatGroup:last-child').remove();
      // $('#formArea'+(n-1)+'').remove();
      // $(this).remove();
      // console.log(n);
      // n--;
    });
    // console.log(n++);

  });
</script>
<!-- end sebab -->
<!-- start kondisi -->
<script>
  $(document).ready(function() {
    $('#kondisiCek').change(function() {
      if ($(this).is(":checked")) {
        let prepend = '<div class="input-group-prepend">' +
                      '<span class="input-group-text">Rp.</span>' +
                      '</div>';
        $('#kondisiGroup .input-group').prepend(prepend);
        $('#kondisiText').attr("type", "number");
      } else {
        $('#kondisiGroup .input-group .input-group-prepend').remove();
        $('#kondisiText').attr("type", "text");
      }
    });
  });
</script>
<!-- end kondisi -->
<!-- start sebab -->
<script>
  $(document).ready(function() {

    $('#buttonUraianAdd').click(function(e) {
      e.preventDefault();
      // n++;
      $('#uraianArea').append('<div class="form-group mb-3" id="uraianGroup"> ' +
        '<div class="input-group"> ' +
        '<input class="form-control" type="text" name="input"> ' +
        '<div class="input-group-append"> ' +
        '<button type="button" class="btn btn-link buttonUraianRemove"><i class="fe fe-minus-circle fe-16"></i></button> ' +
        '</div> ' +
        '</div> ' +
        '</div>');
    });
    $('#uraianArea').on('click', '.buttonUraianRemove', function(e) {
      e.preventDefault();
      // const kondisiGroup = $('#kondisiGroup');
      $('#uraianGroup:last-child').remove();
      // $('#formArea'+(n-1)+'').remove();
      // $(this).remove();
      // console.log(n);
      // n--;
    });
    // console.log(n++);

  });
</script>
<!-- end sebab -->
</body>

</html>