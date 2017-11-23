<!DOCTYPE html>
<html data-ng-app="mechanic">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mechanic Services | New Reservation</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">


    <style type="text/css"></style>
</head>

<body data-ng-controller="ReservationController" class="pace-done pace-done pace-done">
    <div class="pace  pace-inactive">
        <div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div class="pace  pace-inactive">
        <div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div class="pace  pace-inactive">
        <div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div class="pace  pace-inactive">
        <div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div class="pace  pace-inactive">
        <div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div class="pace  pace-inactive">
        <div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div class="pace  pace-inactive">
        <div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div class="pace  pace-inactive">
        <div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div class="pace  pace-inactive">
        <div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div class="pace  pace-inactive">
        <div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div class="pace  pace-inactive">
        <div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div class="pace  pace-inactive">
        <div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div class="pace  pace-inactive">
        <div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div class="pace  pace-inactive">
        <div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div class="pace  pace-inactive">
        <div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>
    <div class="pace  pace-inactive">
        <div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu" style="">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                                    <img alt="image" class="img-circle" src="{{ $photo }}" style="height:50px;width:50px;">
                                     </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ $username }}</strong>
                                     </span> <!-- <span class="text-muted text-xs block">Medical Sciences</span> --> <span class="label label-warning pull-right">{{ $accountType }}</span> </span> </a>

                        </div>
                        <div class="logo-element">
                            MS
                        </div>
                    </li>

                    <li>
                        <a href="/dashboard"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    <li class="active">
                        <a href="/make-reservation"><i class="fa fa-edit"></i> <span class="nav-label">Make Reservation</span></a>
                    </li>
                    <li>
                        <a href="/my-reservations"><i class="fa fa-eye"></i> <span class="nav-label">My Reservations</span></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-hourglass"></i> <span class="nav-label">Recent Activity</span></a>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg" style="min-height: 422px;">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message"> Welcome to Mechanic Services </span>
                        </li>

                        <li>
                            <a href="/logout">
                                    <i class="fa fa-power-off"></i> Log out
                                </a>
                        </li>
                    </ul>

                </nav>
            </div>

            <div class="wrapper wrapper-content">
                <div class="row">

                    <div class="col-lg-11 animated fadeInRight">
                        <div class="mail-box-header">
                            <div class="pull-right tooltip-demo">
                                <button data-ng-click="newReservation()" class="ladda-button btn btn-primary" data-style="expand-left" data-original-title="Submit"
                                    title="">
<i class="fa fa-save"></i>
<span class="ladda-label">Submit</span><span class="ladda-spinner"></span></button>


                                <!-- <a class="btn btn-danger btn-sm" data-ng-click="discardReservation()" data-toggle="tooltip" data-placement="top" title="" href="#" data-original-title="Discard"><i class="fa fa-times"></i> Discard</a> -->
                            </div>
                            <h2>New Reservation</h2>
                        </div>
                        <div class="mail-box">


                            <div class="mail-body">

                                <form class="form-horizontal" method="get">
                                    <div class="form-group"><label class="col-sm-3 control-label">Reservation Description</label>

                                        <div class="col-sm-6"><textarea class="form-control" data-ng-model="new_reservation.description" value=""
                                                type="text" placeholder="why do you need a mechanic" required=""></textarea></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-3 control-label">Reservation Location</label>
                                        <div class="col-sm-6"><input data-ng-model="new_reservation.location" placeholder="Where do you need the mechanic?"
                                                                     name="text" class="form-control" value="" required=""></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-3 control-label">When do you need the mechanic</label>
                                        <div class="col-sm-6"><input data-ng-model="new_reservation.date" placeholder="select reservation date - mm/dd/yyy"
                                                name="daterange" class="form-control" value="" required=""></div>
                                    </div>
                                </form>

                            </div>

                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
            </div>
            <!--modal-->
			<div id="createModal" class="modal fade" aria-hidden="false" tabindex="-1" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title">Success</h4>
						</div>
						<div class="modal-body">
							<div class="form-group"><label>The reservation was successful</label></div>
						</div>
						<div class="modal-footer"><a href="/my-reservations" class="btn btn-info">Ok</a></div>
					</div>
				</div>
			</div>
            <div class="footer fixed_full">
                <div class="pull-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>© 2017</strong> Mechanic Services
                </div>
            </div>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Data picker -->
    <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!--app-->
    <script src="app/angular.js"></script>
    <script src="app/config/config.js"></script>
    <script src="app/service/api-service.js"></script>
    <script src="app/modules/reservation/reservation.js"></script>

    <script>
        $(document).ready(function () {

            $('input[name="daterange"]').datepicker();

        });
    </script>
</body>

</html>