(function () {
"use strict";
    var app = angular.module("sumUp", []);

    app.controller("SumController", function($scope) {
        $scope.Math = window.Math;

        $scope.sumMeUp = function() {
            var total = 0;
            $scope.number.split('').forEach(function(num) {
                if (parseInt(num)) {
                    total += parseInt(num);
                }
            });
            return total;
        }
    })
})();
