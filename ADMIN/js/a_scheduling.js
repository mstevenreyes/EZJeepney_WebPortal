// DATE RANGE PICKER
// var today = new Date();
// var endDate = new Date( );

 $(document).ready(function () {
 
    var table = $('#schedule-table').DataTable({ // MAKING DATATABLE 

        "pageLength" : 10,
        scrollX: true,
        columnDefs: [
            { "width": "200px", targets: "_all" },
            { "className": "schedule-column", targets: "_all" } 
        ]
        
    });
   
    //Date Range Picker Scheduling
    $('input[name="schedule-range"]').daterangepicker({ // DATE RANGE PICKER
        startDate: moment(),
        endDate: moment().add(7, 'day'), 
        dateLimit: { days: 7 },
        locale: { format: 'YYYY-MM-DD' }
    });
    //
    $('.open-add-form').click(function() {
        $('#add-form-popup').hide(100).fadeIn(300); // SHOWS POPUP FORM
   
    }),
    $('#close-add-form').click(function() {
        $('#add-form-popup').show(100).fadeOut(300); 
    }); //HIDES POPUP
    
    $('.open-edit-form').click(function() {
        $('#edit-form-popup').hide(100).fadeIn(300); // SHOWS POPUP FORM
   
    }),
    $('#close-edit-form').click(function() {
        $('#edit-form-popup').show(100).fadeOut(300); 
    }); //HIDES POPUP
    
    
    // tomorrow.toISOString().split('T')[0]
    // console.log(tomorrow);
    // var tomorrowFormatted = tomorrow.toDateString('yy-MM-dd')
    $("#start-date").change(function(){
        var startDate = $(this).val();
        var endDate = moment(startDate, "YYYY-MM-DD").add(6, 'days');
        // console.log(endDate);
        $("#end-date").val(endDate.format('YYYY-MM-DD'));
    });
    $( function() {
        $( ".datepicker" ).each(function(){//DATEPICKER
            $(this).datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    });
    $("#schedule-type").change(function()
    {
        var scheduleType =  $(this).find(":selected").val();
        var dateRanger = document.getElementById('date-ranger');
        var dateday = document.getElementById('date-day');
       if(scheduleType == "day"){
            dateRanger.style.display ='none';
            dateday.style.display = 'block';
       }else{
            dateday.style.display = 'none';
            dateRanger.style.display = 'flex';
       }
    });

    // For selecting rows and putting to edit schedule form
    $('#schedule-table tbody').on('click', 'tr', function () {
        //putting data to the text fields
        var data =  table.row(this).data();
        // var proj_num = $('#proj-number');   
        // var req_type = $('#req-type');
        // var store_code = $('#store-code');
        // var store_name = $('#store-name');
        // var target_date = $('#target-date');
        // proj_num.val(data[0]);    
        // req_type.val(data[1]);
        // store_code.val(data[5]);
        // store_name.val(data[6])
        // target_date.val(data[3]);
        var driverIdPos = data[1].search("DR-");
        var paoIDPost = data[1].search("PAO-");
        var data = data[1].slice(driverIdPos, 100);
        console.log( data.slice(0, 8));
    });

    // Timepicker for schedule (both add and edit)
    $('.timepicker').each(function()
    {
        $(this).timepicker({ zindex: 999999});
    });

    document.body.className = "visible"; // Fade in transition for the body
});





// $(window).on('load', function() {
//     var scheduleRange = $('#schedule-range').val().split(" ");
//     // getDates(scheduleRange[0], scheduleRange[2]);
    
// });



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
