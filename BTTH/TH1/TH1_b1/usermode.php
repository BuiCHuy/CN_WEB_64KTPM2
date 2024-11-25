<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
<header class = mb-5>
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">User</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="usermode.php">Trang chủ</a>
                    <a class="nav-link active" aria-current="page" href="index.php">Chế độ admin</a>
                </div>
            </div>
        </div>
    </nav>
</header>
<main>
    <?php
    session_start();
    ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Tên</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Ảnh</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($_SESSION['flowers'] as $index => $flower):?>
            <tr>
                <td class="w-25"><strong><?php echo $flower['name']?></td>
                <td class="w-50"><?php echo $flower['Mô tả']?></td>
                <td class="w-25"><img src="<?php echo $flower['Ảnh']?>" width="400px"  alt=""></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</main>
<footer class = " border-dark border-top">

    <h2 class = 'text-center'>Các loài hoa</h2>
</footer>
</body>
</html>
