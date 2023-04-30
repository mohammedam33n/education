$.get($('#paymentsThisMonthContainerGroup').data('href'), function (response) {

    // console.log(response);
    const months = response.months;
    const values = response.values;
    // const plugin = {
    //     id: 'paymentsThisMonthChartOnGroupShow',
    //     beforeDraw: (chart, args, options) => {
    //         const { ctx } = chart;
    //         ctx.save();
    //         ctx.globalCompositeOperation = 'destination-over';
    //         ctx.fillStyle = options.color || '#EFF1C5';
    //         ctx.fillRect(0, 0, chart.width, chart.height);
    //         ctx.restore();
    //     }
    // };

    const ctx = document.getElementById('paymentsThisMonthChartOnGroupShow');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Total Payments',
                data: values,
                borderWidth: 2,
                backgroundColor: '#59C3C3',
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            // plugins: {
            //     customCanvasBackgroundColor: {
            //         color: 'lightGreen',
            //     }
            // }
        },
        // plugins: [plugin],
    });



});
