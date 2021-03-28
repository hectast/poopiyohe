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

<!-- start temuan -->
<script>
  $(document).ready(function() {
    let nomor = 2;
    let nomorAppend = 2;
    $('#addTemuan').click(function(e) {
      e.preventDefault();

      const rowTemuan = `<div id="temuanGroup">
                            <h5><u>Temuan ` + (nomor) + `</u><button type="button" class="btn btn-link buttonTemuanRemove text-danger"><i class="fe fe-minus-circle fe-16"></i></button></h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>No. ST</label>
                                        <select class="form-control select1" me="nama_pemda" style="width: 100%;" disabled>
                                            <option>--Pilih No ST--</option>
                                            <option>ST/01/2021/03/23</option>
                                            <option>ST/02/2021/03/23</option>
                                            <option>ST/03/2021/03/23</option>
                                            <option>ST/04/2021/03/23</option>
                                            <option>ST/05/2021/03/23</option>
                                        </select>

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="instansi">Tgl. ST</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>No. Laporan</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="instansi">Tgl. Laporan</label>
                                        <input type="date" class="form-control">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div id="kondisiArea">
                                        <div class="form-group mb-3" id="kondisiGroup` + (nomor) + `">
                                            <label>Kondisi</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" id="kondisiText` + (nomor) + `">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <input type="checkbox" id="kondisiCek` + (nomor) + `">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kriteriaArea` + (nomor) + `">
                                        <div class="form-group mb-3">
                                            <label>Kriteria</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-link buttonKriteriaAdd` + (nomor) + `"><i class="fe fe-plus-circle fe-16"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sebabArea` + (nomor) + `">
                                        <div class="form-group mb-3">
                                            <label>Sebab</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-link buttonSebabAdd` + (nomor) + `"><i class="fe fe-plus-circle fe-16"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="akibatArea` + (nomor) + `">
                                        <div class="form-group mb-3">
                                            <label>Akibat</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-link buttonAkibatAdd` + (nomor) + `"><i class="fe fe-plus-circle fe-16"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="uraianArea` + (nomor) + `">
                                        <div class="form-group mb-3">
                                            <label>Uraian</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-link buttonUraianAdd` + (nomor) + `"><i class="fe fe-plus-circle fe-16"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>`;


      $('#temuanArea').append(rowTemuan);


      $('#kondisiCek' + (nomorAppend)).change(function(e) {
      e.preventDefault();
      if ($(this).is(":checked")) {
        let prepend = '<div class="input-group-prepend' + (nomorAppend) + '"> ' +
          '<span class="input-group-text">Rp.</span>' +
          '</div>';
        $(this).parent().parent().parent().prepend(prepend);
        $('#kondisiText').attr("type", "number");
      } else {
        $('.input-group-prepend'+ (nomorAppend)).remove();
        $('#kondisiText'+ (nomorAppend)).attr("type", "text");
      }
      // console.log($(this).parent().parent().parent().parent());
      });


      // kriteria
      $('.buttonKriteriaAdd' + (nomorAppend)).click(function(e) {
        e.preventDefault();
        $(this).parent().parent().parent().parent().append('<div class="form-group mb-3" id="kriteriaGroup' + (nomorAppend) + '"> ' +
          '<div class="input-group"> ' +
          '<input class="form-control" type="text" name="input"> ' +
          '<div class="input-group-append"> ' +
          '<button type="button" class="btn btn-link buttonKriteriaRemove' + (nomorAppend) + ' text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
          '</div> ' +
          '</div> ' +
          '</div>');
        // let kriteriaArea = $('.kriteriaArea2');
        // console.log($(this).parents("div."+ kriteriaArea));
        // console.log($(this).parent().parent().parent().parent());
        $('.buttonKriteriaRemove' + (nomorAppend)).click(function(e) {
          e.preventDefault();
          $(this).parent().parent().parent().remove();
          // console.log($(this).parent().parent().parent().parent());
          nomorAppend--;
        });
      });

      // sebab
      $('.buttonSebabAdd' + (nomorAppend)).click(function(e) {
        e.preventDefault();
        $(this).parent().parent().parent().parent().append('<div class="form-group mb-3" id="sebabGroup' + (nomorAppend) + '"> ' +
          '<div class="input-group"> ' +
          '<input class="form-control" type="text" name="input"> ' +
          '<div class="input-group-append"> ' +
          '<button type="button" class="btn btn-link buttonSebabRemove' + (nomorAppend) + ' text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
          '</div> ' +
          '</div> ' +
          '</div>');
        // let kriteriaArea = $('.kriteriaArea2');
        // console.log($(this).parents("div."+ kriteriaArea));
        // console.log($(this).parent().parent().parent().parent());
        $('.buttonSebabRemove' + (nomorAppend)).click(function(e) {
          e.preventDefault();
          $(this).parent().parent().parent().remove();
          // console.log($(this).parent().parent().parent().parent());
          nomorAppend--;
        });
      });

      // akibat
      $('.buttonAkibatAdd' + (nomorAppend)).click(function(e) {
        e.preventDefault();
        $(this).parent().parent().parent().parent().append('<div class="form-group mb-3" id="akibatGroup' + (nomorAppend) + '"> ' +
          '<div class="input-group"> ' +
          '<input class="form-control" type="text" name="input"> ' +
          '<div class="input-group-append"> ' +
          '<button type="button" class="btn btn-link buttonAkibatRemove' + (nomorAppend) + ' text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
          '</div> ' +
          '</div> ' +
          '</div>');
        // let kriteriaArea = $('.kriteriaArea2');
        // console.log($(this).parents("div."+ kriteriaArea));
        // console.log($(this).parent().parent().parent().parent());
        $('.buttonAkibatRemove' + (nomorAppend)).click(function(e) {
          e.preventDefault();
          $(this).parent().parent().parent().remove();
          // console.log($(this).parent().parent().parent().parent());
          nomorAppend--;
        });
      });

      // uraian
      $('.buttonUraianAdd' + (nomorAppend)).click(function(e) {
        e.preventDefault();
        $(this).parent().parent().parent().parent().append('<div class="form-group mb-3" id="uraianGroup' + (nomorAppend) + '"> ' +
          '<div class="input-group"> ' +
          '<input class="form-control" type="text" name="input"> ' +
          '<div class="input-group-append"> ' +
          '<button type="button" class="btn btn-link buttonUraianRemove' + (nomorAppend) + ' text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
          '</div> ' +
          '</div> ' +
          '</div>');
        // let kriteriaArea = $('.kriteriaArea2');
        // console.log($(this).parents("div."+ kriteriaArea));
        // console.log($(this).parent().parent().parent().parent());
        $('.buttonUraianRemove' + (nomorAppend)).click(function(e) {
          e.preventDefault();
          $(this).parent().parent().parent().remove();
          // console.log($(this).parent().parent().parent().parent());
          nomorAppend--;
        });
      });

      nomor++;
      nomorAppend++;
    });
    $('#temuanArea').on('click', '.buttonTemuanRemove', function(e) {
      e.preventDefault();
      // const kondisiGroup = $('#kondisiGroup');
      $('#temuanGroup:last-child').remove();
      // $('#formArea'+(n-1)+'').remove();
      // $(this).remove();
      // console.log(n);
      nomor--;
    });
    // console.log(n++);
  });
</script>
<!-- end temuan -->
<!--start kriteria -->
<script>
  $(document).ready(function() {

    $('#buttonKriteriaAdd').click(function(e) {
      e.preventDefault();
      // n++;
      $('#kriteriaArea').append('<div class="form-group mb-3" id="kriteriaGroup"> ' +
        '<div class="input-group"> ' +
        '<input class="form-control" type="text" name="input"> ' +
        '<div class="input-group-append"> ' +
        '<button type="button" class="btn btn-link buttonKriteriaRemove text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
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
<!-- end kriteria -->
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
        '<button type="button" class="btn btn-link buttonSebabRemove text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
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
        '<button type="button" class="btn btn-link buttonAkibatRemove text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
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
        '<button type="button" class="btn btn-link buttonUraianRemove text-danger"><i class="fe fe-minus-circle fe-16"></i></button> ' +
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