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
            <a class="navbar-brand" href="#">Administration</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
                    <a class="nav-link active" aria-current="page" href="usermode.php">Chế độ người dùng</a>
                </div>
            </div>
        </div>
    </nav>
</header>


<main class = mb-5>

        <?php
        $isadding = isset($_GET['action']) && $_GET['action']==='add';
        $isediting = isset($_GET['action']) && $_GET['action']==='edit'&& isset($_GET['index']);
        session_start();
        if(!isset($_SESSION['flowers'])){
            $_SESSION['flowers'] = [
                ['name' => 'Dạ yến thảo', 'Mô tả' => 'Dạ yến thảo là lựa chọn thích hợp cho những ai yêu thích trồng hoa làm đẹp nhà ở.','Ảnh'=>'images/hoadayenthao.webp'],
                ['name' => 'Hoa đồng tiền', 'Mô tả' => 'Hoa đồng tiền thích hợp để trồng trong mùa xuân và đầu mùa hè, khi mà cường độ ánh sáng chưa quá mạnh.','Ảnh'=>'images/hoadongtien.webp'],
                ['name' => 'Hoa giấy','Mô tả'=>'Hoa giấy có mặt ở hầu khắp mọi nơi trên đất nước ta, thích hợp với nhiều điều kiện sống khác nhau nên rất dễ trồng','Ảnh'=>'images/hoagiay.webp'],
                ['name' => 'Hoa thanh tú','Mô tả'=>'Mang dáng hình tao nhã, màu sắc thiên thanh dịu dàng của hoa thanh tú có thể khiến bạn cảm thấy vô cùng nhẹ nhàng khi nhìn ngắm','Ảnh'=>'images/hoathanhtu.webp'],
                ['name' => 'Hoa đèn lồng','Mô tả'=>'Giống như tên gọi, hoa đèn lồng có vẻ đẹp giống như chiếc đèn lồng đỏ trên cao.','Ảnh'=>'images/hoadenlong.webp'],
                ['name' => 'Hoa cẩm chướng','Mô tả'=>'Cẩm chướng là loại hoa thích hợp trồng vào dịp xuân - hè, nếu tiết trời không quá lạnh có thể kéo dài đến tận mùa đông','Ảnh'=>'images/hoacamchuong.webp'],
                ['name' => 'Hoa huỳnh anh','Mô tả'=>'Hoa có màu vàng rực, hình dạng như chiếc kèn be bé inh xinh, lại dễ trồng, mọc nhanh, vươn cao','Ảnh'=>'images/hoaquynhanh.webp'],
                ['name' => 'Hoa Păng-xê','Mô tả'=>'Vào mỗi độ tháng 4 về là dịp mà loài hoa Phăng-xê nở rộ vô cùng đẹp mắt. Hoa còn được gọi tên là hay hoa bướm, hoa tử la lan, hoa tương tư','Ảnh'=>'images/hoapangxe.webp'],
                ['name' => 'Hoa sen','Mô tả'=>'Hoa sen tượng trưng cho vẻ đẹp trắng trong, tao nhã của tâm hồn.','Ảnh'=>'images/hoasen.webp'],
                ['name' => 'Hoa dừa cạn ','Mô tả'=>'Hoa dừa cạn còn có các tên gọi như trường xuân hoa, dương giác, bông dừa, mỹ miều hơn thì là Hải Đằng','Ảnh'=>'images/hoaduacan.webp'],
                ['name' => 'Hoa sử quân tử','Mô tả'=>'Hoa toát lên một vẻ đẹp vô cùng giản dị kèm theo mùi hương nồng đượm','Ảnh'=>'images/hoaquantu.webp'],
                ['name' => 'Cúc lá nho','Mô tả'=>'Cúc lá nho thuộc họ nhà Cúc, được biết đến với những bông hoa nhiều màu sắc phong phú, tươi sáng: nào là trắng, hồng cho đến tím, xanh dương','Ảnh'=>'images/cuclanho.jpg'],
                ['name' => 'Cẩm tú cầu','Mô tả'=>'Cẩm tú cầu là loại cây thường mọc thành bụi có hoa nở to thành từng chùm và đặc biệt thích hợp với mùa hè.','Ảnh'=>'images/camtucau.webp'],
                ['name' => 'Hoa cúc dại','Mô tả'=>'Hoa có màu trắng, hồng tươi sáng hay vàng cam nổi bật, không kiêu sa nhưng sức sống bền bỉ.','Ảnh'=>'images/hoacucdai.webp'],
            ];
        }
        ?>


            <?php if($isadding||$isediting):
                $flower = isset($_GET['index']) ? $_SESSION['flowers'][$_GET['index']] : null;
                require 'Flower_form.php';

            else: ?>
                <button type="button" class="btn btn-success"><a href="index.php?action=add"" class="text-decoration-none text-white">Thêm mới</a></button>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Tên</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($_SESSION['flowers'] as $index => $flower):?>
                        <tr>
                            <td class="w-25"><strong><?php echo $flower['name']?></td>
                            <td class="w-25"><?php echo $flower['Mô tả']?></td>
                            <td class="w-25"><img src="<?php echo $flower['Ảnh']?>" width="200px"  alt=""></td>
                            <td class="w-auto"><button class = btn><a href="index.php?action=edit&index=<?php echo $index?>" class="text-decoration-none text-white"><img src="icon/8666681_edit_icon.png" alt=""></a></button></td>
                            <td class="w-auto">
                                <form action="delete.php" method="post">
                                    <input type="hidden" name="index" value="<?php echo $index?>">
                                    <button class="btn" type="submit"><img src="icon/8664938_trash_can_delete_remove_icon.png" alt=""></button>
                                </form></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            <?php endif?>

    </main>
    <footer class = " border-dark border-top">

        <h2 class = 'text-center'>Các loài hoa</h2>
    </footer>

</body>
</html>