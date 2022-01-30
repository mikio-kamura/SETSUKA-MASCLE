<?php
echo <<<EOM
<script type="text/javascript">
alert( "これまでの軌跡を振り返ってモチベを上げよう！" )
console.log('.json_encode($data).');
</script>
EOM;

include('data.php'); //を書けばグローバルになる。使いたいindex

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
$db = new PDO($dsn, $db['user'], $db['pass']/*,[
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_EMULATE_PREPARES => false,
  ]*/);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); //?

    $sql1 = "INSERT INTO stepping_record VALUES ('NULL', 'NULL', 'NULL')";
    //";";
   $prepare1 = $db->prepare($sql1);
   $prepare1->execute();

    $sql = 'SELECT * FROM stepping_record';
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
