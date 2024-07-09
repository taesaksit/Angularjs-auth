<?php
session_start();
if (!isset($_SESSION["username"]) && !isset($_SESSION['user_id'])) {
    header("location: login-register/indexlogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en" ng-app="dashboardApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="dashboard.js"></script>

    <!-- jquery & DataTable -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.1.0/dist/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css"> 
    <link rel="stylesheet" href="  https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body ng-controller="dashboardCtrl">

    <?php require 'navbar.php'; ?>

 
    <div class="row p-4  mt-5 shadow ">
  
        <div class="col-md-4" ng-init="getProductCountByCategory()"> 
          <canvas id="myPieChart"  ></canvas>
        </div>      
        <div class="col-md-4" ng-init="getAveragePriceProduct()"> 
          <canvas id="myPieChart2"  ></canvas>
        </div>   
        <div class="col-md-4 d-flex justify-content-center " ng-init="getHighPriceProduct()" > 
          <canvas id="myPieChart3" ></canvas>
        </div>   
    </div>



</body>

</html>