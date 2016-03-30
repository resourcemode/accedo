/**
 * Login
 *
 * @author  Michael <resourcemode@yahoo.com>
 */
angular.module('Accedo')

/**
 * Controller used in Login Page
 */
.controller('LoginController', ['$scope', '$http', function ($scope, $http) {
    $scope.login = { };

    /**
     * On form submit
     */
    $scope.submit = function() {
        login($scope.login);
    };

    /**
     * Login post action
     *
     * @param loginData
     */
    var login = function(loginData) {
        $http.post('/login', loginData).
        success(function(data) {
            window.location.href = "/";
        }).
        error(function(data) {
            swal('whoops', 'Wrong email and password combination.', 'warning');
        });
    };
}]);