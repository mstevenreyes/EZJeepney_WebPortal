$('#apply-leave').click(function(){
   const response = confirm('Are you sure you want to apply a leave for today?');
   if(response){
        alert("Leave applied.");
        $.ajax({
            type: "POST",
            url: "ajax/emp_dashboard.php",
            data: "set=apply-leave"
        }).done(function(result) {               
            console.log('done!');
        });
   }
});