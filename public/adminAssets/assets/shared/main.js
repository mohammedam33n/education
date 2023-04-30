$(document).ready(function () {
    $.ajaxSetup({ 
        headers: { "X-CSRF-TOKEN": $('meta[name="csrf_token"]').attr("content") },
        async: true
    });

    refreshAllTableLinks()

    
})

function areYouSureForLinks()
{
    $('.ays').on('click',function(e){
        e.preventDefault()
        var href = $(this).attr('href');
        message ="Are You Sure";
        Swal.fire({
            title: `${message}`,
            icon: 'warning',
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes !'
        }).then((result) => {
            if (result.value) {
                location.href = href
            }
        });
    });
}

function refreshAllTableLinks()
{
    areYouSureForLinks();
}


function areYouSure(formId,message = "")
{
    message = message == "" ? "Are You Sure" : message;
    $(`#${formId}`).submit(function(e){
        e.preventDefault()
        Swal.fire({
            title: `${message}`,
            icon: 'warning',
            padding: '3em',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes !'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit()
            }
        });
    })
}

