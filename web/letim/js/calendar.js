/**
 * Created by Колюха on 12.08.14.
 */
var app = angular.module('calendarApp', [])
    .controller('CalendarController', ['$scope', '$filter', '$http', '$timeout', function($scope, $filter, $http, $timeout) {
        var date = new Date(),
            start = startDayInWeek(date);
        $scope.thisDate = "";
        function dayInWeek(date) {
            var day = date.getDay();
            $scope.currentDate = day === 0 ? 6: day - 1;
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

            //$scope.selets = select(weekArray);
            //console.log($scope.selets);
            return weekArray;
        }
        function init(date) {
            var start = startDayInWeek(date);
            return fillWeek(start);
        }
        function setMinutsOfWeek(week, data) {
            var i = 0, j = 0;
            while(i < 23) {
                if(data[i]) {
                    week.hoursArray[j].first = data[i];
                }
                i += 1;
                if(data[i]) {
                    week.hoursArray[j].last = data[i];
                    //console.log(week.hoursArray[j].last);
                }
                //console.log(week.hoursArray[j]);
                i += 1;
                j += 1;
            }
        }

        $scope.getDuration = function (arr) {
            var i, result = 0;
            if(arr) {
                for(i = 0; i < arr.length; i += 1) {
                    result = result + arr[i].duration;
                }
            }
            return result;
        }

        function setMinutes (data) {
            var i = 0;
            while(i <= 6) {
                if(data[i]) {
                    console.log(data[i]);
                    setMinutsOfWeek($scope.weekArray[i], data[i]);
                }
                i += 1;
            }
        }
        $scope.weekArray = fillWeek(start);
        mins();
        $scope.$watch('thisDate', function () {
            console.log($scope.thisDate);
        });

        $scope.$on('date', function (e, date) {
            var dArray = date.split('.'),
                str = new Date(dArray[2] + '-' + dArray[1] + '-' + dArray[0]);
            $scope.$apply(function () {
                    $scope.weekArray = init(str);
                    //$scope.currentDate = dayInWeek(str);
                }
            )
            mins(dArray[2] + '-' + dArray[1] + '-' + dArray[0]);
        });
        function mins (from) {
            $http({method: "POST",
                data: {from: from},
                url: '/calender/gettunels'}).
                success(function(data, status) {
                    $scope.status = status;
                    $scope.data = data;
                    setMinutes(data['data']);
                    console.log(data);
                }).
                error(function(data, status) {
                    $scope.data = data || "Request failed";
                    $scope.status = status;
                });
        }

        function getPlan(typeid, maxpeople) {
            var obj = {
                typeid: typeid,
                maxpeople: maxpeople  || 1
            };
            if(typeid) {
                $http({method: "POST",
                    data: obj,
                    url: '/bronirovanie/plan'}).
                    success(function(data, status) {
                        if(data) {
                            $scope.plan = data;
                            $scope.notPlan = "false";
                        }
                    }).
                    error(function(data, status) {
                        $scope.data = data || "Request failed";
                        $scope.status = status;
                    });
            }
        }
        $scope.$watch('plan', function (val,old) {
            $scope.polet = '';
            if(val.length === 0) {
                $scope.notPlan = "true";
            }
        });
        $scope.$watch('maxpeople', function () {
            getPlan($scope.typeid, $scope.maxpeople);
        });
        $scope.$watch('typeid', function (val) {
            getPlan($scope.typeid, $scope.maxpeople);
        });
        $scope.setPolet = function (p) {
            $scope.polet = p;
            $scope.hideList = true;
        };
        $scope.hideList = true;
        $scope.toggle = function () {
            $scope.hideList = !$scope.hideList;
        };
        $scope.hideListH = true;
        $scope.toggleH = function () {
            $scope.hideListH = !$scope.hideListH;
        };
        $scope.filterFn = function (item) {
//            if() {
//
//            }
        }
        $scope.getUsers = function (){
            var i = 0,
                result = [];
            if($scope.maxpeople) {
                while(i < $scope.maxpeople) {
                    i += 1;
                    result.push(i);
                }
            }
            return result;
        };
        $scope.setTimePolet = function (t, first) {
            //var minutes = first :l;
            $scope.timePolet = $scope.weekArray[$scope.currentDate].date;
            $scope.timePolet.setHours(t.hour);
            $scope.timePolet.setMinutes();
        };
    }])
    .controller('BronController', ['$scope', '$filter', '$http', function($scope, $filter, $http) {
        $scope.$on('date', function (e, date) {
            console.log(date);
        });
    }]);