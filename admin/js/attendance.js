// $(function() {
//     "use strict";

//     $(".preloader").fadeOut();
//     // this is for close icon when navigation open in mobile view
//     $(".nav-toggler").on('click', function() {
//         $("#main-wrapper").toggleClass("show-sidebar");
//         $(".nav-toggler i").toggleClass("ti-menu");
//     });
//     $(".search-box a, .search-box .app-search .srh-btn").on('click', function() {
//         $(".app-search").toggle(200);
//         $(".app-search input").focus();
//     });
//     // ============================================================== 
//     // Resize all elements
//     // ============================================================== 
//     $("body, .page-wrapper").trigger("resize");
//     $(".page-wrapper").delay(20).show();
    
    //****************************
    /* This is for the mini-sidebar if width is less then 1170*/
    //**************************** 
    var setsidebartype = function() {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        if (width < 1170) {
            $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
        } else {
            $("#main-wrapper").attr("data-sidebartype", "full");
        }
    };
    $(window).ready(setsidebartype);
    $(window).on("resize", setsidebartype);

// });

// document.body.className = "hidden";
$(document).ready(function(){
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
    var table = $('#leaves-table').DataTable({ // MAKING DATATABLE 
        "pageLength" : 10,
        scrollX: true,
        columnDefs: [
            { "width": "200px", targets: "_all" },
            { "className": "leaves-table", targets: "_all" } 
        ]
        
    });
    var empId, applyDate, leaveStatus;
    $('#leaves-table tbody').on( 'click', 'tr', function () {
        var data = table.row(this).data();
        empId = data[0];
        applyDate = data[1];
  
    });
       // Detects Leave Status Change
    $('.leave-status').change(function() {
        leaveStatus = $(this).find(":selected").val();
        $.ajax({
            type: "POST",
            url: "ajax/attendance.php",
            data: "set=leaves&leave-status=" + leaveStatus + "&apply-date=" + applyDate + "&emp-id=" + empId 
        }).done(function(result) {      
            console.log(result);         
            alert('Updated Successfuly.')
        });
    });

    $('#attendance-table').DataTable({ // MAKING DATATABLE 
        "pageLength" : 10,
        scrollX: true,
        columnDefs: [
            { "width": "200px", targets: "_all" },
            { "className": "schedule-column", targets: "_all" } 
        ]
    });

    
    document.body.className = "visible";

});



