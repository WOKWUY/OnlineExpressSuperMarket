<header>
    <div class="header-top">
        <div class="logo"><a href="?page=home"><i class="fa-brands fa-shopify"></i> S TeNoGy</a></div>
        <!-- /* ----------------------------- SEARCH DESKTOP ----------------------------- */ -->
        <form method="POST" action="" class="search" onsubmit="return false">
            <input type="text" name="keyword" id="keyword" placeholder="What do you want to buy today?">
            <button name="search" id="search"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <!-- /* ----------------------------- SEARCH DESKTOP ----------------------------- */ -->
        <div class="bell-cart-user">
            <a href="#">
                <i class="fa-regular fa-bell"></i>
                <span>0</span>
                <div class="notification">
                    <span>
                        <i class="fa-solid fa-bullhorn"></i>
                        Đơn hàng của bạn đã được giao
                        <div class="notification-time">2023-12-10</div>
                    </span>
                </div>
            </a>
            <a href="?page=cart">
                <i class="fa-solid fa-bag-shopping"></i>
                <span id="quantityCart">
                    <?php
                    $db = require './config/database.php';
                    $newCartCtrl = new Cart_Controller($db);
                    echo $newCartCtrl->quantityCart();
                    ?>
                </span>
                <input type="hidden" id="quantityCartOld" value="<?= $newCartCtrl->quantityCart() ?>">
            </a>
            <?php
            if(isset($ss_role) && isset($ss_id)){ // Kiểm tra đã đăng nhập chưa
                ?>
                <div class="user">
                    <i class="fa-regular fa-user"></i>
                    <div class="profile-item">
                        <a href="#"><i class="fa-brands fa-php"></i> I am <?= isset($_SESSION["user"]) ? $_SESSION['user']['role'] . " - " . $_SESSION['user']['id'] : ""  ?></a>
                        <a href="?page=my-profile"><i class="fa-regular fa-user"></i> Profile</a>
                        <a href="?page=order"><i class="fa-solid fa-bag-shopping"></i> My Order</a>
                        <!-- NHỚ VALIDATE  -->
                        <?php 
                        if($ss_role === "admin" || $ss_role === "staff"){
                            ?><a href="?page=admin"><i class="fa-solid fa-screwdriver-wrench"></i> Admin</a><?php // HTML
                        }
                        ?>
                        <!-- NHỚ VALIDATE  -->
                        <a href="./auth/?action=logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                    </div>
                </div>
                <?php //HTML
            }else{
                ?><a href="./auth/?action=logout"><i class="fa-solid fa-arrow-right-to-bracket"></i></a><?php // HTML
            }
            ?>
        </div>
        <!-- /* --------------------------- FORM SEARCH MOBILE --------------------------- */ -->
        <form method="POST" action="" class="search search-mobile" onsubmit="return false">
            <input type="text" name="keyword" id="keyword_mobile" placeholder="What do you want to buy today?">
            <button name="search" id="search_mobile"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <!-- /* --------------------------- FORM SEARCH MOBILE --------------------------- */ -->
    </div>
    <!-- /* ----------------------------------- NAV ---------------------------------- */ -->
    <nav>
        <ul>
            <li><a href="./">Home</a></li>
            <li><a href="./">Discount Code</a></li>
            <li><a href="?page=blogs">Blogs</a></li>
            <li><a href="?page=contact">Contact</a></li>
            <li><a href="./">FAQ</a></li>
        </ul>
    </nav>
    <!-- /* ----------------------------------- NAV ---------------------------------- */ -->
</header>