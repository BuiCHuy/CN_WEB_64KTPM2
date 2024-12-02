<?php
$isadding = isset($_GET['action']) && $_GET['action']==='add';
$isediting = isset($_GET['action']) && $_GET['action']==='edit'&& isset($_GET['index']);
session_start();
if(!isset($_SESSION['products'])){
    $_SESSION['products'] = [
        ['name' => 'Sản phẩm 1', 'price' => 1000],
        ['name' => 'Sản phẩm 2', 'price' => 2000],
        ['name' => 'Sản phẩm 3', 'price' => 3000]
    ];
}

?>

<main class = mb-5>
    <?php if($isadding||$isediting):
        $product = isset($_GET['index']) ? $_SESSION['products'][$_GET['index']] : null;
        require "product_form.php";
     else: ?>

    <button type="button" class="btn btn-success"><a href="index.php?action=add"" class="text-decoration-none text-white">Thêm mới</a></button>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Sản phẩm</th>
            <th scope="col">Giá thành</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xóa</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['products'] as $index => $product):?>
                <tr>
                    <td><strong><?php echo $product['name']?></td>
                    <td><?php echo $product['price']?></td>
                    <td><button class = btn><a href="index.php?action=edit&index=<?php echo $index?>" class="text-decoration-none text-white"><img src="icon/8666681_edit_icon.png" alt=""></a></button></td>
                    <td>
                        <form action="delete.php" method="post">
                            <input type="hidden" name="index" value="<?php echo $index?>">
                            <button class="btn" type="submit"><img src="icon/8664938_trash_can_delete_remove_icon.png" alt=""></button>
                        </form></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <?php endif ?>
</main>