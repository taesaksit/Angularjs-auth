var product = angular.module("productApp", []);
product.controller("productCtrl", function ($scope, $http, $timeout) {

    $scope.produt = {}
    var formProduct = new bootstrap.Modal(document.getElementById('formProduct'));

    

    $scope.getCategory = function () {
        $http({
            method: "POST",
            url: "category_get.php",
        }).then(
            function successCallback(response) {
                $scope.category_array = response.data;
            },
            function errorCallback(response) { }
        );
    };

    $scope.productSubmit = function () {
        formProduct.show()
        console.log($scope.product)
        $http({
            method: "POST",
            url: "product_insert.php",
            data: $scope.product
        }).then(
            function successCallback(response) {
                if (response.data.success) {
                    Swal.fire({
                        title: response.data.success,
                        text: "",
                        icon: "success",
                    }).then(()=>{
                        formProduct.hide()
                        $scope.product = {}
                        window.location.reload()
                    })
                }

            },
            function errorCallback(response) { }
        );
    };

    $scope.getProduct = function () {
        $http({
            method: "POST",
            url: "product_get.php",
        }).then(
            function successCallback(response) {
                $scope.product_array = response.data;
                setTimeout(() => {
                    $("#dataTableProduct").DataTable().destroy();
                    $("#dataTableProduct").DataTable({
                        lengthMenu: [10, 15, 25, 50],
                        language: {
                            lengthMenu: "Show _MENU_ Page",
                            zeroRecords: "No data available in table",
                            info: "Showing page _PAGE_ of _PAGES_",
                            infoEmpty: "No records available",
                            infoFiltered: "(filtered from _MAX_ total records)",
                        },
                    });
                });
            },
            function errorCallback(response) { }
        );
    };







});