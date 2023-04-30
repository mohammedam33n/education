
let createcheckbox = document.getElementsByClassName('paid_finished_checkbox');

whenMonthChangeHandlePaymentCheckBox()

for (let element of createcheckbox) {
    element.addEventListener('change', function (event) {
        let href = $(this).data('href');
        let student = $(this).data('student');
        let group = $(this).data('group');
        let amount = $(this).data('amount');

        let monthCreatePayment = $(element).parent()
            .parent().parent()
            .parent().parent()
            .parent().parent()
            .parent()
            .find("#month")
            .val()

        // Create Payment
        if (element.checked == true) {
            $.ajax({
                url: href,
                type: 'post',
                data: {
                    student_id: student,
                    group_id: group,
                    amount: amount,
                    month: monthCreatePayment,
                    paid: true
                },
                success: function (response) {
                    let paymentsCount = $('#paymentsCount').html()

                    paymentsCount = parseInt(paymentsCount)

                    $('#paymentsCount').html(paymentsCount + 1)

                    Swal.fire(
                        'Success!',
                        `The month has been paid successfully !`,
                        'success'
                    )
                },
                error: function (response) {
                    month == null ? $(`.paid_finished_checkbox`).prop('checked', false) : '';
                    Swal.fire(
                        'Warning!',
                        `${response.responseJSON.message}mohamed sharaf`,
                        'error'
                    )
                }
            })
        } else {
            $.ajax({
                url: href,
                type: 'post',
                data: {
                    student_id: student,
                    group_id: group,
                    amount: amount,
                    month: monthCreatePayment,
                    paid: false
                },
                success: function (response) {
                    let paymentsCount = $('#paymentsCount').html()

                    paymentsCount = parseInt(paymentsCount)

                    $('#paymentsCount').html(paymentsCount - 1)

                    Swal.fire(
                        'Success!',
                        `The month's payment has been cancelled !`,
                        'success'
                    )
                },
                error: function (response) {
                    Swal.fire(
                        'Warning!',
                        `${response.responseJSON.message}`,
                        'error'
                    )
                }
            })
        }

    })
}


$(".month").change(function () {
    whenMonthChangeHandlePaymentCheckBox()
});


function whenMonthChangeHandlePaymentCheckBox() {
    $(`.paid_finished_checkbox_by_show_payment`).prop('checked', false);

    let monthCreatePayment = $('.month').val();
    let group = $('.month').data('group');
    let href = $('.month').data('href');
    $.ajax({
        url: href,
        data: {
            month: monthCreatePayment,
            group_id: group,
        },
        success: function (response) {
            response.payments.forEach(payment => {
                if (payment.paid == 1) {
                    student_id = $(`#paid_finished_checkbox_${payment.student_id}_${payment.group_id}`).prop('checked', true);
                    // if (student_id == payment.student_id) {
                    // $(`#paid_finished_checkbox_${payment.student_id}_${payment.group_id}`).prop('checked', true);
                    // }
                }
                else {
                    student_id = $(`#paid_finished_checkbox_${payment.student_id}_${payment.group_id}`).prop('checked', false);
                }
            });
        },
        error: function () { }
    })
}


let month = $(".month").val();
let group = $(".month").data('group');
let href = $(".month").data('href-payment-count');

getPymentsCount(month, group, href)


$(".month").change(function () {

    let month = $(this).val();
    let group = $(this).data('group');
    let href = $(this).data('href-payment-count');

    getPymentsCount(month, group, href)
});




function getPymentsCount(month, group, href) {
    $.ajax({
        url: href,
        data: {
            month: month,
            group_id: group,
        },
        success: function (response) {
            $('#paymentsCount').html(response.paymentsCount)
        },
        error: function () { }
    })
}