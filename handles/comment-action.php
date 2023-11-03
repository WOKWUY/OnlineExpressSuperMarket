<?php
include '../models/comment-model.php';
include '../controllers/comment-controller.php';
$db = include '../config/database.php';
$commentController = new Comment_Controller($db);
$newComment = $commentController->commentAction();
?>
<div class="user-comment">
    <div class="item-user-comment">
        <div class="avatar-user-comment">
            <img width="80px" src="./assets/image/ip15prm.png" alt="">
        </div>
        <div class="infor-user-comment">
            <div class="name-user-comment">
                <?= $newComment['userName'] ?>
            </div>
            <div class="comment-date">
                <?= $newComment['createdate'] ?>
            </div>
            <div class="content-comment-user">
                <?= $newComment['content'] ?>
            </div>
        </div>
    </div>
</div>