"use strict";

$(function () {
    chart1();
    chart2();
    // chart3();
    // chart4();

    // select all on checkbox click
    $("[data-checkboxes]").each(function () {
        var me = $(this),
            group = me.data('checkboxes'),
            role = me.data('checkbox-role');

        me.change(function () {
            var all = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"])'),
                checked = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"]):checked'),
                dad = $('[data-checkboxes="' + group + '"][data-checkbox-role="dad"]'),
                total = all.length,
                checked_length = checked.length;

            if (role == 'dad') {
                if (me.is(':checked')) {
                    all.prop('checked', true);
                } else {
                    all.prop('checked', false);
                }
            } else {
                if (checked_length >= total) {
                    dad.prop('checked', true);
                } else {
                    dad.prop('checked', false);
                }
            }
        });
    });



});


function chart1() {
    var options = {
        series: [{
        name: 'Inflation',
        data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5,0]
      }],
        chart: {
        height: 400,
        type: 'bar',
      },
      plotOptions: {
        bar: {
          borderRadius: 10,
          dataLabels: {
            position: 'top', // top, center, bottom
          },
        }
      },
      dataLabels: {
        enabled: true,
        formatter: function (val) {
          return val + "%";
        },
        offsetY: -20,
        style: {
          fontSize: '12px',
          colors: ["#304758"]
        }
      },
      
      xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        position: 'bottom',
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        crosshairs: {
          fill: {
            type: 'gradient',
            gradient: {
              colorFrom: '#D8E3F0',
              colorTo: '#BED1E6',
              stops: [0, 100],
              opacityFrom: 0.4,
              opacityTo: 0.5,
            }
          }
        },
        tooltip: {
          enabled: true,
        }
      },
      yaxis: {
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false,
        },
        labels: {
          show: true,
          formatter: function (val) {
            return val + "%";
          }
        }
      
      },
      title: {
        text: '2022 Offertory ',
        floating: true,
        offsetY: 0,
        align: 'center',
        style: {
          color: '#444'
        }
      }
      };

      var chart = new ApexCharts(document.querySelector("#chart1"), options);
      chart.render();

}


function chart2() {
    var options = {
        series: [{
        name: 'Inflation',
        data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5,0]
      }],
        chart: {
        height: 400,
        type: 'bar',
      },
      plotOptions: {
        bar: {
          borderRadius: 10,
          dataLabels: {
            position: 'top', // top, center, bottom
          },
        }
      },
      dataLabels: {
        enabled: true,
        formatter: function (val) {
          return val + "%";
        },
        offsetY: -20,
        style: {
          fontSize: '12px',
          colors: ["#304758"]
        }
      },
      
      xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        position: 'bottom',
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        crosshairs: {
          fill: {
            type: 'gradient',
            gradient: {
              colorFrom: '#D8E3F0',
              colorTo: '#BED1E6',
              stops: [0, 100],
              opacityFrom: 0.4,
              opacityTo: 0.5,
            }
          }
        },
        tooltip: {
          enabled: true,
        }
      },
      yaxis: {
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false,
        },
        labels: {
          show: true,
          formatter: function (val) {
            return val + "%";
          }
        }
      
      },
      title: {
        text: '2022 Tithe',
        floating: true,
        offsetY: 0,
        align: 'center',
        style: {
          color: '#444'
        }
      }
      };

      var chart = new ApexCharts(document.querySelector("#chart2"), options);
      chart.render();

}


// function chart3() {
//     var options = {
//         series: [{
//         name: 'Inflation',
//         data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 163.4, 0.8, 0.5,0]
//       }],
//         chart: {
//         height: 400,
//         type: 'bar',
//       },
//       plotOptions: {
//         bar: {
//           borderRadius: 10,
//           dataLabels: {
//             position: 'top', // top, center, bottom
//           },
//         }
//       },
//       dataLabels: {
//         enabled: true,
        
//         offsetY: -20,
//         style: {
//           fontSize: '12px',
//           colors: ["#304758"]
//         }
//       },
      
//       xaxis: {
//         categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
//         position: 'bottom',
//         axisBorder: {
//           show: false
//         },
//         axisTicks: {
//           show: false
//         },
//         crosshairs: {
//           fill: {
//             type: 'gradient',
//             gradient: {
//               colorFrom: '#D8E3F0',
//               colorTo: '#BED1E6',
//               stops: [0, 100],
//               opacityFrom: 0.4,
//               opacityTo: 0.5,
//             }
//           }
//         },
//         tooltip: {
//           enabled: true,
//         }
//       },
//       yaxis: {
//         axisBorder: {
//           show: false
//         },
//         axisTicks: {
//           show: false,
//         },
//         labels: {
//           show: true,
//           formatter: function (val) {
//             return val;
//           }
//         }
      
//       },
//       title: {
//         text: '2022 Welfare',
//         floating: true,
//         offsetY: 0,
//         align: 'center',
//         style: {
//           color: '#444'
//         }
//       }
//       };

//       var chart = new ApexCharts(document.querySelector("#chart3"), options);
//       chart.render();

// }