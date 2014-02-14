var jobApp = angular.module('jobApp', []),
    weekDay;

jobApp.controller('jobCtrl', function($scope, $http) {

    $scope.weekDay   = weekDay;
    $scope.date      = new Date();
    $scope.dayInWeek = $scope.date.getDay();

    $scope.init = function() {
        $scope.getTimes();
    };

    $scope.getTimes = function() {

        $http({method: 'GET',url: 'times.json'})
            .success(function(data) {

                $scope.allWeeks = data;

                /* This week */
                if (weekDay % 3 == 0) {
                    $scope.week = data[0];
                } else if (weekDay % 2 == 0) {
                    $scope.week = data[1];
                } else {
                    $scope.week = data[2];
                }

                /* Next Week */
                if ((weekDay+1) % 3 == 0) {
                    $scope.nextWeek = data[0];
                } else if ((weekDay+1) % 2 == 0) {
                    $scope.nextWeek = data[1];
                } else {
                    $scope.nextWeek = data[2];
                }
            }).error(function() {
                alert('Fehler beim Laden der times.json');
            });
    };

});