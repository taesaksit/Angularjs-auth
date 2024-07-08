var dashboard = angular.module("dashboardApp", []);
dashboard.controller("dashboardCtrl", function ($scope, $http, $timeout) {

    $scope.pie_array = {}
    $scope.pieData = {
        labels: [],
        datasets: [{
            label:  ['จำนวนสินค้า'],
            backgroundColor: [
                '#FF6384',
                '#36A2EB',
                '#FFCE56',
                '#CAF450',
                '#E4003A',
                '#EB5B00',
                '#FF7EE2'
     
            ],
            data: [] // ข้อมูลตัวอย่างจำนวน
        }]
    };
    $scope.pieCharts = function() {
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: $scope.pieData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
              
            },
            
        });
    };
    $scope.getPie= function() {
        $http({
            method:'POST',
            url: 'get_report_pie.php'

        }).then(
            function successCallback(response){
                $scope.pie_array = response.data
                $scope.pieData.labels = $scope.pie_array.map(function(item) { return item.category_name; });
                $scope.pieData.datasets[0].data = $scope.pie_array.map(function(item) { return item.count; });
                $scope.pieCharts()
            },function(){}
        )

    };

   
});