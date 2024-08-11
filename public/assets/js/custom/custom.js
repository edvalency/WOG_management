$('document').ready(function () {
    const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    let table = new DataTable('#dataTable');
    var revnexp = [];
    function getWelfarePyStats() {
        var labels = [];
        var data = [];
        $.ajax({
            url: "get-welfare-year",
            success: function (res) {
                Object.keys(res).forEach((key) => {
                    labels.push(months[key - 1]);
                });
                data = Object.values(res);
                BarWidget.init('Welfare', 'kt_card_widget_t', labels, data);

            }
        })

    }

    // Revenue and expenses per year
    async function getRevnExpPyChart() {

        // {
        //     name: 'Sales',
        //     data: [30, 60, 53, 45, 60, 75, 53],
        // }

        var labels = [];
        var data = [];

        await $.ajax({
            url: "revenue/get-revenue-year",
            success: function (res) {
                data.push({
                    name: "Revenue",
                    data: res
                });
            }
        });

        await $.ajax({
            url: "get-expenses-year",
            success: function (res) {
                data.push({
                    name: "Expenses",
                    data: res
                });
            }
        });
        // KTUtil.onDOMContentLoaded(function () {
        //     // RevnExpChart.init('h', 'revnexp_chart', months, data);
        //     RevnExpChart.init();

        // });
        console.log(data);
    }

    getWelfarePyStats();
    // RevnExpChart.init('h', 'kt_card_widget_chart', months, revnexp);

});
