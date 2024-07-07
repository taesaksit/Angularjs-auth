<?php
session_start();
if (!isset($_SESSION["username"]) && !isset($_SESSION['user_id'])) {
    header("location: ../login-register/indexlogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en" ng-app="product_typeApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="product_type.js"></script>




</head>

<body ng-controller="product_typeCtrl">

    <?php include '../pages/navbar.php'; ?>

    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <form class="border mt-5 p-3" ng-submit="productTypeSubmit()">
                <h4 class=" mt-5">ADD Product Type</h4>
                <hr>
                <input class="form-control" type="text" required placeholder="Product type..." ng-model="product_type.name">
                <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>
            </form>
        </div>


        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-10">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" style="width:100%" ng-init="getProductType()">
                        <thead>
                            <tr>
                                <th style="width:10%">ID</th>
                                <th style="width:30%">Product_type</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="data in product_type_array">
                                <td>{{data.type_id}}</td>
                                <td>{{data.type_name}}</td>
                                <td><button class="btn btn-warning">Edit</button></td>
                                <td><button class="btn btn-danger">Del</button></td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>







</body>

</html>