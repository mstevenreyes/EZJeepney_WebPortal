
$(document).ready(function () {
    var table = $('#schedule-table').DataTable({
        // ajax: data,
        "pageLength" : 10,
        scrollX: true,
        columnDefs: [
            { "width": "200px", targets: "_all" },
            { "className": "salary-table", targets: "_all" } 
        ]
    });
    $('#payroll-range').daterangepicker({
        startDate: moment(),
        endDate: moment().add(7, 'day'), 
        dateLimit: { days: 30 },
        locale: { format: 'YYYY-MM-DD' }
    });
    $('.open-add-form').click(function() {
        $('#add-form-popup').hide(100).fadeIn(300); // SHOWS POPUP FORM
   
    }),
    $('#close-add-form').click(function() {
        $('#add-form-popup').show(100).fadeOut(300); 
    }); //HIDES POPUP
    $('#generate-payroll').click(function(){
        var confirmGen = confirm("You will be generating payroll based on your range. Are you sure?");
        if(confirmGen){
            var obj = {empType: $('#staff-type').val(), range: $('#payroll-range').val()}
            console.log(obj);
            $.ajax({
                type: "POST",
                url: "ajax/emp_salary.php",
                data: {data: JSON.stringify(obj), command: 'calculate-payroll'},
                success: function(response){
                    if(response.split(' ')[0] == "ERROR:"){
                        alert(response);
                    }else{
                        alert(response);
                        // console.log(response);
                        // alert("Payroll Generated.");
                        // location.reload();
                    }
                }
            });

        }
    });
    
    // For View Popup
    $('.view-report').click(function(){
        $('#view-payroll-popup').hide(100).fadeIn(300);
    });
    $('#close-view-report').click(function(){
        $('#view-payroll-popup').show(100).fadeOut(300);
    });
    //For Edit Popup
    $('.edit-report').click(function(){
        $('#edit-payroll-popup').hide(100).fadeIn(300);
    });
    $('#close-edit-report').click(function(){
        $('#edit-payroll-popup').show(100).fadeOut(300);
    });
    // =================
    var empId, salId, daysWorked;
    $('#schedule-table tbody').on( 'click', 'tr', function () {
        var data = table.row(this).data();
        empId = data[1];
        salId = data[0];
    });

    $('.delete-report').click(function(){
        var textVal = $(this).closest('tr').find('td:nth-child(1)').text();
    
       
        // $(this).closest('tr').find('td').text();
        console.log(textVal);
    //     each(function() {
    //         item = $(this).text(); 
    //         console.log(item);
    //    });
    confirm('Confirm Deletion of ' + textVal  + '?');
    });

    function salID(){
       
    }
     
       

    
   
   
    // $('#generate-payroll').click(function(){
    //     console.log('working')
    // });
});