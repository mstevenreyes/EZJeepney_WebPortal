// DATE RANGE PICKER
var today = new Date();
var endDate = new Date( );
$(function() {
    $('input[name="daterange"]').daterangepicker({ // DATE RANGE PICKER
        startDate: moment(),
        endDate: moment().add(7, 'day'), 
        dateLimit: { days: 7 },
        locale: {
            format: 'YYYY-MM-DD'
        },

    });

});


 $(document).ready(function () {
    $('#schedule-table').DataTable({ // MAKING DATATABLE 

        "pageLength" : 10,
        scrollX: true,
        columnDefs: [
            { "width": "200px", targets: "_all" },
            { "className": "schedule-column", targets: "_all" } 
        ]
    
    });
    $('.open-form').click(function() {
        $('.form-popup').show(); // SHOWS POPUP FORM
        console.log('Open!');
    }),
    $('.close-form').click(function() {
        $('.form-popup').hide(); }); //HIDES POPUP
    
    // tomorrow.toISOString().split('T')[0]
    // console.log(tomorrow);
    // var tomorrowFormatted = tomorrow.toDateString('yy-MM-dd')
    $("#start-date").change(function(){
        var startDate = $(this).val();
        var endDate = moment(startDate, "YYYY-MM-DD").add(6, 'days');
        // console.log(endDate);
        $("#end-date").val(endDate.format('YYYY-MM-DD'));
    });
});

// $(window).on('load', function() {
//     var scheduleRange = $('#schedule-range').val().split(" ");
//     // getDates(scheduleRange[0], scheduleRange[2]);
    
// });
$( function() {
    $( ".datepicker" ).each(function(){//DATEPICKER
        $(this).datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
});


// $('#schedule-range').change(function(){
//     var scheduleRange = $('#schedule-range').val().split(" "); //Splits Date
//     var date = getDates(scheduleRange[0], scheduleRange[2]); 
// })
// function getDates(start, end){
//     const listDate = [];
//     const startDate = start;
//     const endDate = end;
//     const dateMove = new Date(startDate);
//     let strDate = startDate;

//     while (strDate < endDate) {
//         strDate = dateMove.toISOString().slice(0, 10);
//         listDate.push(strDate);
//         dateMove.setDate(dateMove.getDate() + 1);
//     };
//     $('#schedule-table thead tr').eq(0).find('th').eq(1).html(listDate[0]);
//     $('#schedule-table thead tr').eq(0).find('th').eq(2).html(listDate[1]);
//     $('#schedule-table thead tr').eq(0).find('th').eq(3).html(listDate[2]);
//     $('#schedule-table thead tr').eq(0).find('th').eq(4).html(listDate[3]);
//     $('#schedule-table thead tr').eq(0).find('th').eq(5).html(listDate[4]);
//     $('#schedule-table thead tr').eq(0).find('th').eq(6).html(listDate[5]);
//     $('#schedule-table thead tr').eq(0).find('th').eq(7).html(listDate[6]);
// }
