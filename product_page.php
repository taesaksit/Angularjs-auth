<?php
session_start();
if (!isset($_SESSION["username"]) && !isset($_SESSION['user_id'])) {
    header("location: ../login-register/indexlogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en" ng-app="productApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="product.js"></script>

    <!-- jquery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.1.0/dist/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="  https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">



</head>

<body ng-controller="productCtrl">

    <?php require 'navbar.php'; ?>

  

    <div class="row d-flex justify-content-center mt-5">
        <div class="col-md-8">
            <div class="table-responsive">
                <table id="dataTableProduct" class="table table-hover table-striped" style="width:100%" ng-init="getProduct()">
                    <thead>
                        <tr>
                            <th>ProductID</th>
                            <th>ProductName</th>
                            <th>Price</th>
                            <th>Unit</th>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="data in product_array">
                            <td>{{data.product_id}}</td>
                            <td>{{data.product_name}}</td>
                            <td>{{data.product_price}}</td>
                            <td>{{data.product_unit}}</td>
                            <td>{{data.category_name}}</td>
                            <td><button class="btn btn-sm btn-warning" ng-click="editCategory(data)">Edit</button></td>
                            <td><button class="btn btn-sm btn-danger" ng-click="deleteCategory(data)">Del</button></td>
                        </tr>
                        <button type="button" class="btn btn-primary" ng-click="productSubmit()" >Add Product</button>
                </table>
            </div>
        </div>

    </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="formProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ADD Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" ng-submit="productSubmit()">
                        <div class="mb-2">
                            <label for="" class="form-label">ProductName</label>
                            <input class="form-control" type="text" required ng-model="product.name">
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Price</label>
                            <input class="form-control" type="number" min="1" required ng-model="product.price">
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Unit</label>
                            <input class="form-control" type="number" min="1" required ng-model="product.unit">
                        </div>

                        <div class="mb-2" ng-init="getCategory()">
                            <label for="" class="form-label">Category</label>
                            <select class="form-select" ng-model="product.category" required>
                                <option value="">--Select an option--</option>
                                <option ng-repeat="data in category_array" ng-value="data.category_id">{{data.category_name}}</option>

                            </select>
                        </div>
                        <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>

</html>