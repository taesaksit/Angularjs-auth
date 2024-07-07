var product_type = angular.module("product_typeApp", []);
product_type.controller("product_typeCtrl", function ($scope, $http, $timeout) {

    $scope.product_type = {};
    $scope.message_success = "";
    $scope.message_error = "";




    $scope.getProductType = function () {

        $http({
            method: "POST",
            url: "get_product_type.php",
        }).then(
            function successCallback(response) {
                // $scope.product_type_array = [];
                $scope.product_type_array = response.data;
                
                $timeout(() => {
                    $("#example").DataTable().destroy();
                    $("#example").DataTable();
                }, 0)
            },
            function errorCallback(response) {

            }
        );
    };

    $scope.productTypeSubmit = function () {
        $http({
            method: "POST",
            url: "product_type.php",
            data: $scope.product_type,
        }).then(
            function successCallback(response) {
                if (response.data.success) {
                    $scope.product_type = {};
    
                    Swal.fire({
                        title: response.data.success,
                        text: "",
                        icon: "success",
                    }).then(() => {
                        $scope.getProductType();
    
                        // Destroy and reinitialize DataTables
                        $timeout(() => {
                            $("#example").DataTable().destroy();
                            $("#example").DataTable();
                        }, 0);
                    });
    
                } else {
                    Swal.fire({
                        title: response.data.error,
                        text: "Please wait a moment",
                        icon: "error",
                    });
                }
            },
            function errorCallback(response) {
                console.log("Error response: ", response);
                $scope.message_error = "An error occurred. Please try again.";
            }
        );
    };
    

});
