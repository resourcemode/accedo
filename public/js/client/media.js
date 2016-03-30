/**
 * Media
 *
 * @author  Michael <resourcemode@yahoo.com>
 */
angular.module('Accedo')

    /**
     * Controller used in Login Page
     */
    .controller('MediaController', ['$scope', '$compile', '$http', function ($scope, $compile, $http) {

        $scope.media = { };

        $scope.title = 'Trending Videos';

        /**
         * On page load load the media
         */
        $scope.loadMedia = function() {
            getMedia();
        };

        /**
         * Get list of media
         */
        var getMedia = function() {
            $http.get('/media').
            success(function(response, status) {
                $scope.media = response.data.entries;
            }).
            error(function(response, status) {
                console.log({ message:response, status: status});
                swal('whoops', 'Something went wrong while trying to get the list of media!', 'warning');
            }).then(function(response) {
                $scope.loadingIsDone = true;
            });
        };

        $scope.onHistory = function() {
            $scope.media = {};
            $scope.title = 'Previously Watched';
            $('#mediaView').remove();
            getHistory();
        };
    }
]);
