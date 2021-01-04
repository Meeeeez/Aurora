checkIfActive()

function checkIfActive(){
    let badge = document.getElementById("activityBadge");

    if(document.getElementById("latestData").innerHTML === "Updated more than an hour ago"){
        badge.innerHTML = "INACTIVE";
        badge.style.color = "#E40C2B";
        badge.style.border = "2px solid #E40C2B";
        badge.style.marginLeft = "1146px";
    }else {
        badge.innerHTML = "ACTIVE";
        badge.style.color = "#1ebe1e";
        badge.style.border = "2px solid #1ebe1e"
        badge.style.marginLeft = "1162px";
    }
}