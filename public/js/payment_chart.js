


function GetMonthlyPayments(year = null, start_time = null, end_time = null) {

    url = $('#paymentsThisMonthContainer').data('href');

    var startTime = $('#date-from').val()
    var endTime = $('#date-to').val()



    //Start ajax
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            //start_time,end_time
            year: year,
            start_time: startTime,
            end_time: endTime,
        },
        success: function (response) {
            //Start function success
            //----------------------------------------------------------

            const months = response.months;
            const values = response.values;
            const years = response.years;
            const thisYear = response.thisYear;
            const totalPayments = response.totalPayments;


            //---------------------------------
            let allBtnYears = ``;
            years.forEach((item) => {
                allBtnYears += `<button style="margin-left:15px" type="button" class="btn ${(item.year == thisYear) ? 'btn-primary' : 'btn-outline-primary'} buttonPaymentsThisYearsChart" data-year="${item.year}">
                                ${item.year}
                            </button>`
            });


            $('#content-tables-search').html(`
            <ul class="nav nav-tabs  mb-3 mt-3" id="simpletab" role="tablist">
                <li class="nav-item">
                    <a class="btn btn-outline-primary active" id="search-year-tab" data-toggle="tab" href="#search-year" role="tab" aria-controls="search-year" aria-selected="true">
                    Search By Years
                    </a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-outline-primary" id="search-date-tab" data-toggle="tab" href="#search-date" role="tab"
                    aria-controls="contact" aria-selected="false">
                    Search By Date
                    </a>
                </li>
            </ul>

            <div class="tab-content" id="simpletabContent">

                <div class="tab-pane fade show active" id="search-year" role="tabpanel" aria-labelledby="search-year-tab">
                    <div class="input-group mb-4">
                        ${allBtnYears}
                    </div>
                </div>

                <div class="tab-pane fade" id="search-date" role="tabpanel" aria-labelledby="search-date-tab">
                    <div class="input-group mb-4">

                        <input id="date-from" name="from" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date From..">
                        <input id="date-to" name="to" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date To..">

                        <div class="input-group-prepend">
                            <button type="button" style="margin-left:15px" class="btn btn-outline-primary" id="buttonPaymentsSearch">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>

                            </button>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-4">
                    <p>Total Payments : $ ${totalPayments}</p>
                </div>
            </div>`)

            var f1 = flatpickr(document.getElementById('date-from'));
            var f1 = flatpickr(document.getElementById('date-to'));




            //---------------------------------
            //Start append payments Chart
            const ctx = document.getElementById('paymentsThisMonthChart');


            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: months,
                    datasets: [{
                        label: '# of Votes',
                        data: values,
                        borderWidth: 2
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

            //End append payments Chart
            //---------------------------------


            //---------------------------------
            //Start Get Payments This Years
            $('.buttonPaymentsThisYearsChart').on('click', function () {
                myChart.destroy()
                GetMonthlyPayments($(this).data('year'))
            })
            //End Get Payments This Years
            //---------------------------------


            //---------------------------------
            //Start Search Button
            $('#buttonPaymentsSearch').on('click', function () {
                myChart.destroy()
                GetMonthlyPayments($('#date-from').val(), $('#date-to').val())
            })
            //End Search Button
            //---------------------------------



            //----------------------------------------------------------
            //End function success
        },
        error: function () {

        }
    })
    //End ajax

}

GetMonthlyPayments()

