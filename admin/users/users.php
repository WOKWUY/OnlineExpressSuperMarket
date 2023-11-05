<table>
    <!-- /* ---------------------------------- DATA ---------------------------------- */ -->
    <?php 
    if(isset($result)){
        ?>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>OrderNum</th>
            <th>BoomNum</th>
            <th>Action</th>
            <th>Logs</th>
        </tr>
        <?php // HTML
        foreach ($result as $users => $user) :
        ?>
        <tr>
            <td>
                <?= $user['id'] ?>
                <a href="?room=information-user&id=<?= $user['id'] ?>" class="inforUserMore"><i class="fa-solid fa-magnifying-glass"></i></a>
            </td>
            <td><?= $user['userName'] ?></td>
            <td><?= $user['email'] ?></td>
            <td>
                <strong>
                    <?php 
                    $role = $user['role'];
                    if($role === 'admin'){
                        ?><span class="span-red"><?= $role ?></span><?php //HTML
                    }elseif($role === 'staff'){
                        ?><spam class="span-navi"><?= $role ?></spam><?php //HTML
                    }else{
                        echo $role;
                    }
                    ?>
                </strong>
            </td>
            <td>
                <strong>
                    <?php 
                    $status = $user['status'];
                    if($status === 'active'){
                        ?><span class="span-green"><?= $status ?></span><?php //HTML
                    }else{
                        ?><span class="span-red"><?= $status ?></span><?php //HTML
                    }
                    ?>
                </strong>
            </td>
            <td><?= $user['orderNum'] ?></td>
            <td><?= $user['boomNum'] ?></td>
            <td class="actions">
                <?php 
                if($role !== 'admin'){ // Nếu người dùng không phải admin
                    $ss_role = $_SESSION["user"]['role'];
                    if($ss_role == 'admin'){
                        ?>
                            <form action="?action=updateUser" method="POST">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <button name="action" value="active" class="green"><i class="fa-solid fa-lock-open"></i> Active</button>
                                <button name="action" value="disable" class="red"><i class="fa-solid fa-lock"></i> Disable</button>
                                <button name="action" value="user" class="green"><i class="fa-regular fa-user"></i> User</button>
                                <button name="action" value="staff" class="black"><i class="fa-solid fa-users"></i> Staff</button>
                            </form>
                        <?php //HTML
                    }else{
                        ?><span class="span-red">no action</span><?php //HTML
                    }
                }else{
                    ?><span class="span-red">no action</span><?php // HTML
                }
                ?>
            </td>
            <td><a href="?room=logs&id=<?= $user['id'] ?>" class="black"><i class="fa-solid fa-clock-rotate-left"></i> Logs</a></td>
        </tr>
        <?php // HTML
        endforeach;
    }else{
        ?><span class="span-red">Empty</span><?php
    }
    ?>
    <!-- /* ---------------------------------- DATA ---------------------------------- */ -->
</table>