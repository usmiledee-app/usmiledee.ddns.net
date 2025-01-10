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
                            <h3 class="mb-0">Small Box</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Small Box
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
                    <div id="canvas"></div>
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
    <script type="text/javascript" src="https://unpkg.com/qr-code-styling@1.5.0/lib/qr-code-styling.js"></script>
    <script type="text/javascript">
        const qrCode = new QRCodeStyling({
            width: 1080,
            height: 1080,
            type: "svg",
            data: "https://usmiledee.app/home/gallery/a87ff679a2f3e71d9181a67b7542122c",
            image: "/assets/dist/img/brand-logo-xs.png",
            dotsOptions: {
                // color: "#4267b2",
                color: "#212529",
                // type: "extra-rounded",
                type: "rounded",
            },
            backgroundOptions: {
                color: "#f8f9fa",
            },
            imageOptions: {
                crossOrigin: "anonymous",
                margin: 20
            }
        });

        qrCode.append(document.getElementById("canvas"));
        // qrCode.download({
        //     name: "ABC Playground Nursery 2024 - 2025 (Teacher)",
        //     extension: "png"
        // });
    </script>
    <!--end::Script-->
</body>
<!--end::Body-->

</html>