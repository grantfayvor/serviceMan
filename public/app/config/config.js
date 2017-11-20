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
