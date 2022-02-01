<?php
echo <<<EOM
<script type="text/javascript">
alert( "TEST" )
console.log('.json_encode($data).');
</script>
EOM;

include('data.php'); //を書けばグローバルになる。使いたいindex
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>stopwatch_home</title>
        <link rel="stylesheet" href="style/style.css">
    </head>
    <body>
        <div class="center_container">
            <div class="container">
            <div class="scss-test-container">今の継続時間</div>
            <p id="timer" class="big_font">00:00:00</p>
            <form>
                <input type="number">
                <button type="submit">送信</button>
            </form>
            </div>
            <div id="now_time"></div><p id="now_time_word"></p>
            <div class="scss-test-container">SETSUKA-MASCLE</div>
            <!-- <div class="btn btn--orange btn--radius btn-start"><span>START!</span></div> -->
            <!-- <form acttion="stopwatch.php" method="post"> -->
            <p></p>
            <div class="btn btn--orange btn--radius btn-record"><span>記録を見る!</span></div>
            <div class="paddinggg">
                <button id="start_stop" class="btn btn--orange btn--radius">START</button>
            </div>
            <script src="stopwatch.js"></script>
        </div>
    </body>
</html>