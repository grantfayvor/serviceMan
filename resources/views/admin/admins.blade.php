<!DOCTYPE html>
<html data-ng-app="mechanic">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mechanic services | All Admins</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">



</head>

<body data-ng-controller="UserController" class="pace-done" data-ng-init="getAllAdmins()">
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

                <li class="active">
                    <a href="/dashboard"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span></a>
                </li><li>
                    <a href="/make-reservation"><i class="fa fa-edit"></i> <span class="nav-label">Make Reservation</span></a>
                </li><li>
                    <a href="/my-reservations"><i class="fa fa-eye"></i> <span class="nav-label">My Reservations</span></a>
                </li>
                <li>
                    <a href="/users"><i class="fa fa-user"></i> <span class="nav-label">All Users</span> </a>
                </li>
                <li>
                    <a href="/mechanics"><i class="fa fa-cogs"></i> <span class="nav-label">All Mechanics</span> </a>
                </li>
                <li>
                    <a href="/add-mechanic"><i class="fa fa-plus-circle"></i> <span class="nav-label">Add New Mechanic</span> </a>
                </li>
                <li>
                    <a href="/add-admin"><i class="fa fa-plus-square"></i> <span class="nav-label">Add New Admin</span> </a>
                </li>
                <li>
                    <a href="/admins"><i class="fa fa-user-plus"></i> <span class="nav-label">All Admins</span> </a>
                </li>
                <li>
                    <a href="/reservations"><i class="fa fa-reddit-square"></i> <span class="nav-label">All Reservations</span> </a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-hourglass"></i> <span class="nav-label">Recent Activity</span></a>
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg" style="min-height: 422px;">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Welcome to Mechanic services</span>
                    </li>

                    <li>
                        <a href="/logout">
                            <i class="fa fa-power-off"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="container">
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>All Admins</h2>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper wrapper-content animated fadeInUp">

                        <div class="ibox">

                            <div class="ibox-title">
                                <h5>All Admins</h5>
                                <div class="ibox-tools">
                                    <!-- <a class="btn btn-primary btn-xs" href="/register">New Reservation</a> -->
                                </div>
                            </div>
                            <div class="ibox-content">


                                <div class="table table-responsive">

                                    <table class="table table-hover">
                                        <thead>
                                        <th class="col-sm-1 col-md-1">
                                            <span class="label label-success" style="font:20px;">S/N</span>
                                        </th>
                                        <th class="col-sm-2 col-md-2">
                                            <span class="label label-success">First Name</span>
                                        </th>
                                        <th class="col-sm-2 col-md-2">
                                            <span class="label label-success">Last Name</span>
                                        </th>
                                        <th class="col-sm-2 col-md-2">
                                            <span class="label label-success">Username</span>
                                        </th>
                                        <th class="col-sm-3 col-md-3">
                                            <span class="label label-success">Email</span>
                                        </th>
                                        <th class="col-sm-2 col-md-2">
                                            <span class="label label-success">Action</span>
                                        </th>
                                        </thead>
                                        <tbody>
                                        <tr data-ng-repeat="user in admins">
                                            <td class="col-sm-1 col-md-1">
                                                <b><span class="label red" data-ng-bind="$index + 1"></span></b>
                                            </td>
                                            <td class="col-sm-2 col-md-2">
                                                <span data-ng-bind="user.first_name"></span>
                                            </td>
                                            <td class="col-sm-2 col-md-2">
                                                <span data-ng-bind="user.last_name"></span>
                                            </td>
                                            <td class="col-sm-2 col-md-2">
                                                <!-- <small>Created by Peter Williams</small> -->
                                                <span class="" data-ng-bind="user.username"></span>
                                            </td>
                                            <td class="col-sm-3 col-md-3">
                                                <span data-ng-bind="user.email"></span>
                                            </td>
                                            <td class="col-sm-2 col-md-2">
                                                <!-- <a class="btn btn-white btn-sm" href="view.html"><i class="fa fa-folder"></i> View File</a> -->
                                                <a class="btn btn-white btn-sm" href="javascript:void(0)" data-ng-click="deleteAdminModal(user.id)"><i class="fa fa-trash"></i> Delete Admin</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="deleteModal" class="modal fade" aria-hidden="false" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Delete Admin</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group"><label>Do you really want to delete this admin?</label></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-ng-click="deleteAdmin()" class="btn btn-info">Ok</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer fixed_full">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>© 2017 </strong> Metaheuristics Content Management System</div>
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

<!--app-->
<script src="app/angular.js"></script>
<script src="app/config/config.js"></script>
<script src="app/service/api-service.js"></script>
<script src="app/modules/user/user.js"></script>

<script>
    $(document).ready(function () {

        $('#loading-example-btn').click(function () {
            btn = $(this);
            simpleLoad(btn, true)

            // Ajax example
            //                $.ajax().always(function () {
            //                    simpleLoad($(this), false)
            //                });

            simpleLoad(btn, false)
        });
    });

    function simpleLoad(btn, state) {
        if (state) {
            btn.children().addClass('fa-spin');
            btn.contents().last().replaceWith(" Loading");
        } else {
            setTimeout(function () {
                btn.children().removeClass('fa-spin');
                btn.contents().last().replaceWith(" Refresh");
            }, 2000);
        }
    }
</script>





</body>

</html>