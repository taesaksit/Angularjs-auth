var registerApp = angular.module('registerApp' , []);
registerApp.controller('registerCtrl' , function($scope , $http){
    $scope.msg = 'Test';

    $scope.user = {}

    $scope.registerSubmit = function(){

        $http({
            method:'post',
            url:'register.php',
            Headers : '',
            data:$scope.user
        }).then(function successCallback(response){
            alert(response.data)

        } , function errorCallback(response){

        });

    }
})
