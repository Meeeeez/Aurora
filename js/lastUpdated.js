formatDate()

function formatDate() {
    let date = new Date();
    let time;
    let hours = date.getHours().toString();
    let min = date.getMinutes().toString();
    let sec = date.getSeconds().toString();

    /* Zeug für tage unterschied
    let day = date.getDate().toString();
    let month = date.getMonth().toString();
    let year = date.getFullYear().toString();

    month = (parseInt(month) + 1).toString();
    month = formatDateWithZero(month);

    day = (parseInt(day) + 1).toString();
    day = formatDateWithZero(day);
    //date = day + "/" + month + "/" + year;
    //date = date + " " + time;
    */
    hours = ("0" + hours).slice(-2);
    min = ("0" + min).slice(-2);
    sec = ("0" + sec).slice(-2);

    time = hours + ":" + min + ":" + sec;

    let timeMEAS = data_jsonDecoded[arr_length - 1].time_MEAS.split(" ");
    document.getElementById("latestData").innerHTML = timeDiffCalc(time, timeMEAS[1]);
}

function timeDiffCalc(now, then) {
    let a = moment(now, "HH:mm:ss");
    let b = moment(then, "H:mm:ss");
    let diffSec = a.diff(b, 'seconds');
    let diffMin = a.diff(b, 'minutes');

    if(diffMin.toString() === "0"){
        return "Updated " + diffSec + " seconds ago";
    }else if(diffMin >= 60) {
        return "Updated more than an hour ago";
    }else {
        return "Updated " + diffMin + " minutes ago";
    }
}

function formatDateWithZero(toFormat){
    if(toFormat.length === 1){
        toFormat = '0' + toFormat;
        return toFormat;
    }
}