
$(document).ready(function () {
    var table = $('#schedule-table').DataTable({
        // ajax: data,
        "pageLength" : 25,
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
                        alert("Succesful. Payroll Generated.");
                        location.reload();
                    }
                }
            });

        }
    });
    var salId;
    // For View Popup
    $('.view-report').click(function(){
        console.log("WORKING");
        $('#view-payroll-popup').hide(100).fadeIn(300);
        salId = $(this).closest('tr').find('td:nth-child(1)').text();
        // Queries salary id to get other details
        $.ajax({
            type: "POST",
            url: "ajax/emp_salary.php",
            data: "command=get-payroll&salary-id=" + salId  
        }).done(function(result) { 
            var myJson = JSON.parse(result)     
            console.log(result);         
            $('#view-days-worked').text(myJson[0]['days_worked']);
            $('#view-basic-pay').text(myJson[0]['basic_pay']);
            $('#view-gross-pay').text(myJson[0]['grosspay']);
            $('#view-pag-ibig').text(myJson[0]['pagibig']);
            $('#view-philhealth').text(myJson[0]['philhealth']);
            $('#view-sss').text(myJson[0]['sss']);
            $('#view-net-pay').text( "\u20B1" + myJson[0]['netpay']);
            $('#view-emp-id').text(myJson[0]['emp_id'])
            console.log(myJson[0]['deduction']);

        });
    });
    $('#close-view-report').click(function(){
        $('#view-payroll-popup').show(100).fadeOut(300);
    });
    //For Edit Popup
    $('.edit-report').click(function(){
        salId = $(this).closest('tr').find('td:nth-child(1)').text();
        $.ajax({
            type: "POST",
            url: "ajax/emp_salary.php",
            data: "command=get-payroll&salary-id=" + salId  
        }).done(function(result) { 
            var myJson = JSON.parse(result)     
            console.log(myJson);         
            $('#edit-payroll-popup').hide(100).fadeIn(300);
            $('#edit-days-worked').val(myJson[0]['days_worked']);
            $('#edit-basic-pay').val(myJson[0]['basic_pay']);
            $('#edit-gross-pay').val(myJson[0]['grosspay'])
            $('#edit-pag-ibig').val(myJson[0]['pagibig']);
            $('#edit-philhealth').val(myJson[0]['philhealth']);
            $('#edit-sss').val(myJson[0]['sss']);
            $('#edit-net-pay').val(myJson[0]['netpay']);
        });
        
    });
    // Change Gross Pay during edit input event - Calculation of Payroll
    $('.amount.edit').on("propertychange change keyup input paste", function(event){
        console.log();
        var grossPay = $('#edit-days-worked').val() * $('#edit-basic-pay').val();
        var netpay = grossPay - $('#edit-philhealth').val() - $('#edit-sss').val() - $('#edit-pag-ibig').val();
        console.log(netpay);
        $('#edit-gross-pay').val(grossPay);
        $('#edit-net-pay').val(netpay);
    });
    // ============
    // Close Payroll
    $('#close-edit-report').click(function(){
        $('#edit-payroll-popup').show(100).fadeOut(300);
    });
    // =================

    // Delete Report Button
    $('.delete-report').click(function(){
        salId = $(this).closest('tr').find('td:nth-child(1)').text();
        var confirmDel = confirm('Confirm Deletion of ' + salId  + '?');
        if(confirmDel){
            $.ajax({
                type: "POST",
                url: "ajax/emp_salary.php",
                data: "command=delete-payroll&salary-id=" + salId  
            }).done(function(result) { 
                alert("Deleted Succesfully");
                location.reload();
            });
        }
    });
    // Update Payroll Button
    $('#update-payroll').click(function(){
        console.log("TEST");
    });
});