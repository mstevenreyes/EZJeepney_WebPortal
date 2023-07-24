
$(document).ready(function(){
    console.log("ready!");
    var coop = $("#admin-coop").text();
    $('#search-employee').on('input',function(e){
        var empID = $(this).val();
        if(empID == ""){
            employeeList = $.parseJSON($.ajax({
                type: "POST",
                url: "ajax/emp_list.php",
                data: "get=all-employee&coop=" + coop,
                async: false
            }).responseText);
       
            let html = [];
            for(var i = 0 ; i < employeeList.length ; i++){
                empType = employeeList[i]['emp_id'].slice(0, 2) == 'DR' ? 'DRIVER' : 'PAO';
                template = '<div class="emp-container"><a class="red-hover" href="a_profile?employee=' + employeeList[i]['emp_id'] +
                '"><img src="../employee/employee_images/'+ employeeList[i]['emp_id'] + '.png" alt="image">'
                + '<h4 class="emp-profile-names"><strong>' + employeeList[i]['emp_surname'] + ', ' + employeeList[i]['emp_firstname'] 
                + '</strong></h4><p><strong>'+ employeeList[i]['emp_id'] +' (' + empType +')</strong></p></a></div>';
                html.push(template);
                document.getElementById('emp-row').innerHTML = html.join('');
            }
        }else{
            console.log(coop);
            var employeeList = $.parseJSON($.ajax({
                type: "POST",
                url: "ajax/emp_list.php",
                data: "get=employee-search&emp-id=" +  empID + "&coop=" + coop,
                async: false
            }).responseText);
            let html = [];
            for (var i = 0 ; i < employeeList.length ; i++){
                
                empType = employeeList[i]['emp_id'].slice(0, 2) == 'DR' ? 'DRIVER' : 'PAO';
                template = '<div class="emp-container"><a class="red-hover" href="a_profile?employee=' + employeeList[i]['emp_id'] +
                '"><img src="../employee/employee_images/'+ employeeList[i]['emp_id'] + '.png" alt="image">'
                + '<h4 class="emp-profile-names"><strong>' + employeeList[i]['emp_surname'] + ', ' + employeeList[i]['emp_firstname'] + '</strong></h4><p><strong>'+ employeeList[i]['emp_id'] +' (' + empType +')</strong></p></a></div>';
                
                html.push(template);
                document.getElementById('emp-row').innerHTML = html.join('');
            }    
        }
    });

    $(function(){
         employeeList = $.parseJSON($.ajax({
                type: "POST",
                url: "ajax/emp_list.php",
                data: "get=all-employee&coop=" + coop,
                async: false
            }).responseText);
            let html = [];
            for(var i = 0 ; i < employeeList.length ; i++){
                empType = employeeList[i]['emp_id'].slice(0, 2) == 'DR' ? 'DRIVER' : 'PAO';
                template = '<div class="emp-container"><a class="red-hover" href="a_profile?employee=' + employeeList[i]['emp_id'] +
                '"><img src="../employee/employee_images/'+ employeeList[i]['emp_id'] + '.png" alt="image">'
                + '<h4 class="emp-profile-names"><strong>' + employeeList[i]['emp_surname'] + ', ' + employeeList[i]['emp_firstname'] 
                + '</strong></h4><p><strong>'+ employeeList[i]['emp_id'] +' (' + empType +')</strong></p></a></div>';
                html.push(template);
                document.getElementById('emp-row').innerHTML = html.join('');
        }
    });
    
});
