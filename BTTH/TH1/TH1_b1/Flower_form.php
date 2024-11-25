<form action="submit.php" method="post" enctype="multipart/form-data" class="mx-3">
    <?php if(isset($flower)):?>
        <input type="hidden" name="index" value="<?php echo $_GET['index'] ?>">
    <?php endif?>
    <label for="name" class="form-label">Tên</label>
    <input type="text" class="form-control" name="name" id="name" value="<?php echo isset($flower) ? $flower['name']:''?>">
    <label for="descr" class="form-label">Mô tả</label>
    <textarea type="text" class="form-control" name="descr" id="descr" ><?php echo isset($flower) ? $flower['Mô tả']:''?></textarea>
    <?php if(isset($flower) && !empty($flower['Ảnh'])): ?>

        <label for="img">Ảnh hiện tại:</label>
        <img id="img" class="form-control" src="<?php echo $flower['Ảnh']; ?>" alt="Ảnh hiện có" style="max-width: 200px;">

    <?php endif; ?>
    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
    <button type="submit" class="btn btn-success">Lưu</button>
    <button class="btn btn-secondary"><a class="text-decoration-none text-white" href="index.php">Thoát</a></button>
</form>
