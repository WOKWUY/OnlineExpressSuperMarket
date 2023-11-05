<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="./assets/image/favicon.png" type="image/x-icon">
    <!-- FAVICON -->
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/root.css">
    <link rel="stylesheet" href="./assets/css/common-style.css">
    <link rel="stylesheet" href="./assets/css/header-style.css">
    <link rel="stylesheet" href="./assets/css/banner-style.css">
    <link rel="stylesheet" href="./assets/css/home-style.css">
    <link rel="stylesheet" href="./assets/css/footer-style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./assets/css/loading-style.css">
    <link rel="stylesheet" href="./assets/css/product-details.css">
    <link rel="stylesheet" href="./assets/css/contact.css">
    <!-- CSS -->
    <!-- ALERT -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.2/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.2/dist/sweetalert2.all.min.js"></script>
    <!-- ALERT -->
    <!-- ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- ICON -->
    <!-- CHART.JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- CHART.JS -->
    <title>Website <?= (isset($_GET["page"]) && !empty($_GET["page"])) ? " - " . ucfirst($_GET["page"]) : "" ?></title>
</head>
<body>
    <div id="root">
        <?php include './router.php' ?>
    </div>
    <!-- /* --------------------------------- SCRIPT --------------------------------- */ -->
    <script src="./assets/javascript/admin.js"></script>
    <script src="./assets/javascript/alert-condition.js"></script>
    <script src="./assets/javascript/filter-product.js"></script>
    <script src="./assets/javascript/search.js"></script>
    <script src="./assets/javascript/comment.js"></script>
    <script src="./assets/javascript/delete-comment.js"></script>
    <script src="./assets/javascript/quantity-actions.js"></script>
    <script src="./assets/javascript/product-detail.js"></script>
    <script src="./assets/javascript/contact.js"></script>
    <!-- /* --------------------------------- SCRIPT --------------------------------- */ -->
</body>
</html>