app.run(['$http', '$rootScope', function ($http, $rootScope) {
    /*$http.get('/api/user/getLocation')
        .then(function (response) {
            $rootScope.userLocation = response.data;
        }, function (response) {
            console.log('user location is not set ' + response);
        });*/
}]);

app.controller('ReservationController', ['$rootScope', '$scope', 'ReservationService', function ($rootScope, $scope, ReservationService) {

    $scope.new_reservation = {};
    $scope.editedReservation = {};
    $scope.reservations = [];
    $scope.page = "reservations";


    $scope.run = function (){
        ReservationService.getUserLocation(function (response) {
            $scope.new_reservation.location = response.data;
        }, function (response) {
            console.log('user location is not set ' + response);
        });
    };

    $scope.run();


    $scope.newReservation = function () {
        // $scope.new_reservation.date = document.getElementById('datepicker');
        // Pace.start;
        ReservationService.newReservation($scope.new_reservation, function (response) {
            $('#createModal').modal('show');
        }, function (response) {
            console.log(response);
        });
    };

    $scope.myReservations = function () {
        ReservationService.myReservations(function (response) {
            $scope.reservations = response.data;
            console.log($scope.reservations);
        }, function (response) {

        });
    };

    $scope.openReservations = function () {
        ReservationService.openReservations(function (response) {
            $scope.reservations = response.data;
        }, function (response) {

        });
    };

    $scope.mechanicReservations = function () {
        ReservationService.mechanicReservations(function (response) {
            $scope.reservations = response.data;
        }, function (response) {

        });
    };

    $scope.acceptReservation = function () {
        ReservationService.acceptReservation($scope.reservationIdToUpdate, function (response) {
            $('#acceptModal').modal('hide');
            console.log("reservation accepted");
            window.location.href = "/my-reservations";
        }, function (response) {

        });
    };

    $scope.updateReservation = function () {
        ReservationService.updateReservation($scope.editedReservation, function (response) {
            console.log("result has been updated");
        }, function (response) {

        });
    };

    $scope.declineReservation = function () {
        ReservationService.declineReservation($scope.declineDetails.reservationId,
            $scope.declineDetails.mechanicId, $scope.declineDetails.customerEmail,
            function (response) {
                $('#declineModal').modal('hide');
                console.log("reservation has been declined");
                $scope.mechanicReservations();
            }, function (response) {

            });
    };

    $scope.deleteReservation = function (reservationId) {
        ReservationService.deleteReservation(reservationId, function (response) {
            console.log("result has been deleted");
        }, function (response) {

        });
    };

    $scope.getAllReservations = function () {
        ReservationService.getAllReservations(function (response) {
            $scope.reservations = response.data;
        }, function (response) {

        });
    };

    $scope.editPage = function (reservation) {
        $scope.page = "edit";
        $scope.editedReservation = reservation;
    };

    $scope.discardReservation = function () {
        $scope.new_reservation = {};
        window.location.href = "/dashboard";
    };

    $scope.acceptModal = function (reservationId) {
        $('#acceptModal').modal('show');
        $scope.reservationIdToUpdate = reservationId;
    };

    $scope.declineModal = function (reservationId, mechanicId, customerEmail) {
        $('#declineModal').modal('show');
        $scope.declineDetails = {
            'reservationId': reservationId,
            'mechanicId': mechanicId,
            'customerEmail': customerEmail
        };
    };
}]);

app.service('ReservationService', ['APIService', function (APIService) {

    this.newReservation = function (reservationDetails, successHandler, errorHandler) {
        APIService.post('/api/reservation/create', reservationDetails, successHandler, errorHandler);
    };

    this.myReservations = function (successHandler, errorHandler) {
        APIService.get('/api/reservations', successHandler, errorHandler);
    };

    this.updateReservation = function (reservation, successHandler, errorHandler) {
        APIService.put('/api/reservation/update?id=' + reservation.id, {}, reservation, successHandler, errorHandler);
    };

    this.acceptReservation = function (reservationId, successHandler, errorHandler) {
        APIService.put('/api/reservation/accept?reservationId=' + reservationId, {}, successHandler, errorHandler);
    };

    this.deleteReservation = function (reservationId, successHandler, errorHandler) {
        APIService.delete('/api/reservation/delete?id=' + reservationId, successHandler, errorHandler);
    };

    this.openReservations = function (successHandler, errorHandler) {
        APIService.get('/api/reservations/open', successHandler, errorHandler);
    };

    this.mechanicReservations = function (successHandler, errorHandler) {
        APIService.get('/api/reservations/mechanic', successHandler, errorHandler);
    };

    this.declineReservation = function (reservationId, mechanicId, customerEmail, successHandler, errorHandler) {
        APIService.put('/api/reservation/decline?reservationId=' + reservationId + "&mechanicId=" + mechanicId + "&customerEmail=" + customerEmail, {}, successHandler, errorHandler);
    };

    this.getAllReservations = function (successHandler, errorHandler) {
        APIService.get('/api/all-reservations', successHandler, errorHandler);
    };

    this.getUserLocation = function (successHandler, errorHandler) {
        APIService.get('/api/user/getLocation', successHandler, errorHandler);
    };
}]);

