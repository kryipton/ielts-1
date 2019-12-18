<!-- SCRIPTS -->
<!-- JQuery -->
<script src="<?php echo base_url("public/admin/")?>js/papaparse.min.js"></script>

<script src="<?php echo base_url("public/admin/mdbootstrap/")?>js/jquery-3.4.1.min.js"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?php echo base_url("public/admin/mdbootstrap/")?>js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?php echo base_url("public/admin/mdbootstrap/")?>js/bootstrap.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?php echo base_url("public/admin/mdbootstrap/")?>js/mdb.js"></script>

<script src="<?php echo base_url("public/admin/")?>js/iziToast.min.js"></script>


<!--alert ve dropzone ucn lazim olan scriptler-->
<script src="<?php echo base_url("public/admin/")?>js/sweetalert.min.js"></script>
<script src="<?php echo base_url("public/admin/")?>js/dropzone.js"></script>
<!--alert ve dropzone ucn lazim olan scriptler-->



<!--=============================data table ucun lazim olan scritpler bunlarin ardicilliqi bele olmalidi eks halda islemez ========================================-->
<script src="<?php echo base_url("public/admin/")?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url("public/admin/")?>js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url("public/admin/")?>js/dataTables.editor.min.js"></script>
<script src="<?php echo base_url("public/admin/")?>js/dataTables.select.min.js"></script>
<script src="<?php echo base_url("public/admin/")?>js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url("public/admin/")?>js/jszip.min.js"></script>
<script src="<?php echo base_url("public/admin/")?>js/pdfmake.min.js"></script>
<script src="<?php echo base_url("public/admin/")?>js/vfs_fonts.js"></script>
<script src="<?php echo base_url("public/admin/")?>js/buttons.html5.min.js"></script>
<script src="<?php echo base_url("public/admin/")?>js/buttons.print.min.js"></script>
<script src="<?php echo base_url("public/admin/")?>js/buttons.flash.min.js"></script>




<!--=============================data table ucun lazim olan scritpler bunlarin ardicilliqi bele olmalidi eks halda islemez ========================================-->





<script src="<?php echo base_url("public/admin/")?>js/custom.js"></script>


<!-- Initializations -->
<script>
    // SideNav Initialization
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
        wheelSpeed: 2,
        wheelPropagation: true,
        minScrollbarLength: 20
    });

    // Data Picker Initialization
    $('.datepicker').pickadate();

    // Material Select Initialization
    $(document).ready(function () {
        $('.mdb-select').material_select();
    });

    // Tooltips Initialization
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>

</body>

</html>
