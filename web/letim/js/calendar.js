/**
 * Created by Колюха on 12.08.14.
 */
var app = angular.module('calendarApp', [])
    .controller('CalendarController', ['$scope', '$filter', function($scope, $filter) {
        var date = new Date(),
            start = startDayInWeek(date);
        $scope.thisDate = "";
        function dayInWeek(date) {
            var day = date.getDay();
            console.log(day);
            return day;
        }
        function startDayInWeek(date) {
            var numberInWeek = dayInWeek(date) || 7,
                startDay = date.setDate(date.getDate() - numberInWeek);
                //console.log(startDay);
                return date;
        }
        function getHours(startHour, endHour) {
            var hoursArray = [];
            while(startHour < endHour) {
                hoursArray.push({
                        'hour' : startHour,
                        'first' : [],
                        'last' : []
                    }
                );
                startHour += 1;
            }
            return hoursArray;
        }
        function fillWeek(startMonday) {
            var i = 0,
                weekArray = [];
            while (i < 7) {
                //console.log(getHours(11, 23));
                weekArray.push({
                    date : startMonday.setDate(startMonday.getDate() + 1),
                    hoursArray : getHours(11, 23)
                });
                i += 1;
            }
            console.log(startMonday.getDate());
            return weekArray;
        }
        function init(date) {
            var start = startDayInWeek(date);
            return fillWeek(start);
        }
        $scope.a = function(e) {
            console.log(e);
        }
        $scope.weekArray = fillWeek(start);
        console.log($scope.weekArray[0].hoursArray);
        $scope.$watch('thisDate', function () {
            console.log($scope.thisDate);
        });
        $scope.$on('date', function (e, date) {
            var dArray = date.split('.'),
                str = new Date(dArray[2] + '-' + dArray[1] + '-' + dArray[0]);
            $scope.$apply(function () {
                    $scope.weekArray = init(str);
                }
            )
        });
    }]);