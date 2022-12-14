$.ajax({
    type: "POST",
    url: "data/PHP/controller.php",
    data: { function: "getDataForGraph", },
    dataType: "JSON",
    success: function (response) {
        dates = []
        valors = []
        response.forEach(element => {
            tmp = element['value']
            tmp = tmp.substr(tmp.indexOf("[") + 1, tmp.indexOf("]") - 1)
            valors.push(tmp)
            dates.push(element['date'])
        });

        dates = dates.reverse();
        valors = valors.reverse();

        new Chart(document.getElementById('allData'), {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'values',
                    data: valors,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    },
    error: function (response) {
        console.log(response)
        alert("Error.")
    }
});

$.ajax({
    type: "POST",
    url: "data/PHP/controller.php",
    data: { function: "getLast10Recods", },
    dataType: "JSON",
    success: function (response) {
        dates = []
        valors = []
        response.forEach(element => {
            tmp = element['value']
            tmp = tmp.substr(tmp.indexOf("[") + 1, tmp.indexOf("]") - 1)
            valors.push(tmp)
            dates.push(element['date'])
        });

        dates = dates.reverse();
        valors = valors.reverse();

        new Chart(document.getElementById('last10Records'), {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'values',
                    data: valors,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    },
    error: function (response) {
        console.log(response)
        alert("Error.")
    }
});