<!-- jQuery -->
<script src="<?= base_url('assets/admin/'); ?>vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('assets/admin/'); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/admin/'); ?>vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?= base_url('assets/admin/'); ?>vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?= base_url('assets/admin/'); ?>vendors/Chart.js/dist/Chart.min.js"></script>
<!-- jQuery Sparklines -->
<script src="<?= base_url('assets/admin/'); ?>vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- Flot -->
<script src="<?= base_url('assets/admin/'); ?>vendors/Flot/jquery.flot.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/Flot/jquery.flot.time.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?= base_url('assets/admin/'); ?>vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?= base_url('assets/admin/'); ?>vendors/DateJS/build/date.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?= base_url('assets/admin/'); ?>vendors/moment/min/moment.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/validator/multifield.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/validator/validator.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?= base_url('assets/admin/'); ?>build/js/custom.min.js"></script>

<!-- Datatables -->
<script src="<?= base_url('assets/admin/'); ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/jszip/dist/jszip.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>vendors/pdfmake/build/vfs_fonts.js"></script>

<!--  -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?= base_url("assets/js/axios/dist/axios.min.js") ?>"></script>
<!-- include summernote css/js -->
<script src="https://cdn.jsdelivr.net/npm/bs4-summernote@0.8.10/dist/summernote-bs4.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlLww7KS4MQk5IiMmLbBUzbw5ddio12w4&callback=initialize"></script>
<?php if (!empty($this->session->flashdata("success"))) : ?>
    <script>
        swal({
            title: "Good job!",
            text: "<?= $this->session->flashdata("success") ?>",
            icon: "success",
            button: "ok",
        });
    </script>
<?php endif ?>
<?php if (!empty($this->session->flashdata("error"))) : ?>
    <script>
        swal({
            title: "Oops!",
            text: "<?= $this->session->flashdata("error") ?>",
            icon: "error",
            button: "ok",
        });
    </script>
<?php endif ?>

<script>
    // initialize a validator instance from the "FormValidator" constructor.
    // A "<form>" element is optionally passed as an argument, but is not a must
    var validator = new FormValidator({
        "events": ['blur', 'input', 'change']
    }, document.forms[0]);
    // on form "submit" event
    document.forms[0].onsubmit = function(e) {
        var submit = true,
            validatorResult = validator.checkAll(this);
        console.log(validatorResult);
        return !!validatorResult.valid;
    };
    // on form "reset" event
    document.forms[0].onreset = function(e) {
        validator.reset();
    };
    // stuff related ONLY for this demo page:
    $('.toggleValidationTooltips').change(function() {
        validator.settings.alerts = !this.checked;
        if (this.checked)
            $('form .alert').remove();
    }).prop('checked', false);
</script>

<script>
    $(".btn-edit").click(function() {
        const item = $(this).data("unit");
        if (item != undefined) {
            item.split(",").forEach(function(value) {
                $("[name='" + value.split(":")[0] + "']").val(value.split(":")[1]);
            });
            $("[name='password']").val("");
        }
    });
    $(".delete").click(function() {
        var id = $(this).data("id");
        swal({
                title: "Yakin?",
                text: "data akan di hapus",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "<?= base_url("p/deleteUserDesa/") ?>" + id
                }
            });
    });
    $(".validasi").click(function() {
        var id = $(this).data("id");
        swal({
                title: "Yakin?",
                text: "data akan di validasi",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "<?= base_url("p/validasi_masyarakat/") ?>" + id
                }
            });
    });
    $(".delete").click(function() {
        var id = $(this).data("id");
        swal({
                title: "Yakin?",
                text: "data akan di hapus",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "<?= base_url("p/delete_user_masyarakat/") ?>" + id
                }
            });
    });
</script>