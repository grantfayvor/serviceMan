<!DOCTYPE html>
<html><head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mechanic services | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name" style="margin-top: 0px;font-size: 90px;">MS</h1>

            </div>
            <h3>Login to Account</h3>
            
            
            <form class="m-t" role="form" method="POST" action="{{ route('authenticate') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <input class="form-control" name="username" placeholder="Username" required="" type="text" autofocus>
                </div>
                <div class="form-group">
                    <input class="form-control" name="password" placeholder="Password" required="" type="password">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ route('register') }}">Create an account</a>
            </form>
            <p class="m-t"> <small> Mechanic Services © 2017 </small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>






</body></html>