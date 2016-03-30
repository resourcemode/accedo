angular.module('Accedo', [])

    .config(['$interpolateProvider', function ($interpolateProvider) {

        // Change start and end symbols to prevent clashes with Laravel syntax
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    }]);