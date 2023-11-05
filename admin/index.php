<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../assets/image/favicon.png" type="image/x-icon">
    <!-- FAVICON -->
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <link rel="stylesheet" href="../assets/css/header-style.css">
    <link rel="stylesheet" href="../assets/css/banner-style.css">
    <link rel="stylesheet" href="../assets/css/home-style.css">
    <link rel="stylesheet" href="../assets/css/footer-style.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet" href="../assets/css/admin-style.css">
    <link rel="stylesheet" href="../assets/css/root.css">
    <!-- CSS -->
    <!-- ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- ICON -->
    <!-- ALERT -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.2/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.2/dist/sweetalert2.all.min.js"></script>
    <!-- ALERT -->
    <!-- CHART.JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- CHART.JS -->
    <!-- CKEDITOR -->
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <!-- CKEDITOR -->
    <title>Admin</title>
</head>
<body>
    <div id="root">
        <div id="dashboard">
            <div class="controller-dashboard">
                <div>
                    <h1>DashBoard</h1>
                    <a href="../?page=home"><i class="fa-solid fa-earth-americas fa-spin fa-spin-reverse"></i> Website</a>
                    <li>
                        <a href="?room=banners"><i class="fa-solid fa-sliders"></i> Banner</a>
                        <div class="item-more-admin">
                            <a href="?room=add-banner"><i class="fa-solid fa-plus"></i></a>
                        </div>
                    </li>
                    <a href="?room=users"><i class="fa-solid fa-users"></i> Users</a>
                    <li>
                        <a href="?room=categories"><i class="fa-solid fa-calendar-days"></i> Categories</a>
                        <div class="item-more-admin">
                            <a href="?room=add-category"><i class="fa-solid fa-plus"></i></a>
                        </div>
                    </li>
                    <li>
                        <a href="?room=products"><i class="fa-solid fa-boxes-stacked"></i> Products</a>
                        <div class="item-more-admin">
                            <a href="?room=add-product"><i class="fa-solid fa-plus"></i></a>
                        </div>
                    </li>
                    <a href="?room=comments"><i class="fa-regular fa-comments"></i> Comments</a>
                    <a href="?room=orders"><i class="fa-solid fa-cube"></i> Orders</a>
                    <a href="?room=blogs"><i class="fa-solid fa-blog"></i> Blogs</a>
                    <a href="?room=emails"><i class="fa-regular fa-envelope"></i> Emails</a>
                    <a href="?room=statistical"><i class="fa-solid fa-chart-line"></i> Statistical</a>
                </div>
                <a href="../auth/?action=logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
            </div>
            <div class="content-dashboard">
                <!-- /* -------------------------------- VIEW MAIN ------------------------------- */ -->
                <?php include './router-admin.php' // Tất cả các trang của admin được chạy ở đây ?>
                <!-- /* -------------------------------- VIEW MAIN ------------------------------- */ -->
            </div>
        </div>
    </div>
    <!-- /* --------------------------------- SCRIPT --------------------------------- */ -->
    <script src="../assets/javascript/admin.js"></script>
    <script src="../assets/javascript/alert-condition.js"></script>
    <script src="../assets/javascript/categories.js"></script>
    <script src="../assets/javascript/products.js"></script>
    <script src="../assets/javascript/ckeditor.js"></script>
    <script src="../assets/javascript/add-image-product.js"></script>
    <script src="../assets/javascript/banners.js"></script>
    <!-- /* --------------------------------- SCRIPT --------------------------------- */ -->
</body>
</html>
