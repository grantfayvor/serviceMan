var map;
var marker;
var pos;
var address;

var app = angular.module('mechanic', []);

app.config(['$httpProvider', '$interpolateProvider', function ($httpProvider, $interpolateProvider) {

    $interpolateProvider.startSymbol('<%').endSymbol('%>');

    $httpProvider.defaults.headers.common['Accept'] = "application/json";
    $httpProvider.defaults.headers.common['Content-Type'] = "application/json";
    $httpProvider.defaults.useXDomain = true;

}]);

app.factory('PaceFactory', ['$window', function($window){
    if(!$window.Pace){
        $window.Pace = {};
    }
    return $window.Pace;
}]);

// app.directive('datetimez', function() {
//     return {
//         restrict: 'A',
//         require : 'ngModel',
//         link: function(scope, element, attrs, ngModelCtrl) {
//           element.datetimepicker({
//             dateFormat:'dd-MM-yyyy',
//            language: 'en',
//            pickTime: false,
//            startDate: '01-11-2013',      // set a minimum date
//            endDate: '01-11-2030'          // set a maximum date
//           }).on('changeDate', function(e) {
//             ngModelCtrl.$setViewValue(e.date);
//             scope.$apply();
//           });
//         }
//     };
// });

app.directive('msDatePicker', function() {
    var date = new Date();
    var dd = date.getDate();
    var mm = date.getMonth() + 1;
    var yyyy = date.getFullYear();
    if(dd < 10) {
        dd = '0' +dd;
    }
    if(mm < 10) {
        mm = '0' +mm;
    }
    return {
        restrict : 'A',
        require : 'ngModel',
        link : function(scope, element, attrs, ngModelCtrl) {
            var datepicker = element.datepicker({
                dateFormat: 'dd-MM-yyyy',
                language: 'en',
                startDate : dd +'/' +mm +'/' +yyyy,
                showTodayButton : true 
            });
            datepicker.on('changeDate', function(e) {
                ngModelCtrl.$setViewValue(e.date);
                scope.$apply();
            });
        }
    };
});