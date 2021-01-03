formatDate()

function formatDate() {
    let date = new Date();
    let time;
    let day = date.getDate().toString();
    let month = date.getMonth().toString();
    let year = date.getFullYear().toString();
    let hours = date.getHours().toString();
    let min = date.getMinutes().toString();
    let sec = date.getSeconds().toString();

    month = (parseInt(month) + 1).toString();
    month = formatDateWithZero(month);

    day = (parseInt(day) + 1).toString();
    day = formatDateWithZero(day);

    hours = ("0" + hours).slice(-2);
    min = ("0" + min).slice(-2);
    sec = ("0" + sec).slice(-2);

    time = hours + ":" + min + ":" + sec;

    date = day + "/" + month + "/" + year;
    date = date + " " + time;

    document.getElementById("latestData").innerHTML = timeDiffCalc(date, data_jsonDecoded[arr_length - 1].time_MEAS);
}

function timeDiffCalc(now, then) {
    let diff = moment.utc(moment(now,"DD/MM/YYYY HH:mm:ss").diff(moment(then,"DD/MM/YYYY HH:mm:ss"))).format("HH:mm:ss").split(":");
    if(diff[0] === "00" && diff[1] !== "00"){
        return "Updated " + diff[1] + " minutes and " + diff[2] + " seconds ago";
    }else if(diff[1] === "00" && diff[0] === "00") {
        return "Updated " + diff[2] + " seconds ago";
    }else {
        return "Updated more than an hour ago";
    }
}

function formatDateWithZero(toFormat){
    if(toFormat.length === 1){
        toFormat = '0' + toFormat;
        return toFormat;
    }
}