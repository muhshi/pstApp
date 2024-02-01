<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->renderSection('title') ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="/asset/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('asset/dataTable/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('asset/dataTable/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('asset/dataTable/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">

</head>

<body class="app sidebar-mini rtl">
    <!-- Sidebar Menu -->
    <?= $this->include('layout/navbar') ?>
    <!-- /.sidebar-menu -->
    <main class="app-content">
        <?= $this->renderSection('content') ?>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="/asset/js/jquery-3.2.1.min.js"></script>
    <script src="/asset/js/popper.min.js"></script>
    <script src="/asset/js/bootstrap.min.js"></script>
    <script src="/asset/js/main.js"></script>


    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('asset/dataTable/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('asset/dataTable/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('asset/dataTable/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?= base_url('asset/dataTable/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('asset/dataTable/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?= base_url('asset/dataTable/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('asset/dataTable/jszip/jszip.min.js'); ?>"></script>
    <script src="<?= base_url('asset/dataTable/pdfmake/pdfmake.min.js'); ?>"></script>
    <script src="<?= base_url('asset/dataTable/pdfmake/vfs_fonts.js'); ?>"></script>
    <script src="<?= base_url('asset/dataTable/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?= base_url('asset/dataTable/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
    <script src="<?= base_url('asset/dataTable/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>

    <!-- Date-Picker -->
    <script type="text/javascript" src="<?= base_url('asset/js/plugins/bootstrap-datepicker.min.js'); ?>"></script>
    <script type="text/javascript">
        $('#inputDate').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true
        });
    </script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "excel", "pdf", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $("#example2").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf"]
            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
            $('#table2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <!-- The javascript plugin to display page loading on top-->
    <script src="/asset/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->

</body>

</html>