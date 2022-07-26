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

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
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
    $('table').dataTable({
        columnDefs: [{
            orderable: false,
            className: 'select-checkbox',
            targets: 0
        }],
        select: {
            style: 'os',
            selector: 'td:first-child'
        },
        order: [
            [1, 'asc']
        ],
        searching: false,
        paging: false,
        info: false
    });


    // //////////////////////
    $("#check-all").click(function() {
        $('.checks').not(this).prop('checked', this.checked);
    });
    $(".btn-send-kec").click(function() {
        swal({
            title: "Yakin?",
            text: "Usulan Diterima?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var checks = [];
                $(".checks").each(function() {
                    if ($(this).is(":checked")) {
                        var data = $(this).data("id");
                        checks.push(data);
                    }
                });
                const form_data = new FormData();
                form_data.append("usulanId", JSON.stringify(checks));
                const push = async (form_data) => {
                    const response = await axios.post(`<?= base_url("Usulan/sendBapeda/") ?>`, form_data);
                    if (response?.status ?? 400 == 200) {
                        swal({
                            title: "Success!",
                            text: "Usulan Berhasil Diterima",
                            icon: "success",
                            button: "ok",
                        }).then((willDelete) => {
                            if (willDelete) {
                                window.location.reload();
                            }
                        });
                    }
                }
                push(form_data);
            }
        });
    });
    $(function() {
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200
            });
        });
    });
    // documet clik 
    $(document).on("click", ".edits", function(e) {
        var ID = $(this).data("id");
        const getUsulanByID = async (ID) => {
            const response = await axios.get(`<?= base_url("Usulan/getUsulanDesaByID/") ?>${ID}`);
            if (response?.status ?? 400 == 200) {
                $("[name='prioritas']").val(response.data.prioritas);
                $("[name='volume']").val(response.data.volume);
                $("[name='lokasi']").val(response.data.lokasi);
                $("[name='permasalahan']").summernote("code", response.data.permasalahan);
                $("[name='arah_kebijakan']").summernote("code", response.data.arah_kebijakan);
                $("[name='kamus_usulan']").summernote("code", response.data.kamus_usulan);
                $("[name='id_usulan']").val(response.data.id_usulan)
            }
        }
        getUsulanByID(ID);
    });
    $("#form-send").submit(function(event) {
        event.preventDefault();
        var checks = [];
        $(".checks").each(function() {
            if ($(this).is(":checked")) {
                var data = $(this).data("id");
                checks.push(data);
            }
        });
        const form_data = new FormData();
        form_data.append("tahun_usulan", $("[name='tahun_usulan']").val());
        form_data.append("usulanId", JSON.stringify(checks));
        const push = async (form_data) => {
            const response = await axios.post(`<?= base_url("Usulan/sendKec/") ?>`, form_data);
            if (response?.status ?? 400 == 200) {
                swal({
                    title: "Good job!",
                    text: "Data berhasil dikirim ke Kecamatan",
                    icon: "success",
                    button: "ok",
                }).then((willDelete) => {
                    if (willDelete) {
                        window.location.reload();
                    }
                });
            }
        }
        push(form_data);
    });
    $(document).on("click", ".tolak", function(e) {
        var id = $(this).data("id");
        swal({
                title: "Yakin?",
                text: "Usulan Ini Dibatalkan",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "<?= base_url("Usulan/tolak_usulan_desa_byKec/") ?>" + id
                }
            });
    });
    $(document).on("click", ".batal_kirim", function(e) {
        var id = $(this).data("id");
        swal({
                title: "Yakin?",
                text: "Usulan Ini Dibatalkan",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "<?= base_url("Usulan/batalKirimUsulanDesa/") ?>" + id
                }
            });
    });
    $(document).on("click", ".hapusbykecamatan", function(e) {
        var id = $(this).data("id");
        swal({
                title: "Yakin?",
                text: "Usulan Ini Akan Dihapus",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "<?= base_url("Usulan/hapusbykecamatan/") ?>" + id
                }
            });
    });

    $(document).ready(function() {
        var vars = [],
            hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for (var i = 0; i < hashes.length; i++) {
            hash = hashes[i].split('=');
            // vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        for (const item in vars) {
            $("[name='" + item + "']").val(vars[item]);
        }

    });
    $(".cetak").click(function() {
        var vars = [],
            hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for (var i = 0; i < hashes.length; i++) {
            hash = hashes[i].split('=');
            // vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        var resultset = ``;
        if (hashes.length > 1) {
            for (const item in vars) {
                resultset += `${item}=${vars[item]}&`;
            }
            window.open('<?= base_url('Usulan/cetak_usulan_bykecamatan?') ?>' + resultset, '_blank');
        } else {
            window.open('<?= base_url('Usulan/cetak_usulan_bykecamatan?') ?>', '_blank');
        }
    });
</script>