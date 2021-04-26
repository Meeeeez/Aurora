checkIfActive()

function checkIfActive() {
    let badge = document.getElementById("activityBadge");

    if (document.getElementById("latestData").innerHTML === "Updated more than an hour ago") {
        badge.innerHTML = "INACTIVE";
        badge.style.color = "#262626FF";
        badge.style.border = "2.5px solid #262626FF";
        badge.style.fontFamily = "font-family: Inter, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"";
        badge.style.letterSpacing = "1px";
    } else {
        badge.innerHTML = "ACTIVE";
        badge.style.color = "#7cad3e";
        badge.style.border = "2.5px solid #7cad3e"
        badge.style.fontFamily = "font-family: Inter, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"";
        badge.style.letterSpacing = "1px";
    }
}