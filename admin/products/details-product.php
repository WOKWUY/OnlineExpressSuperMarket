<!-- XỬ LÍ HIỂN THỊ -->
<a class="back" href="?room=products"><i class="fa-solid fa-left-long"></i></a>
<table>
    <?php 
    $view = (isset($_GET["view"])) ? $_GET["view"] : "";
    if(isset($result)){
        ?>
        <tr>
            <th><?= ucfirst($view) ?></th>
        </tr>
        <tr>
            <td style="padding: 20px;text-align: left;"><?= $result[$view] ?></td>
        </tr>
        <?php // HTML
    }else{
        ?><span class="span-red">Không tìm thấy kết quả</span><?php // HTML
    }
    ?>
</table>
<!-- XỬ LÍ HIỂN THỊ -->