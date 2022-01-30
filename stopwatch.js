let watch_start = document.querySelector(".btn-start");
watch_start.addEventListener("click", () =>{
    window.location.href = './stopwatch/watch_start.html';
    // window.open('watch_start.html')
})

let now_time_dom = document.getElementById('now_time');
let now = new Date();
now_time_dom.innerText = now.getSeconds();
let now_time_word_dom = document.getElementById('now_time_word');
now_time_word_dom.innerHTML = "秒";