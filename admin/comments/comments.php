<table>
    <?php 
    if(isset($result)){
        ?>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Category Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        <?php // HTML
        foreach ($result as $comment) :
            ?>
                <tr>
                    <td><?= $comment['userId'] ?></td>
                    <td><?= $comment['productId'] ?></td>
                    <td><?= $comment['content'] ?></td>
                    <td><?= $comment['createdate'] ?></td>
                    <td class="actions">
                        <form action="" method="POST">
                            <button onclick="return confirmDelete('?room=comments&action=delete-comment&content=<?= $comment['content']?>')" type="submit" name="delete" class="red"><i class="fa-solid fa-trash-can"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            <?php //HTML
        endforeach;
    }else{
        if(!isset($alertDelete)){
            ?><span class="span-red">Empty Comment</span><?php // HTML
        }
    }
    ?>
</table>
<!-- Xử lí hiển thị -->
<?= (isset($alertDelete) && $alertDelete === "Thành công") ? "<script>Swal.fire({icon: 'success',title: 'Success',text: 'Deleted successfully',allowOutsideClick: false}).then((result) => { if (result.isConfirmed) {window.location.href = '?room=comments';}});</script>" : ""?>
<?= (isset($alertDelete) && $alertDelete === "Lỗi") ? "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Error!',});</script>" : "" ?>
<!-- Xử lí hiển thị -->