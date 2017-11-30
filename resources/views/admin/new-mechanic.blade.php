<!DOCTYPE html>
<html data-ng-app="mechanic">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mechanic services | Register</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!--app-->
    <script type="text/javascript" src="/app/angular.js"></script>
    <script type="text/javascript" src="/app/config/config.js"></script>
    <script type="text/javascript" src="/app/service/api-service.js"></script>
    <script type="text/javascript" src="/app/modules/user/user.js"></script>

</head>

<body class="gray-bg" data-ng-controller="UserController">

<div class="middle-box text-center loginscreen   animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name" style="font-size: 90px;margin-top: 0px;">MS</h1>

        </div>
        <h3>Register to Mechanic services</h3>
        <p>Create account to see it in action.</p>
        <form class="m-t" role="form" method="POST" action="/api/mechanic/create" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <input class="form-control" name="username" value="{{ old('username') }}" required="" placeholder="Username" type="text">
            </div>
            <div class="form-group">
                <input class="form-control" name="firstName" value="{{ old('firstName') }}" required="" placeholder="First Name" type="text">
            </div>
            <div class="form-group">
                <input class="form-control" name="lastName" value="{{ old('lastName') }}" required="" placeholder="Last Name" type="text">
            </div>
            <div class="form-group">
                <input class="form-control" name="email" value="{{ old('email') }}" required="" placeholder="Email Address" type="text">
            </div>
            <div class="form-group">
                <input class="form-control" name="phoneNumber" value="{{ old('phoneNumber') ?: '+234' }}" required="" placeholder="phone number e.g +2348012345678" type="text">
            </div>
            <div class="form-group">
                <input class="form-control" name="identificationNumber" value="{{ old('identificationNumber') }}" required="" placeholder="Identification Number" type="text">
            </div>
            <div class="form-group">
                <input class="form-control" name="address" value="{{ old('address') }}" required="" placeholder="no 1 street name, city, state" type="text">
            </div>
            <div class="form-group">
                <input class="form-control" type="file" name="photo" required="" placeholder="Select Profile Photo" value="{{ old('photo') }}">
            </div>
            <div class="form-group">
                <input class="form-control" name="password" data-ng-model="new_user.password" placeholder="Password" required="" type="password">
            </div>
            <div class="form-group">
                <label style="color:red!important;" for="passwordConfirm" data-ng-show="!passwordMatch">Password does not match.</label>
                <input id="passwordConfirm" class="form-control" required="" name="passwordConfirm" data-ng-model="new_user.confirmPassword"
                       data-ng-change="confirmPassword()" placeholder="Confirm Password" type="password">
            </div>
            <div class="form-group">
                <div class="checkbox i-checks"><label class=""> <div class="icheckbox_square-green checked" style="position: relative;"><div class="icheckbox_square-green" style="position: relative;"><div class="icheckbox_square-green" style="position: relative;"><div class="icheckbox_square-green" style="position: relative;"><input style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div><i></i> Agree to the terms and policy </label></div>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

            <a class="btn btn-sm btn-white btn-block" href="/dashboard">Cancel</a>
        </form>
        <p class="m-t"> <small>Mechanic services © 2017</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js"></script>


<script>
    $(document).ready(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>





</body>

</html>