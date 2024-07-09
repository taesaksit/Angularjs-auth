var dashboard = angular.module("dashboardApp", []);

dashboard.controller("dashboardCtrl", function ($scope, $http, $timeout) {



    $scope.getProductCountByCategory = function () {
        $scope.pie_array = {}
        $http({
            method: 'POST',
            url: 'report_productCounts.php'

        }).then(
            function successCallback(response) {

                $scope.pie_array = response.data
                $scope.category_name = $scope.pie_array.map(function (item) {
                    return item.category_name;
                });
                $scope.count = $scope.pie_array.map(function (item) {
                    return item.count;
                });


                var ctx = document.getElementById('myPieChart').getContext('2d');
                var myPieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: $scope.category_name,
                        datasets: [{
                            label: ['จำนวนสินค้า'],
                            // backgroundColor: BarColors,
                            backgroundColor: [
                                '#4E79A7',
                                '#F28E2B',
                                '#E15759',
                                '#76B7B2',
                                '#59A14F',
                                '#EDC949',
                                '#AF7AA1'
                            ],
                            data: $scope.count
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            title: {
                                display: true,
                                text: 'จำนวนสินค้าตามหมวดหมู่'
                            },
                            datalabels: {

                                formatter: (context, args) => {
                                    return args.chart.data.labels[args.dataIndex]
                                },
                                color: '#ffffff',
                                font: {
                                    size: 9, // Set the font size here   
                                }
                            }
                        }
                    },
                    plugins: [ChartDataLabels]

                });
            },
            function () { }
        )

    };

    $scope.getAveragePriceProduct = function () {
        $scope.pie_array2 = {}
        $http({
            method: 'POST',
            url: 'report_priceAvg.php'
        }).then(
            function successCallback(response) {

                $scope.pie_array2 = response.data
                $scope.category_name = $scope.pie_array2.map((item) => { return item.category_name; });
                $scope.avg_price = $scope.pie_array2.map((item) => { return item.avg_price; });

                var ctx = document.getElementById('myPieChart2').getContext('2d');
                var myPieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: $scope.category_name,
                        datasets: [{
                            label: ['ราคาเฉลี่ย'],
                            // backgroundColor: BarColors,
                            backgroundColor: [
                                '#4E79A7',
                                '#F28E2B',
                                '#E15759',
                                '#76B7B2',
                                '#59A14F',
                                '#EDC949',
                                '#AF7AA1'
                            ],
                            data: $scope.avg_price
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            title: {
                                display: true,
                                text: 'ราคาสินค้าเฉลี่ยแต่ละประเภท'
                            },
                        }
                    },


                });


            },
            function errorCallBack() {

            }
        )
    };

    $scope.getHighPriceProduct = function () {
        $scope.barChart_array = {}
        $http({
            method: 'POST',
            url: 'report_priceMax.php'

        }).then(
            function successCallback(response) {

                $scope.barChart_array = response.data;
                $scope.category_name = $scope.barChart_array.map(function (item) { return item.category_name; });
                $scope.max_price = $scope.barChart_array.map(function (item) { return item.max_price; });
                var ctx = document.getElementById('myPieChart3').getContext('2d');

                var barChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: $scope.category_name,
                        datasets: [{
                            label: 'ราคาสินค้าที่มากที่สุดแต่ละหมวด',
                            data: $scope.max_price,
                            backgroundColor: [
                                '#4E79A7',
                                '#F28E2B',
                                '#E15759',
                                '#76B7B2',
                                '#59A14F',
                                '#EDC949',
                                '#AF7AA1'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            
            },
            function () { }
        )

    };
});