/**
 * Created by Колюха on 12.08.14.
 */
var app = angular.module('calendarApp', ['LocalStorageModule'])
    .controller('CalendarController', ['$scope', '$filter', '$http', '$timeout', '$location','localStorageService', function($scope, $filter, $http, $timeout, $location, localStorageService) {
        var date = new Date(),
            start = startDayInWeek(date);
        $scope.thisDate = "";
        function dayInWeek(date) {
            var day = date.getDay();
            $scope.currentDate = day === 0 ? 6: day - 1;
            console.log(day);
            return day;
        }
        //console.log(localStorageService.get('tipeid'));
        if (localStorageService.get('tipeid')) {
            $scope.typeid = localStorageService.get('tipeid');
        }

        function startDayInWeek(date) {
            var numberInWeek = dayInWeek(date) || 7,
                startDay = date.setDate(date.getDate() - numberInWeek);
                //console.log(startDay);
                return date;
        }
        function getDecimal(num) {
            return num % 1;
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
            var i = 0, j = 0,k,val;
            while(i < 23) {

                if(data[i]) {
                    week.hoursArray[j].first = data[i];
                }

                if(data[i]) {
                    val = ($scope.getDuration(data[i])/30)^0;
                    if(val > 1) {
                        k = 0;
                        console.log(val);
                        while(k < val) {
                            //console.log(k);
                            if(k < val) {
                            week.hoursArray[j].first = data[i];
                            //i += 1;
                            k += 1;
                            }
                            if(k < val) {
                            week.hoursArray[j].last = data[i];
                            //i += 1;
                            k += 1;
                            j += 1;
                            }
                        }
                        i = i + k;
                    }

                }
                i += 1;
                if(data[i]) {
                    week.hoursArray[j].last = data[i];
                }

                //j += 1;
                if(data[i]) {
                val = ($scope.getDuration(data[i])/30)^0;
                    if(val > 1) {
                        k = 0;
                        console.log(val);
                        while(k < val) {
                            console.log(k);
                            if(k < val) {
                                week.hoursArray[j].first = data[i];
                                //i += 1;
                                k += 1;
                            }
                            if(k < val) {
                            week.hoursArray[j].last = data[i];
                            //i += 1;
                            k += 1;
                            j += 1;
                            }

                        }
//                        week.hoursArray[j].first = data[i];
//                        i += 1;
//                        i = i + k;
                    }

                }
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
                if(data && data[i]) {
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
            $scope.dataArr = dArray;
            $scope.timePolet = false;
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
                            //$scope.maxpeople = '';
                            setDefaultPlan($scope.plan);
                            $scope.MP = findMax($scope.plan);
                            $scope.notPlan = "false";
                            //console.log($scope.MP.maxpeople);
//                            if(!$scope.MP.maxpeople) {
//                                $scope.maxpeople = '';
//                            }
                        }
                    }).
                    error(function(data, status) {
                        $scope.data = data || "Request failed";
                        $scope.status = status;
                    });
            }
        }
        $scope.$watch('plan', function (val,old) {
            $scope.polet = $scope.polet || '';
            if(val && val.length === 0) {
                $scope.notPlan = "true";
            }
        });
        function setDefaultPlan(plans) {
            var i, planid;
            if (localStorageService.get('planid')) {
                planid = localStorageService.get('planid');
                for(i = 0; i < plans.length; i += 1) {
                    if(plans[i].id === parseInt(planid)) {
                        $scope.polet = plans[i];
                    }
                }
            }
            console.log('maxpeople');
            if (localStorageService.get('maxpeople')) {
                console.log('maxpeople');
                console.log(localStorageService.get('maxpeople'));
                $scope.maxpeople = localStorageService.get('maxpeople');
            }
            if($scope.cashClear) {
                localStorageService.clearAll();
            }

        };
        function findMax(arr) {
            var i, max = 0;
            for(i = 0; arr.length > i; i += 1) {
                if(max < arr[i].maxPeople) {
                    max = arr[i].maxPeople;
                }
            }
            return max;
        }
        $scope.$watch('maxpeople', function () {
            getPlan($scope.typeid, $scope.maxpeople);
            if($scope.client) {
                $scope.client.splice($scope.maxpeople, $scope.client.length);
            }

            $scope.getUsers();
        });
        $scope.$watch('MP', function (val, oldval) {
            var i = 0, people = [];
            if(val) {
                console.log(val);
                while(i < val) {
                    i += 1;
                    people[i-1] = i;
                }
                $scope.people = people;
                //console.log(people);
            }
        });
        $scope.setMaxpeople = function(p) {
            $scope.maxpeople = p;
            $scope.humanList = true;
        }

        $scope.$watch('typeid', function (val) {
            getPlan($scope.typeid, $scope.maxpeople);

            $scope.polet = '';
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
        $scope.humanList = true;
        $scope.toggleHuman = function () {
            $scope.humanList = !$scope.humanList;
        };
        $scope.filterFn = function (item) {
//            if() {
//
//            }
        }
        $scope.getUsers = function (){
            var i = 0,
                result = $scope.client || [];
            if($scope.maxpeople) {
                while(i < $scope.maxpeople) {
                    if(!result[i]) {
                        result[i] = {};
                    }
                    $scope.client = result;
                    i += 1;
                }
            }
            return result;
        };
        $scope.clientValid = false;
        $scope.$watch('client', function (val, old) {
            $scope.clientValid = false;
            if($scope.client && $scope.client[0].name && $scope.client[0].email && $scope.client[0].phone) {
                $scope.clientValid = true;
            }
        },true);
        $scope.setTimePolet = function (t, min, duration) {
            //var minutes = first :l;
            //$scope.weekArray[$scope.currentDate].date
            min = min || 0;
            duration = parseInt(duration) ||0;
            console.log(duration);
            var d = new Date($scope.dataArr[2], $scope.dataArr[1]-1, $scope.dataArr[0], t.hour, min + duration);
            //console.log($scope.dataArr);
            $scope.timePolet = d;
            $scope.hideListH = true;
        };
        $scope.sendBronForm = function () {
            var obj = {};
            obj.date = $filter('date')($scope.timePolet, "yyyy-MM-d HH:mm");
            obj.plan_id = $scope.polet.id;
            obj.client = $scope.client;
            $http({method: "POST",
                data: obj,
                url: '/bronirovanie/save'}).
                success(function(data, status) {
                    if(data && data.sucses) {
                        window.location.href = '/save_succes';
                    }
//                    window.location.href = "/";
                }).
                error(function(data, status) {
                    $scope.data = data || "Request failed";
                    $scope.status = status;
                });
        };
        $scope.goTo = function (url) {
            window.location.href = url;
        }
        $scope.months = ["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"];
//        $scope.red = function () {
//            //window.location.href = "/";
//        }
    }])
    .controller('BronController', ['$scope', '$filter', '$http', function($scope, $filter, $http) {
        $scope.$on('date', function (e, date) {
            console.log(date);
        });
    }])
    .controller('tarif', ['$scope', '$filter', '$http', '$timeout', 'localStorageService', function($scope, $filter, $http, $timeout, localStorageService) {
        localStorageService.clearAll();
        $scope.setTypeId = function (tipeid) {
            localStorageService.set('tipeid', tipeid);
        };
        $scope.setPlanId = function (planid) {
            localStorageService.set('planid', planid);
        };
        $scope.setMaxpeople = function (maxpeople) {
            localStorageService.set('maxpeople', maxpeople);
        };
    }]);