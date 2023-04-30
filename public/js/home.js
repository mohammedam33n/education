
$.get($('#paymentsThisMonthContainerGroup').data('href'), function (response) {

    const kid = response.groupKidsCount;
    const adult = response.groupAdultCount;
    // console.log(kid);
    // console.log(adult);

    const ctx = document.getElementById('paymentsThisMonthChartOnGroupShow');
    new Chart(ctx, {
        type: 'polarArea',
        data: {
            labels: [
                'Group Kids Count',
                'Group Adult Count'

            ],
            datasets: [{
                label: 'Count is ',
                data: [kid, adult],
                backgroundColor: [
                    '#e07be0',
                    '#420039'

                ]
            }]
        },
        options: {}
    });


    // const data = {
    //     labels: [
    //         'Red',
    //         'Green'

    //     ],
    //     datasets: [{
    //         label: 'My First Dataset',
    //         data: [kid, adult],
    //         backgroundColor: [
    //             'rgb(255, 99, 132)',
    //             'rgb(75, 192, 192)'

    //         ]
    //     }]
    // };



});

