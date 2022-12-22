
$(function () {
    "use strict";
    // ============================================================== 
    // Newsletter
    // ============================================================== 

    //ct-visits
    // new Chartist.Line('#ct-visits', {
    //     labels: ['2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015'],
    //     series: [
    //         [5, 2, 7, 4, 5, 3, 5, 4]
    //         , [2, 5, 2, 6, 2, 5, 2, 4]
    //     ]
    // }, {
    //     top: 0,
    //     low: 1,
    //     showPoint: true,
    //     fullWidth: true,
    //     plugins: [
    //         Chartist.plugins.tooltip()
    //     ],
    //     axisY: {
    //         labelInterpolationFnc: function (value) {
    //             return (value / 1) + 'k';
    //         }
    //     },
    //     showArea: true
    // });


    // var chart = [chart];

    // var sparklineLogin = function () {
    //     $('#sparklinedash').sparkline([0, 5, 6, 10, 9, 12, 4, 9], {
    //         type: 'bar',
    //         height: '30',
    //         barWidth: '4',
    //         resize: true,
    //         barSpacing: '5',
    //         barColor: '#7ace4c'
    //     });
    //     $('#sparklinedash2').sparkline([0, 5, 6, 10, 9, 12, 4, 9], {
    //         type: 'bar',
    //         height: '30',
    //         barWidth: '4',
    //         resize: true,
    //         barSpacing: '5',
    //         barColor: '#7460ee'
    //     });
    //     $('#sparklinedash3').sparkline([0, 5, 6, 10, 9, 12, 4, 9], {
    //         type: 'bar',
    //         height: '30',
    //         barWidth: '4',
    //         resize: true,
    //         barSpacing: '5',
    //         barColor: '#11a0f8'
    //     });
    //     $('#sparklinedash4').sparkline([0, 5, 6, 10, 9, 12, 4, 9], {
    //         type: 'bar',
    //         height: '30',
    //         barWidth: '4',
    //         resize: true,
    //         barSpacing: '5',
    //         barColor: '#f33155'
    //     });
    // }
    // var sparkResize;
    // $(window).on("resize", function (e) {
    //     clearTimeout(sparkResize);
    //     sparkResize = setTimeout(sparklineLogin, 500);
    // });
    // sparklineLogin();
    // =============================================

    // MORRIS JS
    // gets data from db
    var attendanceData, revenueData;
    function getAttendanceDB(){
        attendanceData = $.parseJSON($.ajax({
            type: "POST",
            url: "ajax/dashboard1.php",
            data: "get=attendance_count",
            async: false
        }).responseText);
    };
    function getRevenueDB(){
        revenueData = $.parseJSON($.ajax({
            type: "POST",
            url: "ajax/dashboard1.php",
            data: "get=revenue_count",
            async: false
        }).responseText);
    };
    getAttendanceDB();
    getRevenueDB();

    // Attendance graph config
    var attendanceConfig = {
        data: attendanceData,
        xkey: 'schedule_date',
        ykeys: ['present', 'absent'],
        xLabels: 'day',
        labels: ['Present', 'Absent'],
        fillOpacity: 0.6,
        hideHover: 'auto',
        behaveLikeLine: true,
        resize: true,
        pointFillColors:['#ffffff'],
        pointStrokeColors: ['black'],
        lineColors:['#2E4559','#BF573F'],
        pointSize: 0
    },
    revenueConfig = {
        data: revenueData,
        xkey: 'report_date',
        ykeys: ['earnings', 'expenses'],
        xLabels: 'day',
        labels: ['Income', 'Expenses'],
        fillOpacity: 0.6,
        hideHover: 'auto',
        behaveLikeLine: true,
        resize: true,
        pointFillColors:['#ffffff'],
        pointStrokeColors: ['black'],
        barColors:['#2E4559','#BF573F'],
        pointSize: 0
    }
    console.log(attendanceData);

    attendanceConfig.element = 'area-chart';
    Morris.Area(attendanceConfig);
    // config.element = 'stacked';
    revenueConfig.element = 'bar-chart';
    Morris.Bar(revenueConfig);
    // console.log(revenueData);
    // For showing dashboard popups, present details
    $('#present-drivers').click(function(){
        $('#view-present-driver').show();
    })
    $('.close-form').click(function(){
        $('.form-popup').hide();
    })
    $('#present-paos').click(function(){
        $('#view-present-pao').show();
    })
    $('#jeepneys-on-route').click(function(){
        console.log("WORK");
        $('#view-jeepneys-on-route').show();
    })
});
