<?php
session_start();
if (!isset($_SESSION["username"]) && !isset($_SESSION['user_id'])) {
    header("location: ../login-register/indexlogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en" ng-app="categoryApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="category.js"></script>

    <!-- jquery & DataTable -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.1.0/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css"> 
    <link rel="stylesheet" href="  https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">



</head>

<body ng-controller="categoryCtrl">

    <?php require 'navbar.php'; ?>

    <div class="row d-flex justify-content-center" ng-init="getCategory()">
        <div class="col-md-8">
            <form class="border mt-5 p-3" ng-submit="categorySubmit()">
                <h4 class="">ADD Categories</h4>
                <hr>
                <input class="form-control" type="text" required placeholder="Categories.." ng-model="category.name">
                <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>
            </form>
        </div>


        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-8">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-hover table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>CategoryID</th>
                                <th>CategoryName</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="data in category_array">
                                <td>{{data.category_id}}</td>
                                <td>{{data.category_name}}</td>
                                <td><button class="btn btn-sm btn-warning" ng-click="editCategory(data)">Edit</button></td>
                                <td><button class="btn btn-sm btn-danger" ng-click="deleteCategory(data)">Del</button></td>
                            </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="formEditModal" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Categorire</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" ng-submit="editCategory()">        
                        <input class="form-control" type="text" required placeholder="Categories.."  ng-model="categoryUpdate.name" >
                        <button class="btn btn-sm btn-primary my-2" type="submit">Save</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    
</body>

</html>