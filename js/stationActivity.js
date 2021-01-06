checkIfActive()

function checkIfActive(){
    let badge = document.getElementById("activityBadge");

    if(document.getElementById("latestData").innerHTML === "Updated more than an hour ago"){
        badge.innerHTML = "INACTIVE";
        badge.style.color = "#E40C2B";
        badge.style.border = "2.5px solid #E40C2B";
        badge.style.marginLeft = "1075px";
        badge.style.fontFamily = "font-family: Inter, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"";
        badge.style.letterSpacing = "1px";
    }else {
        badge.innerHTML = "ACTIVE";
        badge.style.color = "#1ebe1e";
        badge.style.border = "2.5px solid #1ebe1e"
        badge.style.marginLeft = "1082px";
        badge.style.fontFamily = "font-family: Inter, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"";
        badge.style.letterSpacing = "1px";
    }
}