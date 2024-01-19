// Set new default font family and font color to mimic Bootstrap's default styling
(Chart.defaults.global.defaultFontFamily = "Nunito"),
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#858796";

function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + "").replace(",", "").replace(" ", "");
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
        dec = typeof dec_point === "undefined" ? "." : dec_point,
        s = "",
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return "" + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || "").length < prec) {
        s[1] = s[1] || "";
        s[1] += new Array(prec - s[1].length + 1).join("0");
    }
    return s.join(dec);
}

// Bar Chart Example
fetch(`/api/bills/paymentStatus/Đã thanh toán`)
    .then((response) => response.json())
    .then((dataBills) => {
        // Lấy danh sách ngày giao hàng
        const ngayGHValues = dataBills.map((bill) => bill.NgayGH);

        // So sánh ngày GH từ trái sang phải
        const mostRecentNgayGH = ngayGHValues.reduce(
            (latestDate, currentDate) => {
                return latestDate > currentDate ? latestDate : currentDate;
            }
        );

        console.log("Most recent NgayGH:", mostRecentNgayGH);
        const currentDate = new Date(mostRecentNgayGH);
        console.log("Current date:", currentDate);

        const monthLabels = [];

        for (let i = 5; i >= 0; i--) {
            const previousMonth = new Date(currentDate);
            previousMonth.setMonth(currentDate.getMonth() - i);

            console.log(previousMonth);
            const monthLabel = `${
                previousMonth.getMonth() + 1
            }/${previousMonth.getFullYear()}`;

            monthLabels.push(monthLabel);
        }

        console.log("monthLabels:", monthLabels);
        var ctx = document.getElementById("myBarChart");
        const labels = monthLabels.map((monthLabel) => {
            const [month, year] = monthLabel.split("/");
            const monthIndex = parseInt(month, 10) - 1; // Giảm đi 1 vì tên tháng bắt đầu từ 0 trong JavaScript
            const date = new Date(year, monthIndex);
            return date.toLocaleString("en-US", {
                month: "long",
                year: "numeric",
            });
        });
        console.log("Label:", labels);

        const totalValues = monthLabels.map((monthLabel) => {
            const billsInMonth = dataBills.filter((bill) => {
                const billMonth = new Date(bill.NgayGH).getMonth() + 1;
                const billYear = new Date(bill.NgayGH).getFullYear();
                return (
                    billMonth === parseInt(monthLabel.split("/")[0]) &&
                    billYear === parseInt(monthLabel.split("/")[1])
                );
            });
            // Tính tổng trị giá trong tháng
            const totalValue = billsInMonth.reduce(
                (sum, bill) => sum + bill.TriGia,
                0
            );

            return totalValue;
        });
        console.log("Total value: ", totalValues);
        const maxTotalValue = Math.max(...totalValues);
        console.log("Max Total Value:", maxTotalValue);
        //Làm tròn giá trị
        const roundedValue = Math.ceil(maxTotalValue / 100000000) * 100000000;
        console.log("roundedValue:", roundedValue);

        var myBarChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [
                    {
                        label: "Revenue ",
                        backgroundColor: "#4e73df",
                        hoverBackgroundColor: "#2e59d9",
                        borderColor: "#4e73df",
                        data: totalValues,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0,
                    },
                },
                scales: {
                    xAxes: [
                        {
                            time: {
                                unit: "month",
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false,
                            },
                            ticks: {
                                maxTicksLimit: 6,
                            },
                            maxBarThickness: 25,
                        },
                    ],
                    yAxes: [
                        {
                            ticks: {
                                min: 0,
                                max: roundedValue,
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function (value, index, values) {
                                    return number_format(value) + " VND";
                                },
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2],
                            },
                        },
                    ],
                },
                legend: {
                    display: false,
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: "#6e707e",
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: "#dddfeb",
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function (tooltipItem, chart) {
                            var datasetLabel =
                                chart.datasets[tooltipItem.datasetIndex]
                                    .label || "";
                            return (
                                datasetLabel +
                                number_format(tooltipItem.yLabel) +
                                ": VND"
                            );
                        },
                    },
                },
            },
        });
        var ctxYear = document.getElementById("myBarChartYear");
        const currentYear = new Date(); // Thời điểm hiện tại

        const recentYears = getRecentYears(currentYear, 3);

        console.log("Recent Years:", recentYears);

        function getRecentYears(currentDate, numberOfYears) {
            const yearLabels = [];

            for (let i = numberOfYears - 1; i >= 0; i--) {
                const previousYear = new Date(currentDate);
                previousYear.setFullYear(currentDate.getFullYear() - i);

                const yearLabel = `${previousYear.getFullYear()}`;
                yearLabels.push(yearLabel);
            }

            return yearLabels;
        }
        const totalValuesYear = recentYears.map((yearLabel) => {
            const billsInYear = dataBills.filter((bill) => {
                const billYear = new Date(bill.NgayGH).getFullYear();
                return billYear === parseInt(yearLabel);
            });
            // Tính tổng trị giá trong năm
            const totalValue = billsInYear.reduce(
                (sum, bill) => sum + bill.TriGia,
                0
            );

            return totalValue;
        });
        console.log("Total value: ", totalValuesYear);
        const maxTotalValueYear = Math.max(...totalValuesYear);
        console.log("Max Total Value Year:", maxTotalValueYear);
        //Làm tròn giá trị
        const roundedValueYear =
            Math.ceil(maxTotalValueYear / 100000000) * 100000000;
        console.log("roundedValue:", roundedValueYear);
        var myBarChartYear = new Chart(ctxYear, {
            type: "bar",
            data: {
                labels: recentYears,
                datasets: [
                    {
                        label: "Revenue ",
                        backgroundColor: "#4e73df",
                        hoverBackgroundColor: "#2e59d9",
                        borderColor: "#4e73df",
                        data: totalValuesYear,
                    },
                ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0,
                    },
                },
                scales: {
                    xAxes: [
                        {
                            time: {
                                unit: "month",
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false,
                            },
                            ticks: {
                                maxTicksLimit: 6,
                            },
                            maxBarThickness: 25,
                        },
                    ],
                    yAxes: [
                        {
                            ticks: {
                                min: 0,
                                max: roundedValueYear,
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function (value, index, values) {
                                    return number_format(value) + " VND";
                                },
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2],
                            },
                        },
                    ],
                },
                legend: {
                    display: false,
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: "#6e707e",
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: "#dddfeb",
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function (tooltipItem, chart) {
                            var datasetLabel =
                                chart.datasets[tooltipItem.datasetIndex]
                                    .label || "";
                            return (
                                datasetLabel +
                                number_format(tooltipItem.yLabel) +
                                ": VND"
                            );
                        },
                    },
                },
            },
        });
    });
