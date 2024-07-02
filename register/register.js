var registerApp = angular.module('registerApp' , []);
registerApp.controller('registerCtrl' , function($scope , $http){
   

    $scope.user = {}

    $scope.registerSubmit = function(){

        $scope.errorMessage = '';
        $scope.successMessage = '';
        
         var regex = /^[a-zA-Z0-9]+$/;
         if (!regex.test($scope.user.username) || !regex.test($scope.user.password)) {
            $scope.errorMessage = 'Username and password must contain only letters (a-z) and numbers (0-9).';
            return;
        } if ($scope.user.username.length < 5 || $scope.user.password.length < 5) {
            $scope.errorMessage = 'Username and password must be at least 5 characters long.';
            return
        } if($scope.user.username.trim() === '' || $scope.user.password.trim() === '') {
            $scope.errorMessage = 'Username and password don`t need space';
            return
        }
        

        $http({
            method:'post',
            url:'register.php',
            Headers : '',
            data:$scope.user
        }).then(function successCallback(response){
            $scope.successMessage = response.data.data
      

        } , function errorCallback(response){

        });

    }
})
