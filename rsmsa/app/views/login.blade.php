<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="http://thevectorlab.net/flatlab/img/favicon.png">

    <link href="css/bootstrap-theme.css" rel="stylesheet" />
    <link href="css/material-design.css" rel="stylesheet" />
    <link href="angular-material/angular-material.css" rel="stylesheet" />
    <link href="css/material-design.css" rel="stylesheet" />

    <script src="angular/angular.min.js"></script>
    <script src="angular-material/angular-material.min.js"></script>
    <script src="hammerjs/hammer.min.js"></script>
    <script src="angular-animate/angular-animate.js"></script>
    <script src="angular-aria/angular-aria.js"></script>
    <script src="js/buttons.js"></script>

    <title>RSMSA</title>

    <!-- Bootstrap core CSS -->
    <link href= "{{ asset('/apps/accident/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/apps/accident/css/bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->
<!--    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />-->
    <!-- Custom styles for this template -->
    <link href= "{{ asset('/apps/accident/css/style.css') }}" rel="stylesheet">
    <link href= "{{ asset('/apps/accident/css/style-responsive.css') }}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body"  style="background-image:url({{asset('img/background.jpg')}})">



<div layout="row" style="padding-top: 200px" >


  <div class="col-md-6" style="padding:100px;padding-top: 0px">

<h4  style="color:black;font-weight: bold;line-height: 100%">Welcome to the Integrated Road Safety Management System(iRoad)</h4>
       <ul>

       <li style="list-style-image: url({{asset('img/tick_pic.jpg')}}) ">Easy Accident Report</li>
       <li style="list-style-image: url({{asset('img/tick_pic.jpg')}}) ">Simple Offense Capturing </li>
       <li style="list-style-image: url({{asset('img/tick_pic.jpg')}}) ">Accomodation Of Other Systems Involving Road Safety. </li>

       <li style="list-style-image: url({{asset('img/tick_pic.jpg')}}) ">Easy Accident Report</li>
       <li style="list-style-image: url({{asset('img/tick_pic.jpg')}}) ">Simple Offense Capturing </li>
       <li style="list-style-image: url({{asset('img/tick_pic.jpg')}}) ">Accomodation Of Other Systems Involving Road Safety. </li>

       </ul>

  </div>

    <div class="col-md-4" style="padding-right: 100px">
 <form class="form-signin" action="{{ url('login') }}"  method="post">
<h6 class="form-signin-heading" style="color:black;font-weight: bold">Please Enter Your Credentials To Access The System</h6>

        @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
        @endforeach

        @if ($alert = Session::get('alert-fail'))
        <div class="alert alert-danger">
            {{ $alert }}
        </div>
        @endif
               <div class="login-wrap">

                    <input type="text" class="form-control" placeholder="Police Rank Number" autofocus name="rankNo" required style="margin-bottom: 15px;border: 0px;border-bottom: 1px solid">

                    <input type="password" class="form-control" placeholder="Password" name="password" required style="border: 0px;border-bottom: 1px solid">

                    <label class="checkbox">
                        <input type="checkbox" value="remember-me"> Remember me
                        <span class="pull-right">
                            <a data-toggle="modal" href="{{ url('password/remind/') }}"> Forgot Password?</a>

                        </span>
                    </label>

                    <button class="btn btn-primary btn-block"  name="submit" type="submit" ng-disabled="login_form.$invalid">Sign in</button>

        </div>
</form>
  </div>

</div>



<!-- js placed at the end of the document so the pages load faster -->


<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>





</body>


</html>