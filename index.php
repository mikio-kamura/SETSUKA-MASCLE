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
$db = parse_url($_SERVER['CLEARDB_DATABASE_URL']);
$db['dbname'] = ltrim($db['path'], '/');
$dsn = "mysql:host={$db['host']};dbname={$db['dbname']};charset=utf8";

try {
    $db = new PDO($dsn, $db['user'], $db['pass']);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM user';
    $prepare = $db->prepare($sql);
    $prepare->execute();

    echo '<pre>';
    $prepare->execute();
    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
    print_r(h($result));
    echo "\n";
    echo '</pre>';
} catch (PDOException $e) {
    echo 'Error: ' . h($e->getMessage());
}

function h($var)
{
    if (is_array($var)) {
        return array_map('h', $var);
    } else {
        return htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
    }
}
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