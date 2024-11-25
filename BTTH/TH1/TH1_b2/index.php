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
<?php
$filename = "question.txt";
$questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$questionlist =[];
foreach ($questions as $line) {
    if (strpos($line, "Câu") === 0) {
        if (!empty($current_question)) {
            $questionlist[] = $current_question;
        }
        $current_question = [];
    }
    $current_question[] = $line;
}
if (!empty($current_question)) {
    $questionlist[] = $current_question;
}
?>
<div class="container mt-5">
    <h1>Bài trắc nghiệm</h1>
    <form action="submit.php" method="post">

        <?php foreach ($questionlist as $number =>$question) : ?>
            <div class='card mb-4'>
                <div class='card-header'><strong><?php echo $question[0]?></strong></div>
                <div class="card-body">
                    <?php for($i=1;$i<=4;$i++):
                        $answer = substr($question[$i], 0, 1);?>
                        <div class='form-check'>
                            <input class='form-check-input' type='radio' name='question<?php echo $number?>' value='<?php echo $answer?>' id='question<?php echo $number?><?php echo $answer?>'>
                            <label class='form-check-label' for='question<?php echo $number?><?php echo $answer?>'><?php echo $question[$i]?></label>
                        </div>
                    <?php endfor?>
                </div>
            </div>
        <?php endforeach;?>
        <button type="submit" class="btn btn-primary">Nộp bài</button>
    </form>

</div>
</body>
</html>
