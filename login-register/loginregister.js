var loginregisterApp = angular.module("loginregisterApp", []);


loginregisterApp.controller("registerCtrl", function ($scope, $http) {
  $scope.user = {};
 
  $scope.registerSubmit = function () {

    $scope.errorMessage = "";
    $scope.successMessage = "";
    var regex = /^[a-zA-Z0-9]+$/;
    // Check null
    if ($scope.user.username == undefined || $scope.user.password == null) {
      $scope.errorMessage = "Username or password undefiend.";
      console.log($scope.user.password);
      return;
    }
    // check char > 5
    if ($scope.user.username.length < 5 || $scope.user.password.length < 5) {
      $scope.errorMessage =
        "Username and password must be at least 5 characters long.";
      return;
    }
    // check special letters
    if (
      !regex.test($scope.user.username) ||
      !regex.test($scope.user.password)
    ) {
      $scope.errorMessage = "Username and password must contain only letters (a-z) and numbers (0-9).";

      return;
    }

    $http({
      method: "POST",
      url: "register.php",
      Headers: "",
      data: $scope.user,
    }).then(
      function successCallback(response) {
        $scope.successMessage = response.data.data;
      },
      function errorCallback(response) {
        console.log(response);
      }
    );
  };


});

loginregisterApp.controller("loginCtrl", function ($scope, $http, $window, $timeout) {
  
  $scope.user = {};
 

  $scope.loginSubmit = function () {

    $scope.errorMessage = "";
    $scope.successMessage = "";

    var regex = /^[a-zA-Z0-9]+$/;
    if ($scope.user.username == undefined) {
      $scope.errorMessage = "Username or password undefiend.";
      return;
    }
    if (!regex.test($scope.user.username) || !regex.test($scope.user.password)) {
      $scope.errorMessage ="Username and password must contain only letters (a-z) and numbers (0-9).";
      return;
    }

    $http({
      method: "post",
      url: "login.php",
      Headers: "",
      data: $scope.user,
    }).then(
      function successCallback(response) {
        if (response.data.success) {
          $scope.successMessage = response.data.success;

          $timeout (()=>{
            $window.location.href = '../index.php';
          },1000)

        } else {
          $scope.errorMessage = response.data.faild;
        }
      },
      function errorCallback(response) {
        console.log(response);
      }
    );
  };
});