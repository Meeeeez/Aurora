let ctxPres = document.getElementById('presChart');

let presChart = new Chart(ctxPres, {
    type: 'doughnut',
    data: {
        labels: ['Red', 'White'],
        datasets: [{
            label: '# of Votes',
            data: [943.6, 3000],
            backgroundColor: [
                'rgb(208, 138, 255)',
                'rgb(235, 237, 239)',
            ],
            borderColor: [
                'rgb(208, 138, 255)',
                'rgb(235, 237, 239)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        legend: {
            display: false
        },
        elements: {
            center: {
                text: '943.6',
                color: '#d08aff', // Default is #000000
                fontStyle: 'Calibri', // Default is Arial
                sidePadding: 20, // Default is 20 (as a percentage)
                minFontSize: 20, // Default is 20 (in px), set to false and text will not wrap.
                lineHeight: 25 // Default is 25 (in px), used for when text wraps
            },
        },
        responsive: true,
        maintainAspectRatio: true,
        cutoutPercentage: 65
    }
});
