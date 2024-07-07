var product = angular.module("productApp", []);
product.controller("productCtrl", function ($scope, $http, $timeout) {

    $scope.produt = {}
    $scope.productUpdate = {}

    var formProduct = new bootstrap.Modal(document.getElementById('formProduct'));
    var formProductEdit = new bootstrap.Modal(document.getElementById('formProductEdit'));

    

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

    $scope.deleteProduct = function (data) {

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $http({
                    method: "POST",
                    data: data,
                    url: "product_delete.php",
                }).then(
                    function successCallback(response) {
                        if (response.data.success) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            }).then(()=>{window.location.reload()});

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
                    })  
            }else{}
        });
    };

    $scope.editProduct = function (data) {


        if (data != undefined) {
            $scope.productUpdate.id = data.product_id;
            $scope.productUpdate.name = data.product_name;
            $scope.productUpdate.price = data.product_price;
            $scope.productUpdate.unit = data.product_unit;
            $scope.productUpdate.category = data.category_name;
            $scope.productUpdate.category = data.category;
            console.log($scope.productUpdate);
            formProductEdit.show();
        }

        if (data == undefined) {
            formProductEdit.hide();
            console.log($scope.productUpdate)
            $http({
                method: "POST",
                data: $scope.productUpdate,
                url: "product_update.php",
            }).then(
                function successCallback(response) {
                    if (response.data.success) {

                        Swal.fire({
                            title: response.data.success,
                            text: "",
                            icon: "success",
                        }).then(function () {
                            window.location.reload();
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
        }
    };







});