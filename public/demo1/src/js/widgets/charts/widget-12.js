"use strict";

// Class definition
var KTChartsWidget12 = function () {
    // Private methods
    var initChart = function(tabSelector, chartSelector, data, initByDefault) {
        var element = document.querySelector(chartSelector);
        var height = parseInt(KTUtil.css(element, 'height'));
        var labelColor = KTUtil.getCssVariableValue('--bs-gray-900');

        var borderColor = KTUtil.getCssVariableValue('--bs-border-dashed-color');    

        var options = {
            series: [{
                name: 'Net Profit',
                data: data
            }],
            chart: {
                fontFamily: 'inherit',
                type: 'bar',
                height: height,
                toolbar: {
                    show: false
                }              
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: ['22%'],
                    borderRadius: 5,                     
                    dataLabels: {
                        position: "top" // top, center, bottom
                    },
                    startingShape: 'flat'
                },
            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: true, 
                offsetY: -28,                                             
                style: {
                    fontSize: '13px',
                    colors: ['labelColor']
                }                         
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Grossey', 'Pet Food', 'Flowers', 'Restaurant', 'Kids Toys', 'Clothing', 'Still Water'],
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    style: {
                        colors: KTUtil.getCssVariableValue('--bs-gray-500'),
                        fontSize: '13px'
                    }                    
                },
                crosshairs: {
                    fill: {         
                        gradient: {         
                            opacityFrom: 0,
                            opacityTo: 0
                        }
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: KTUtil.getCssVariableValue('--bs-gray-500'),
                        fontSize: '13px'
                    },
                    formatter: function (val) {
                        return parseInt(val) + "K"
                    }
                }
            },
            fill: {
                opacity: 1
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px'
                },
                y: {
                    formatter: function (val) {
                        return "$" + val + " thousands"
                    }
                }
            },
            colors: [KTUtil.getCssVariableValue('--bs-primary'), KTUtil.getCssVariableValue('--bs-light-primary')],
            grid: {
                borderColor: borderColor,
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            }
        };

        var chart = new ApexCharts(element, options);

        var init = false;
        var tab = document.querySelector(tabSelector);
        
        if (initByDefault === true) {
            chart.render();
            init = true;
        }        

        tab.addEventListener('shown.bs.tab', function (event) {
            if (init == false) {
                chart.render();
                init = true;
            }
        })
    }

    // Daterangepicker
    var initDaterangepicker = function () {
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#kt_charts_widget_12_daterangepicker span').html(start.format('D MMM YYYY') + ' - ' + end.format('D MMM YYYY'));
        }

        $('#kt_charts_widget_12_daterangepicker').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);
    } 

    // Public methods
    return {
        init: function () {   
            initChart('#kt_charts_widget_12_tab_1', '#kt_charts_widget_12_chart_1', [54, 42, 75, 110, 23, 87, 50], true);
            initChart('#kt_charts_widget_12_tab_2', '#kt_charts_widget_12_chart_2', [25, 55, 35, 50, 45, 20, 31], false); 
            initChart('#kt_charts_widget_12_tab_3', '#kt_charts_widget_12_chart_3', [45, 15, 35, 70, 45, 50, 21], false); 
            
            // Daterangepicker
            initDaterangepicker();
        }        
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = KTChartsWidget12;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTChartsWidget12.init();
});


 