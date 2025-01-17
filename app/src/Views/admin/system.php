<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <?php include_once VIEW_DIR . "inc/customs.php"; ?>
</head> <!--end::Head--> <!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <?php include_once VIEW_DIR . "admin/header.php"; ?>
        <!--end::Header-->

        <?php include_once VIEW_DIR . "admin/sidebar.php"; ?>
        <!--end::Sidebar-->

        <!--begin::App Main-->
        <main class="app-main">
            <!--begin::App Content Header-->
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0"><?php echo $data["title"]; ?></h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php echo $data["title"]; ?>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content Header-->

            <!--begin::App Content-->
            <div class="app-content">
                <!--begin::Container-->
                <div class="container-fluid">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="card-title">Records Form</h5>
                        </div>
                        <form class="card-body">
                            <!-- ... -->
                             <div class="mb-3">
                                <label for="file" class="form-label">Files upload</label>
                                <input type="file" name="file_upload" id="file" class="form-control" multiple>
                             </div>
                             <input type="submit" value="Submit" class="btn btn-primary w-100">
                        </form>
                    </div>
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content-->
        </main>
        <!--end::App Main-->

        <?php include_once VIEW_DIR . "admin/footer.php"; ?>
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->

    <?php include_once VIEW_DIR . "inc/plugins.php"; ?>
    <script type="text/javascript">
        // 
    </script>
    <!--end::Script-->
</body>
<!--end::Body-->

</html>