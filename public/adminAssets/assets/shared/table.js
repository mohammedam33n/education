$(document).ready(function () {
//    setTimeout(() => {
   
//    }, 1000);
    // setTimeout(() => {
    //     $('.search--col').parent().parent().parent().find('tbody').prepend(`
    //     <tr>
    //         <td> <input type="text" /> </td>
    //         <td> <input type="text" /> </td>
    //         <td> <input type="text" /> </td>
    //         <td> <input type="text" /> </td>
    //         <td> <input type="text" /> </td>
    //         <td> <input type="text" /> </td>
    //         <td> <input type="text" /> </td>
    //         <td> <input type="text" /> </td>
    //         <td> <input type="text" /> </td>
    //     </tr>
    // `)
    // }, 300);
})

function addSearchColumns()
{
    let searchCols = $('th.search--col').slice(13,26) 
    $('tfoot').prepend(`
        <tr class="search--tr"> </tr>
    `)

    searchCols.each((index,element) => {
        $('tfoot .search--tr').append(`
                <td> <input type="text" class="search--input${index}" style="width:${element.style.width};" /> </td>
        `)
    });
}