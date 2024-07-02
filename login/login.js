var loginApp = angular.module('loginApp' , []);
loginApp.controller('loginCtrl' , function($scope , $http){

    $scope.errorMessage = '';
    $scope.successMessage = '';
    $scope.user = {};
  

    $scope.loginSubmit = function(){

         var regex = /^[a-zA-Z0-9]+$/;
         if (!regex.test($scope.user.username) || !regex.test($scope.user.password)) {
            $scope.errorMessage = 'Username and password must contain only letters (a-z) and numbers (0-9).';
            return;
        } if($scope.user.username.trim() === '' || $scope.user.password.trim() === '') {
            $scope.errorMessage = 'Username and password don`t need space';
            return
        }
        
        $http({
            method:'post',
            url:'login.php',
            Headers : '',
            data:$scope.user
        }).then(function successCallback(response){
            $scope.successMessage = response.data.success;
            $scope.errorMessage = response.data.faild;
          
           
        } , function errorCallback(response){});

    }


})
