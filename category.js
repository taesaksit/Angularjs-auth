var category = angular.module("categoryApp", []);
category.controller("categoryCtrl", function ($scope, $http, $timeout) {
    $scope.category = {};
    $scope.categoryUpdate = {};
    $scope.message_success = "";
    $scope.message_error = "";

    var formEditModal = new bootstrap.Modal(document.getElementById('formEditModal'));

    $scope.getCategory = function () {
        $http({
            method: "POST",
            url: "category_get.php",
        }).then(
            function successCallback(response) {
                $scope.category_array = response.data;
                setTimeout(() => {
                    $("#dataTable").DataTable().destroy();
                    $("#dataTable").DataTable({
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

    $scope.categorySubmit = function () {
        $scope.category.name = $scope.category.name.replace(
            /[^\w\s\u0E00-\u0E7F]/gi,
            ""
        );

        $http({
            method: "POST",
            url: "category_insert.php",
            data: $scope.category,
        }).then(
            function successCallback(response) {
                if (response.data.success) {
                    $scope.category = {};

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
    };

    $scope.editCategory = function (data) {

        if (data != undefined) {
            $scope.categoryUpdate.id = data.category_id;
            $scope.categoryUpdate.name = data.category_name;
            console.log(data);
            formEditModal.show();
        }

        if (data == undefined) {
            formEditModal.hide();

            $http({
                method: "POST",
                data: $scope.categoryUpdate,
                url: "category_update.php",
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

    $scope.deleteCategory = function (data) {

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
                    url: "category_delete.php",
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


});
