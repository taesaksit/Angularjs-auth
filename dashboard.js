var dashboard = angular.module("dashboardApp", []);
dashboard.controller("dashboardCtrl", function ($scope, $http, $timeout) {

    $scope.chartData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Sales',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
            data: [65, 59, 80, 81, 56, 55, 40],
        }]
    };

    $scope.pieData = {
        labels: ['กลุ่ม A', 'กลุ่ม B', 'กลุ่ม C'],
        datasets: [{
            label: 'ข้อมูล Pie Chart',
            backgroundColor: [
                '#FF6384',
                '#36A2EB',
                '#FFCE56'
            ],
            data: [300, 200, 100] // ข้อมูลตัวอย่างจำนวน
        }]
    };
   
    $scope.barCharts = function() {

        var ctx = document.getElementById('myBarChart').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: $scope.chartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                resoponsive:true,
            },
        });
    };

    $scope.pieCharts = function() {
      
        var ctx = document.getElementById('myPieChart').getContext('2d');
        myPieChart = new Chart(ctx, {
            type: 'pie',
            data: $scope.pieData,
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    };


    


});