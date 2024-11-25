<?php
$filename = "KTPM2.csv";
$sinhvien = [];
if (($handle = fopen($filename, "r")) !== FALSE) {
    $headers = fgetcsv($handle, 1000, ",");
    $headers[0] = preg_replace('/^\xEF\xBB\xBF/', '', $headers[0]);
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $sinhvien[] = array_combine($headers, $data);
    }
    fclose($handle);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Danh sách sinh viên</h1>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
            <th>username</th>
            <th>password</th>
            <th>lastname</th>
            <th>firstname</th>
            <th>city</th>
            <th>email</th>
            <th>course1</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($sinhvien as $sv) {
            echo "<tr>";
            echo "<td>{$sv['username']}</td>";
            echo "<td>{$sv['password']}</td>";
            echo "<td>{$sv['lastname']}</td>";
            echo "<td>{$sv['firstname']}</td>";
            echo "<td>{$sv['city']}</td>";
            echo "<td>{$sv['email']}</td>";
            echo "<td>{$sv['course1']}</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
