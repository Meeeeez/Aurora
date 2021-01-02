updateTime()

function updateTime() {
    let d = new Date();
    document.getElementById("time").innerHTML = d.getHours() +":"+ d.getMinutes()
    setTimeout(updateTime, 1000)
}
