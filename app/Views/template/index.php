<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $judul; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/datepicker/datepicker.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/datatables/dataTables.bootstrap4.css">

    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/custom.css">

    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/favicon.ico" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <?= $this->include('template/navbar') ?>
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <?= $this->include('template/sidebar') ?>
            <!-- partial -->

            <div class="main-panel">
                <?= $this->renderSection('page-content') ?>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="container-fluid clearfix">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Aslab Informatika <?= date('Y') ?></span>

                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url() ?>/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?= base_url() ?>/assets/vendors/datepicker/datepicker.min.js"></script>

    <!-- dataTables -->
    <script src="<?= base_url() ?>/assets/vendors/datatables/jquery.dataTables.js"></script>
    <script src="<?= base_url() ?>/assets/vendors/datatables/dataTables.bootstrap4.js"></script>



    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url() ?>/assets/js/off-canvas.js"></script>
    <script src="<?= base_url() ?>/assets/js/hoverable-collapse.js"></script>
    <script src="<?= base_url() ?>/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?= base_url() ?>/assets/js/formpicker.js"></script>
    <script src="<?= base_url() ?>/assets/js/file-upload.js"></script>
    <script src="<?= base_url() ?>/assets/vendors/datatables/data-table.js"></script>
    <script src="<?= base_url() ?>/assets/js/modal-demo.js"></script>



    <!-- End custom js for this page -->
</body>

</html>