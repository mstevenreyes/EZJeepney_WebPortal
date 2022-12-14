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
    // var setsidebartype = function() {
    //     var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
    //     if (width < 1170) {
    //         $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
    //     } else {
    //         $("#main-wrapper").attr("data-sidebartype", "full");
    //     }
    // };
    // $(window).ready(setsidebartype);
    // $(window).on("resize", setsidebartype);

// });

// document.body.className = "hidden";
$(document).ready(function(){
    // SHOWS POPUP FORM
    $('.open-add-form').click(function() {
        $('#add-form-popup').hide(100).fadeIn(300); 
    }),
    // HIDES POPUP
    $('#close-add-form').click(function() {
        $('#add-form-popup').show(100).fadeOut(300); 
    }); 
    
    $('.open-edit-form').click(function() {
        $('#edit-form-popup').hide(100).fadeIn(300); // SHOWS POPUP FORM
        
   
    }),
    $('#close-edit-form').click(function() {
        $('#edit-form-popup').show(100).fadeOut(300); 
    }); //HIDES POPUP
    
    $('#attendance-table').DataTable({ // MAKING DATATABLE 
        "pageLength" : 10,
        scrollX: true,
        columnDefs: [
            { "width": "200px", targets: "_all" },
            { "className": "schedule-column", targets: "_all" } 
        ]
    });

    // Adds another div row for Expenses Report details in case user wants another field =============
    var i = 1;
    $('#add-item').click(function(){
        let html = [];
        template = 
        '<div class="dynamic-report-container">' 
            + '<div class="form-group dynamic-report">' 
            + '<input type="text" class="report-item" id="item-description" name="item-description-' + i + '"placeholder="Description" autocomplete="off" required>'
        + '</div>'
        + '<div class="form-group dynamic-report">' 
            + '<select class="earnings-type" name="earnings-type-' + i + '"id="earnings-type" required>'
            + '<option value="EARNINGS">Earnings</option>'
            + '<option value="EXPENSES">Expenses</option>'
            + '</select>'
        + '</div>'
        + '<div class="form-group dynamic-report">'
            + '<input type="text" class="report-item" id="amount" name="amount-' + i + '" placeholder="Amount" autocomplete="off" required>'
        + '</div>'
    + '</div>'
        html.push(template);
        document.getElementById('dynamic-content').insertAdjacentHTML("beforeend", html.join(''));
        i++;
    });
    //=============================================================
    //===== Getting Report Form Data and Passing to db ===========================
    $('#submit-report').click(function(){
        //gets form
        let form = document.querySelector('#report-form');

        //get all field data
        //returns a FormData object
        let data = new FormData(form);
        let obj = serialize(data);
        console.log(obj);
        $.ajax({
            type: "POST",
            url: "ajax/daily_report.php",
            data: {mydata: JSON.stringify(obj)},
            success: function(response){
                console.log(response);
            }
        });
        //loop iterable FormData
        // for(let entry of data){
        //     console.log(entry);
        // }
        
        // alert("Report Submitted.");
        // location.reload();
    });
    // =============================================
    //===== Datepicker =============================
    $( function() {
        $( ".datepicker" ).each(function(){
            $(this).datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    });
    //== turn FormData into Object ======
    function serialize (data) {
        let obj = {};
        for (let [key, value] of data) {
            if (obj[key] !== undefined) {
                if (!Array.isArray(obj[key])) {
                    obj[key] = [obj[key]];
                }
                obj[key].push(value);
            } else {
                obj[key] = value;
            }
        }
        return obj;
    }
    // ============================
    document.body.className = "visible";
});


