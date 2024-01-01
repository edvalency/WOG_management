"use strict";

// suming up monthly offertory for chart
// $.ajax({
//   type: "post",
//   url: "ajax.php",
//   data: "offertorychart=all",
//   success : function(data, status){
//     var offertoryresults = JSON.parse(data);
//     OffertoryChart(offertoryresults[0],offertoryresults[1],offertoryresults[2],offertoryresults[3],offertoryresults[4],offertoryresults[5],offertoryresults[6],
//       offertoryresults[7],offertoryresults[8],offertoryresults[9],offertoryresults[10],offertoryresults[11]);
//   }
// })

function OffertoryChart(jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dec){
  var options = {
  series: [{
  name: 'Total Month offertory',
  data: [jan,feb,mar, apr, may, jun, jul, aug, sep, oct,nov,dec]
}],
  chart: {
  height: 400,
  type: 'bar',
},
plotOptions: {
  bar: {
    borderRadius:5,
    
  }
},
dataLabels: {
  enabled: false,
  formatter: function (val) {
    return val;
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
      return val;
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

// getting chart data for total tithes
// $.ajax({
//   type: 'post',
//   url: 'ajax.php',
//   data: 'tithechart=all',
//   success: function(data,status){
//     var titheresults = JSON.parse(data);
//     TitheChart(titheresults[0],titheresults[1],titheresults[2],titheresults[3],titheresults[4],titheresults[5],titheresults[6],
//       titheresults[7],titheresults[8],titheresults[9],titheresults[10],titheresults[11]);
    
//   }
// })

// displaying chart data on dashboard
function TitheChart(jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dec) {
    var options = {
        series: [{
        name: 'Inflation',
        data: [jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dec]
      }],
        chart: {
        height: 400,
        type: 'bar',
      },
      plotOptions: {
        bar: {
          borderRadius: 5,
         
        }
      },
      dataLabels: {
        enabled: false,
        formatter: function (val) {
          return val;
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
            return val;
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
