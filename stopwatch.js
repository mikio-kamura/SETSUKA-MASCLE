
var start;
var timer_id;
document.getElementById('start_stop').addEventListener('click', function(){
    if (this.innerHTML === 'START') {
        start = new Date();

　　　　　　　　　 // 一定時間ごとに特定の処理を繰り返す(10ミリ秒)
        timer_id = setInterval(goTimer, 10);

        // STOPボタンにする
        this.innerHTML = 'STOP'
        this.classList.remove('btn-primary');
        this.classList.add('btn-danger');
    } else {
        clearInterval(timer_id);

        this.innerHTML = 'START'
        this.classList.remove('btn-danger');
        this.classList.add('btn-primary');
    }
})

var addZero = function(value) {
    if (value < 10) {
        value = '0' + value;
    }
    return value;
}

var goTimer = function() {
    var now = new Date();

　　　　　　　// 現在の時間をSTARTした時間から引いて経過時間を計算
    var milli = now.getTime() - start.getTime();
    var seconds = Math.floor(milli / 1000);
    var minutes = Math.floor(seconds / 60);
    var hours = Math.floor(minutes / 60);

    seconds = seconds - minutes * 60;
    minutes = minutes - hours * 60;
    let mi = Math.floor((milli-seconds * 1000 - minutes*60*1000 - hours*60*60*1000)/10);

　　　　　　　// innerHTMLの要素を書き換える
    document.getElementById('timer').innerHTML = addZero(hours) + ':' + addZero(minutes) + ':' + addZero(seconds) + ':' + addZero(mi);
}

// let watch_start = document.querySelector(".btn-start");
// watch_start.addEventListener("click", () =>{
//     window.location.href = './stopwatch/watch_start.html';
//     // window.open('watch_start.html')
// })

// let now_time_dom = document.getElementById('now_time');
// let now = new Date();
// now_time_dom.innerText = now.getSeconds();
// let now_time_word_dom = document.getElementById('now_time_word');
// now_time_word_dom.innerHTML = "秒";

let record_dom = document.querySelector(".btn-record");
record_dom.addEventListener("click", () =>{
    window.location.href = './record.php';
    // window.open('watch_start.html')
})

function getNowDate(){
    var now = new Date();
    var now_year = now.getFullYear;
    var now_month = now.getMonth + 1;
    var now_date = now.getDate;
    return now_year + '-' + now_month + '-' + now_date;
}

function getNowTime(){
    var now = new Date();
    var now_hour = now.getHours;
    var now_min = now.getMinutes;
    var now_sec = now.getSeconds;
    return now_hour + ':' + now_min + ':' + now_sec;
}

var req = new XMLHttpRequest();
req.open('POST', 'record.php', true); 
req.onreadystatechange = function () {
    let record_submit_dom = document.querySelector(".btn-record-submit");
    if (req.readyState == 4) { // 通信の完了時
        if (req.status == 200) { // 通信の成功時
            record_submit_dom.addEventListner("click", ()=>{
                //record.phpにgetNowDate()とgetNowtime()を渡す
                
            })
        }
    } else {
    // result.innerHTML = "通信中...";
    }
}
