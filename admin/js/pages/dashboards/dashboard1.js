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
    
    var data = [
        { y: '2012', a: 50, b: 90},
        { y: '2015', a: 65,  b: 75},
        { y: '2016', a: 50,  b: 50},
        { y: '2017', a: 75,  b: 60},
        { y: '2018', a: 80,  b: 65},
        { y: '2019', a: 90,  b: 70},
        { y: '2020', a: 100, b: 75},
        { y: '2021', a: 115, b: 75},
        { y: '2022', a: 120, b: 85},
        { y: '2023', a: 145, b: 85},
        { y: '2024', a: 160, b: 95}
    ],
    config = {
        data: data,
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Present', 'Absent'],
        fillOpacity: 0.6,
        hideHover: 'auto',
        behaveLikeLine: true,
        resize: true,
        pointFillColors:['#ffffff'],
        pointStrokeColors: ['black'],
        lineColors:['#2E4559','#BF573F']
    };
    config.element = 'area-chart';
    Morris.Area(config);
    config.element = 'stacked';
    config.element = 'bar-chart';
    Morris.Bar(config);

});
