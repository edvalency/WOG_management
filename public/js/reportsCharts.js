
      
       function offertory(){
        var options = {
          series: [44, 55, 80, 43, 22],
          chart: {
          width: 380,
          type: 'donut',
        },
        labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#chart1"), options);
        chart.render();
       }

       function expenses(){
        var options = {
          series: [44, 60, 13, 43, 22],
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: ['Team 9', 'Team B', 'Team N', 'Team D', 'Team E'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#chart2"), options);
        chart.render();
       }

      function tithes(){
        var options = {
          series: [44, 55, 70, 43, 22],
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: ['Team Q', 'Team R', 'Team S', 'Team T', 'Team E'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };
  
        var chart = new ApexCharts(document.querySelector("#chart3"), options);
        chart.render();
      }