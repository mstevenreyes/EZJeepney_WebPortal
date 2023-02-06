
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
        dateLimit: { days: 6 },
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

    // Edit Form auto Fillup Schedule tab
    $('#schedule-table tbody').on('click', 'td', function () {
        //putting data to the text fields
        var data =  table.cell(this).data();
        var driverIdPos = data.search("DR-");
        var paoIdPos = data.search("PAO-");
        var batchIdPos = data.search("BID-");
        var plateNumPos = data.search("Unit:");
        var driverId = data.substr(driverIdPos, 8);
        var paoId = data.substr(paoIdPos, 9);
        var batchId = $(this).find(".schedule-details").attr('id');
        var plateNumber = data.substr(plateNumPos + 6, 10);
        var scheduleDatePos = data.search("Date:");
        var scheduleDate = data.substr(scheduleDatePos + 6, 10);
        $('#edit-form-batch-id').val(batchId);
        $('#edit-form-driver-id').val(driverId);
        $('#edit-form-pao-id').val(paoId);
        $('#edit-form-plate-number').val(plateNumber.substring(0, plateNumber.indexOf('<')));
        $('#edit-form-schedule-date').val(scheduleDate);
    });

    // Timepicker for schedule (both add and edit)
    $('.timepicker').each(function()
    {
        $(this).timepicker({ zindex: 999999});
    });

    document.body.className = "visible"; // Fade in transition for the body
});



