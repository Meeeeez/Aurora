updateTime()

function updateTime() {
    let d = new Date();
    let min = d.getMinutes().toString();

    if(min.length === 1){
        min = "0" + min;
    }

    document.getElementById("time").innerHTML = d.getHours() + ":" + min;
    setInterval(updateTime, 5000);
}
