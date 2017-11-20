app.controller("UserController", ['$scope', 'UserService', function ($scope, UserService) {

    $scope.new_user = {};
    $scope.passwordMatch = true;
    $scope.users = [];
    $scope.mechanics = [];
    $scope.admins = [];

    $scope.getAllUsers = function () {
        UserService.getAllUsers(function (response) {
            $scope.users = response.data;
        }, function (response) {
            console.log("error fetching users " + response.data);
        });
    };

    $scope.getAllMechanics = function () {
        UserService.getAllMechanics(function (response) {
            $scope.mechanics = response.data;
        }, function (response) {
            console.log("error in fetching mechanics " + response.data);
        });
    };

    $scope.getAllAdmins = function () {
        UserService.getAllAdmins(function (response) {
            $scope.admins = response.data;
        }, function (response) {
            console.log("error in fetching mechanics " + response.data);
        });
    };

    $scope.deleteUser = function () {
        UserService.deleteUser($scope.userToDelete, function (response) {
            console.log("user was successfully deleted");
            $('#deleteModal').modal('hide');
            $scope.getAllUsers();
        }, function (response) {
            console.log("error in deleting the user");
        });
    };

    $scope.deleteMechanic = function () {
        UserService.deleteMechanic($scope.mechanicToDelete, function (response) {
            console.log("mechanic was successfully deleted");
            $('#deleteModal').modal('hide');
            $scope.getAllMechanics();
        }, function (response) {
            console.log("error in deleting the mechanic " + response.data);
        });
    };

    $scope.deleteAdmin = function () {
        UserService.deleteUser($scope.adminToDelete, function (response) {
            console.log("admin was successfully deleted");
            $('#deleteModal').modal('hide');
            $scope.getAllAdmins();
        }, function (response) {
            console.log("error in deleting the user");
        });
    };

    $scope.deleteUserModal = function (userId) {
        $('#deleteModal').modal('show');
        $scope.userToDelete = userId;
    };

    $scope.deleteMechanicModal = function (userId) {
        $('#deleteModal').modal('show');
        $scope.mechanicToDelete = userId;
    };

    $scope.deleteAdminModal = function (userId) {
        $('#deleteModal').modal('show');
        $scope.adminToDelete = userId;
    };

    $scope.confirmPassword = function () {
        $scope.passwordMatch = $scope.new_user.password == $scope.new_user.confirmPassword;
    };

}]);

app.service("UserService", ['APIService', function (APIService) {

    this.getAllUsers = function (successHandler, errorHandler) {
        APIService.get('/api/users', successHandler, errorHandler);
    };

    this.getAllMechanics = function (successHandler, errorHandler) {
        APIService.get('/api/mechanics', successHandler, errorHandler);
    };

    this.getAllAdmins = function (successHandler, errorHandler) {
        APIService.get('/api/admins', successHandler, errorHandler);
    };

    this.deleteUser = function (userId, successHandler, errorHandler) {
        APIService.delete('/api/user/delete?id=' + userId, successHandler, errorHandler);
    };

    this.deleteMechanic = function (userId, successHandler, errorHandler) {
        APIService.delete('/api/mechanic/delete?id=' + userId, successHandler, errorHandler);
    };

}]);