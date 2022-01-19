"use strict";

const jan='2',feb=0,mar=0,apr=0,may=0,jun=0,jul=0,aug=0,sep=0,oct=0,nov=0,dec=0;

// suming up monthly offertory for chart
$.ajax({
  type: "post",
  url: "ajax.php",
  data: "display=all",
  success : function(data, status){
    var results = JSON.parse(data);
    for(var i = 0;i<results.length;i++){
      var month = results[1]['date'].split('/');
      if(month[1]=='01'){
        console.log('results amount:'+ parseInt(results[i]['amount']));
        var amnt = parseInt(results[i]['amount']);
        var conv = parseInt(jan);
        conv += amnt;
        console.log(conv);
      }
     
    }
    var janc = parseInt(jan);
    // console.log(typeof(amnt));
    console.log(jan);
  }
})

// for(var i = 0;i<results.length;i++){
//   console.log(results);
// }

function OffertoryChart(jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dec){

  console.log("month:"+ aug);
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
    borderRadius: 10,
    dataLabels: {
      position: 'top', // top, center, bottom
    },
  }
},
dataLabels: {
  enabled: true,
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

OffertoryChart(jan,feb,0,0,0,0,0,0,0,0,0,0);


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
chart2();