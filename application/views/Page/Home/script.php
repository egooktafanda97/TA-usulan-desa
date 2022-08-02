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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    const ctxReq = async (response) => {
        const getter = await axios.get("<?= base_url("Admin/Counting") ?>").catch(() => {
            console.log("ok");
        });
        if (getter?.status ?? 400 == 200) {
            response(getter.data);
        }
    }
    ctxReq((data) => {
        let lab = Object.keys(data);
        const config = {
            type: 'line',
            data: {
                labels: lab,
                datasets: [{
                    label: 'Prioritas yang diajukan',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: Object.values(data),
                }]
            },
            options: {
                scales: {
                    y: {
                        min: 0,
                        ticks: {
                            stepSize: 0.5,
                            precision: 0
                        }
                    }
                }
            },
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    });
</script>