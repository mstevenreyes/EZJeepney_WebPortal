$('#apply-leave').click(function(){
   const response = confirm('Are you sure you want to apply a leave for today?');
   if(response){
        var empId = document.getElementById('emp-id').textContent;
        alert("Leave applied.");
        $.ajax({
            type: "POST",
            url: "ajax/emp_dashboard.php",
            data: "set=apply-leave&emp-id=" + empId
        }).done(function(result) {               
        });
        console.log();
   }
});