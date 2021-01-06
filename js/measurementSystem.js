let imperialBtn = document.getElementById("imperialBtn");
let metricBtn = document.getElementById("metricBtn");
let measSystem;

function switchToMetric(){
    metricBtn.style.marginLeft = "905px";
    metricBtn.style.backgroundColor = "white";
    metricBtn.style.color = "#262626";
    metricBtn.style.border = "2.5px solid #262626";
    metricBtn.style.padding = "1px 11.5px 1px";
    metricBtn.style.borderRadius = "15px";
    metricBtn.style.textAlign = "center";
    metricBtn.style.textDecoration = "none";
    metricBtn.style.fontFamily = "Inter, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"";
    metricBtn.style.fontWeight = "600";
    metricBtn.style.letterSpacing = "1px";
    metricBtn.style.display = "inline-block";
    metricBtn.style.fontSize = "14px";

    imperialBtn.style.backgroundColor = "#EBEDEF";
    imperialBtn.style.color = "#262626";
    imperialBtn.style.border = "none";
    imperialBtn.style.textAlign = "center";
    imperialBtn.style.textDecoration = "none";
    imperialBtn.style.fontFamily = "Inter, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"";
    imperialBtn.style.fontWeight = "600";
    imperialBtn.style.letterSpacing = "1px";
    imperialBtn.style.display = "inline-block";
    imperialBtn.style.fontSize = "14px";

    measSystem = "metric";
}

function switchToImperial(){
    imperialBtn.style.backgroundColor = "white";
    imperialBtn.style.color = "#262626";
    imperialBtn.style.border = "2.5px solid #262626";
    imperialBtn.style.padding = "1px 11.5px 1px";
    imperialBtn.style.borderRadius = "15px";
    imperialBtn.style.textAlign = "center";
    imperialBtn.style.textDecoration = "none";
    imperialBtn.style.fontFamily = "Inter, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"";
    imperialBtn.style.fontWeight = "600";
    imperialBtn.style.letterSpacing = "1px";
    imperialBtn.style.display = "inline-block";
    imperialBtn.style.fontSize = "14px";

    metricBtn.style.backgroundColor = "#EBEDEF";
    metricBtn.style.color = "#262626";
    metricBtn.style.border = "none";
    metricBtn.style.textAlign = "center";
    metricBtn.style.textDecoration = "none";
    metricBtn.style.fontFamily = "Inter, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"";
    metricBtn.style.fontWeight = "600";
    metricBtn.style.letterSpacing = "1px";
    metricBtn.style.display = "inline-block";
    metricBtn.style.fontSize = "14px";

    measSystem = "imperial";
}