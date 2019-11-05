

<!-- Jquery Core Js -->
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery/jquery.min.js"></script>


<!-- Bootstrap Core Js -->
<script src="<?= base_url() ?>assets/dashboard/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="<?= base_url() ?>assets/dashboard/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?= base_url() ?>assets/dashboard/plugins/node-waves/waves.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Morris Plugin Js -->
<script src="<?= base_url() ?>assets/dashboard/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/morrisjs/morris.js"></script>

<!-- ChartJs -->
<script src="<?= base_url() ?>assets/dashboard/plugins/chartjs/Chart.bundle.js"></script>

<!-- Flot Charts Plugin Js -->
<script src="<?= base_url() ?>assets/dashboard/plugins/flot-charts/jquery.flot.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/flot-charts/jquery.flot.resize.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/flot-charts/jquery.flot.pie.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/flot-charts/jquery.flot.categories.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/flot-charts/jquery.flot.time.js"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- Custom Js -->
<script src="<?= base_url() ?>assets/dashboard/js/admin.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/pages/index.js"></script>
<script src="<?= base_url() ?>assets/dashboard/js/pages/tables/jquery-datatable.js"></script>

<!-- Demo Js -->
<script src="<?= base_url() ?>assets/dashboard/js/demo.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <!-- Jquery DataTable Plugin Js -->
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<script>
    var alert = document.getElementById("text");
    if(alert != null){
        var text = document.getElementById("text").innerHTML
        var title = document.getElementById("title").innerHTML;
        var icon = document.getElementById("icon").innerHTML;
        swal({
            title: title,
            text: text,
            icon: icon,
            button: "OK",
            });
    }
    console.log(title);
</script>
</body>

</html>
