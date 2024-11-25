<form action="submit.php" method="post">
    <?php if(isset($product)):?>
        <input type="hidden" name ="index" value="<?php echo $_GET['index']  ?>">
    <?php endif;?>
    Sản phẩm: <input type="text" name="pname" id="pname" value="<?php echo isset($product)? $product['name'] :'' ?>" required>
    Giá: <input type="text" name="pprice" id="pprice" value="<?php echo isset($product)? $product['price'] :'' ?>" required>
    <button type="submit" class = "btn btn-success"><?php echo isset($product)? "Lưu":"Thêm" ?></button>
    <button class = "btn btn-secondary"><a href="index.php" class="text-decoration-none text-white">Thoát</a></button>
</form>

