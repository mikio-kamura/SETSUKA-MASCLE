<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if( time() % 5 == 0 ){
        $x = X; //Arduinoから送られてくるX
        $y = Y;
        $z = Z;
    }
    $mov_val = ($tmpx-$x)*($tmpx-$x) + ($tmpy-$y)*($tmpy-$y) + ($tmpz-$z)*(tmpz-z);
    //動作　が一定以上に「なった時」の値をmysqlのstepper-recordtabelにINSERTする　
    //「なった時」→<[動作が一定以上]条件文>の中で<動いていた>／<止まっていた>フラグを作る。

    $mov_val = sin(time());

    $flag = -1; //flagの初期化
    $a = 100; //一定値の設定
    if( $mov_val > $a ){  //動いている
        if ( $flag == 1 ) { //<動いていた>とき
            //現在の継続時間（tmp_stepping_time）を更新
            $tmp_stepping_time = var_dump( time() - $start_timestamp);
            //（echo $tmp_stepping_time）index.htmlとかで。 //若干上手くいくか不安
            echo '<pre>';
            print_r($start_timestamp);
            echo "\n";
            echo '</pre>';
            
        } else { //<止まっていた>とき
            $flag = 1;
            $start_timestamp = time(); //現在時刻
        }
    } else if($mov_val <= a ){ //止まっている
        if ($flag == 1){ //<動いていた>フラグ
            $flag = 0;
            $end_timestamp = time(); //現在時刻
            $e_stepping_time = var_dump($end_time - $start_time);
            // 2つの時刻の差を計算→継続時間
            //int 秒数なので、表示の時は /60 とか　/60/24 とかで時間と分と秒にするといい
            
            //INSERT ’継続時間’, 'id（勝手にやってほしい計算してほしい）', '現在の年月（勝手に計算してほしい）' to stpper-recording table
            
            //******不安、idは勝手にやってくれるかな。mysql、属性数が不十分なレコードはどうなるんだっけ、勝手に補間してくれるの？、どうやったらmysql内での「現在の取得」的なのを利用した phpからのINSERTができるんだろう
            //******不安
        }
    }
    //継続時間の表示 tmp_stepping_time
    //ファイル間を超えての変数の受け渡しの方法　php

    $tmpx = $x; $tmpy = $y; $tmpz = $z; //前フレームの値として保存
}