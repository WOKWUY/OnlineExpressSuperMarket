<main>
    <div id="my-profile">
        <h1>My Profile</h1>
        <div class="my-profile">
            <div class="avatar">
                <?php
                if(isset($result) && isset($result['avatar']) && $result['avatar'] !== ""){
                    ?><img src="./uploads/<?= $result['avatar'] ?>" alt=""><?php //HTML
                }else{
                    ?><img src='https://thethaovanhoa.mediacdn.vn/Upload/O5NP4aFt6GVwE7JTFAOaA/files/2022/06/son-tung-mtp-va-hai-tu%20(1).jpg' alt=''><?php
                }
                ?>
                <form action="./handles/uploadAvatar.php" method="POST" enctype="multipart/form-data" id="uploadAvatar" onsubmit="return validateUpload()">
                    <input hidden type="file" name="avatar" id="avatar">
                    <label for="avatar"><i class="fa-solid fa-upload"></i></label>
                    <button>Update</button>
                </form>
            </div>
            <div class="infor-user-profile">
                <div id="boxs-infor">
                    <div class="box-infor">
                        <label for="">Full Name</label>
                        <input type="text" value="<?= (isset($result)) ? $result['fullName'] : "" ?>" disabled>
                    </div>
                    <div class="box-infor">
                        <label for="">Email</label>
                        <input type="text" value="<?= (isset($result)) ? $result['email'] : "" ?>" disabled>
                    </div>
                    <div class="box-infor">
                        <label for="">Address</label>
                        <input type="text" value="<?= (isset($result)) ? $result['address'] : "" ?>" disabled>
                    </div>
                    <div class="box-infor">
                        <label for="">Numberphone</label>
                        <input type="text" value="<?= (isset($result)) ? $result['numberphone'] : "" ?>" disabled>
                    </div>
                </div>
                <button id="editProfile">Edit Profile</button>
                <!-- /* -------------------------------- FORM EDIT ------------------------------- */ -->
                <form action="" onsubmit="return false" method="POST" id="editInformationUser"
                    enctype="multipart/form-data">
                    <div id="boxs-infor">
                        <div class="box-infor">
                            <label for="fullname">Full Name</label>
                            <input type="text" id="fullName" value="<?= (isset($result)) ? $result['fullName'] : "" ?>" placeholder="Enter Full Name">
                        </div>
                        <div class="box-infor">
                            <label for="">Email</label>
                            <input type="email" id="email" value="<?= (isset($result)) ? $result['email'] : "" ?>" placeholder="Enter Email">
                        </div>
                        <div class="box-infor">
                            <label for="">Address</label>
                            <input type="text" id="address" value="<?= (isset($result)) ? $result['address'] : "" ?>" placeholder="Enter Address">
                        </div>
                        <div class="box-infor">
                            <label for="">Numberphone</label>
                            <input type="text" id="numberphone" value="<?= (isset($result)) ? $result['numberphone'] : "" ?>" placeholder="Enter Number Phone">
                        </div>
                    </div>
                    <div class="flex">
                        <a href="" class="backProfile"><i class="fa-solid fa-left-long"></i></a>
                        <button id="eP">Edit Profile</button>
                    </div>
                </form>
                <!-- /* -------------------------------- FORM EDIT ------------------------------- */ -->
            </div>
        </div>
        <!-- /* -------------------------------- MY ORDER -------------------------------- */ -->
        <?php 
        $db = require "./config/database.php";
        $orderController = new Order_Controller($db);
        $orders = $orderController->showOrderWeb();
        if(isset($orders)){
            ?>
            <h1>History Order</h1>
            <div class="my-order">
                <table>
                    <tr>
                        <th>Order Date</th>
                        <th class="rpbl">Total ($)</th>
                        <th class="rpbl">Status</th>
                        <th>Process</th>
                        <th>Actions</th>
                    </tr>
                    <?php 
                    foreach ($orders as $order) :
                    ?>
                    <tr>
                        <td><?= $order['createdate'] ?></td>
                        <td class="rpbl"><?= $order['total'] ?></td>
                        <td class="rpbl"><?= $order['status'] ?></td>
                        <td><?= $order['process'] ?></td>
                        <td class="actionOrderClient">
                            <a href=""><i class="fa-solid fa-xmark"></i> Cancel</a>
                            <button><i class="fa-solid fa-eye"></i> Details</button>
                        </td>
                    </tr>
                    <?php //HTML
                    endforeach
                    ?>
                </table>
            </div>
            <?php //HTML
        }else{
            messRed("Empty Order");
        }
        ?>
        <!-- /* -------------------------------- MY ORDER -------------------------------- */ -->
    </div>
</main>
<!-- /* ----------------------------------- JAVASCRIPT ----------------------------------- */ -->
<script src="./assets/javascript/search.js"></script>
<script src="./assets/javascript/my-profile.js"></script>
<!-- /* ----------------------------------- JAVASCRIPT ----------------------------------- */ -->