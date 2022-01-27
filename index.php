<?php
echo <<<EOM
<script type="text/javascript">
alert( "TEST" )
console.log('.json_encode($data).');
</script>
EOM;
// $link = mysqli_connect('127.0.0.1', 'mikio', 'pass', 'stepping_record');
// if (mysqli_connect_errno()){
//     die("データベースに接続不可:" . mysqli_connect_error() . "\n");
// }else{
//     echo "データベースの接続に成功しました。\n";
// }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>stopwatch_home</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
        <div class="scss-test-container">SETSUKA-WATCHを始めましょう</div>
        <div class="btn btn--orange btn--radius btn-start"><span>START!</span></div>
        <form acttion="stopwatch.php" method="post">
        <script src="stopwatch.js"></script>
        
    </body>
</html>