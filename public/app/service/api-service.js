app.service('APIService', ['$http', '$q', function ($http, $q) {

    this.get = function (url, successHandler, errorHandler) {
        $http.get(url)
            .then(successHandler, errorHandler);
    };

    this.getWithHeader = function (url, headers, successHandler, errorHandler) {
        $http.get(url, headers)
            .then(successHandler, errorHandler);
    };

    this.post = function (url, data, successHandler, errorHandler) {
        $http.post(url, data)
            .then(successHandler, errorHandler);
    };

    this.postWithHeader = function (url, data, headers, successHandler, errorHandler) {
        $http.get(url, data, headers)
            .then(successHandler, errorHandler);
    };

    this.delete = function (url, successHandler, errorHandler) {
        $http.delete(url)
            .then(successHandler, errorHandler);
    };

    this.put = function (url, data, successHandler, errorHandler) {
        $http.put(url, data)
            .then(successHandler, errorHandler);
    };

    this.head = function (url, notifyMsg) {
        $http.head(url)
            .then(successHandler, errorHandler);
    };


}]);