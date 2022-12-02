/*
Template Name: Admin Pro Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
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
    
    var attendanceData = [
        { year: '2012-01-02', a: 50, b: 90},
        { year: '2012-01-03', a: 65,  b: 75},
        { year: '2012-01-04', a: 50,  b: 50},
        { year: '2012-01-05', a: 75,  b: 60},
        { year: '2012-01-06', a: 80,  b: 65},
        { year: '2012-01-07', a: 90,  b: 70},
        { year: '2012-01-08', a: 100, b: 75},
        { year: '2012-01-09', a: 115, b: 75},
        { year: '2012-01-10', a: 120, b: 85},
        { year: '2012-01-11', a: 145, b: 85},
        { year: '2012-01-12', a: 160, b: 95}
    ],
    attendanceConfig = {
        data: attendanceData,
        xkey: 'year',
        ykeys: ['a', 'b'],
        xLabels: 'day',
        labels: ['Present', 'Absent'],
        fillOpacity: 0.6,
        hideHover: 'auto',
        behaveLikeLine: true,
        resize: true,
        pointFillColors:['#ffffff'],
        pointStrokeColors: ['black'],
        lineColors:['#2E4559','#BF573F']
    };
    attendanceConfig.element = 'area-chart';
    Morris.Area(attendanceConfig);
    config.element = 'stacked';
    config.element = 'bar-chart';
    Morris.Bar(config);

});
