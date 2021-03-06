<!DOCTYPE html>

<html ng-app="rsmsaApp">
<head>

<!-- Angulars Material CSS now available via Google CDN; version 0.6 used here -->
<link rel="stylesheet" href="../angular-material/angular-material.css">
<script src="/js/jquery/jquery.js"></script>

<!-- Angular Material Dependencies -->
<script src="angular/angular.min.js"></script>
<script src="hammerjs/hammer.min.js"></script>
<script src="angular-animate/angular-animate.min.js"></script>
<script src="angular-aria/angular-aria.min.js"></script>
<script src="angular/angular-messages.min.js"></script>
<!-- Angular Material Javascript now available via Google CDN; version 0.6 used here -->
<script src="angular-material/angular-material.min.js"></script>
<script src="angular-material/angular-text.min.js"></script>
<link rel="stylesheet" href="angular-material/angular-text.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<style>
.app{
	background-color:#3F51B5;
	padding:0;
	height:300px;
	max-height: 300px;
	margin:0.66%;
	cursor:pointer;
}
.app:hover{
	box-shadow:0px 0px 5px #888888;
}
md-card-content{
	background-color:#1A237E;
	color:white;
}
.app .img{
	width: 100%;
	
	height: 200px;
	margin:auto;
	border-radius:50%;
	background-repeat: no-repeat;
background-position: center;
background-size: 40%;
}
.app{
	width:23.5%;
	box-shadow:3px 3px 20px black;
}
.app:hover{
	box-shadow:8px 8px 20px black;
}
.app:hover .img{
	width:300px;
}
.app:hover md-card-content{
	font-size:20px;
	color:black;
}
.app:nth-child(4n - 3){
    /*width:48%;*/
}
.highcharts-class{width: 48.6%;margin:0.66%;}
.highcharts-container{width:100% !important; height:100% !important;}
.menu{
	display:inline;
	padding: 10px;
	cursor:pointer;
}
.menu:hover{
	background-color: #5C6BC0;
	color:white;
}
.menu>div{
	display:none;
	background-color: #5C6BC0;
	margin-top: -15px;
}
.menu>div .li{
	padding: 10px;
}
.menu>div a{
	color:white;
	text-decoration:none;
}
.menu>div .li:hover{
	background-color: #7986CB;
}
.menu:hover>div{
	display: block;
position: absolute;
right: 0;
width: 240px;
top: 43px;
}
.profile{
	background:white;
	width:100%;
	padding:0;
}
md-input-container{
	margin-bottom:10px;
}
</style>
<script src="<?php echo asset('highcharts-ng/src/highcharts-custom.js') ?>"></script>
<script src="<?php echo asset('highcharts-ng/src/highcharts-ng.js') ?>"></script>
<script src="<?php echo asset('controllers/rsmsaController.js') ?>"></script>
<body>
<div ng-controller="AppCtrl" style="height:100%">
  <md-content style="height:100%;background: url(img/background.jpg);background-size: cover;background-repeat: no-repeat;">
    <md-toolbar class="md-tall md-warn md-hue-3" style="background-color: #3F51B5  !important">
    <div layout="row" style="height: 100%">
    	<div style="width:12.5%">
    	</div>
    	<div style="width:75%">
    		<h2 class="md-toolbar-tools" style="padding-top: 60px;;font-size:40px;color:white">
                <img src="img/logo.png" style="height:70px"/>Integrated Road Safety Management System
      		</h2>
    	</div>
    	<div style="width:12.5%">
    	<div style="margin-top:100px;position: absolute;right: 0;width:240px;">
    		<div class="menu" ng-click="showPanel('dashboard')">Home</div>	
	      	<div class="menu" ng-click="showPanel('app')">Services</div>
	      	<div class="menu">User
	      		<div>
	      			<div class="li" ng-click="showPanel('profile')">Profile</div>
	      			<div class="li" ng-click="showPanel('password')">Change Password</div>
	      			<a href="logout" style=""><div class="li">Logout</div></a>
	      		</div>
	      	</div>
      	</div>
    	</div>
    </div>
      
      
    </md-toolbar>
    
    <div layout="row" layout-wrap style="margin:auto;width:75%;">
	   
		    <div ng-if="dashboard" class="highcharts-class">
		    	<highchart id="chart1" config="chartConfig"></highchart>
		    </div>
		    <div ng-if="dashboard" class="highcharts-class">
		    	<highchart id="chart1" config="chartConfig1"></highchart>
		    </div>
		    <div ng-if="dashboard" class="highcharts-class" style="width:100%">
		    	<highchart id="chart1" config="chartConfig2"></highchart>
		    </div>   
  	<md-card class="app" ng-if="showApp" ng-repeat="app in apps" ng-click="openApp($event,app.id)" style="background-color:{{app.color.c200}}">
	 	<div class="img" style="background-image:url(app/{{app.id}}/{{app.icons.small}})">
	 		
	 	</div>
	      <md-card-content style="background-color:{{app.color.c500}}">
	        {{app.name}}
	      </md-card-content>
	</md-card>
	<!-- Profile view -->
	<md-card class="profile" ng-if="profile">
		<md-toolbar class="md-warn" style="background-color:#5C6BC0 !important">
	    <div class="md-toolbar-tools">
	      <span class="md-flex">Your Profile</span>
	    </div>
	  </md-toolbar>
	  <md-content class="md-padding" style="height: 600px;padding: 24px;">
	  	<md-item-content>
	  	<table>
	  		<tr>
	  			<td>
	  				<div class="md-tile-content">
		            <h4>First Name</h4>
		            <h2>{{user.first_name}}</h2>
		            
		          </div>
	  			</td>
	  			<td>
	  				<div class="md-tile-content">
		            <h4>Last Name</h4>
		            <h2>{{user.last_name}}</h2>
		            
		          </div>
	  			</td>
	  		</tr>
          
          </table>
        </md-item-content>
	  <md-divider ng-if="!$last"></md-divider>
	  <md-item-content>
	  	<table>
	  		<tr>
	  			<td>
	  				<div class="md-tile-content">
		            <h4>Gender</h4>
		            <h2>{{user.gender}}</h2>
		            
		          </div>
	  			</td>
	  			<td>
	  				<div class="md-tile-content">
		            <h4>Birth Date</h4>
		            <h2>{{user.birthdate}}</h2>
		            
		          </div>
	  			</td>
	  		</tr>
          
          </table>
        </md-item-content>
	  <md-divider ng-if="!$last"></md-divider>
	  <md-item-content>
	  	<table>
	  		<tr>
	  			<td>
	  				<div class="md-tile-content">
		            <h4>Phone Number</h4>
		            <h2>{{user.phone_number}}</h2>
		            
		          </div>
	  			</td>
	  			<td>
	  				<div class="md-tile-content">
		            <h4>Email</h4>
		            <h2>{{user.email}}</h2>
		            
		          </div>
	  			</td>
	  		</tr>
          
          </table>
        </md-item-content>
	  <md-divider ng-if="!$last"></md-divider>
	  </md-content>
	</md-card>
	<!-- Change Password view -->
	<md-card class="profile" ng-if="password">
		<md-toolbar class="md-warn" style="background-color:#5C6BC0 !important">
	    <div class="md-toolbar-tools">
	      <span class="md-flex">Change Your Password</span>
	    </div>
	  </md-toolbar>
	  <md-content class="md-padding" style="height: 600px;padding: 24px;">
	  <table>
	  	<tr>
	  		<td style="width:50%">
	  		
	  		<table>
	  			<thead><tr><th colspan="2"><h3>Basic Information</h3></th></tr>
	  			<tr><td>First Name:</td><td>{{user.first_name}}</td></tr>
	  			<tr><td>Last Name:</td><td>{{user.last_name}}</td></tr>
	  			<tr><td>Phone Number:</td><td>{{user.phone_number}}</td></tr>
	  			<tr><td>Email:</td><td>{{user.email}}</td></tr>
	  		</table>
	  		</td>
	  		<td>
	  			<md-item-content>
	  	{{passwordState}}
        </md-item-content>
	  	<md-input-container class="col-sm-4"> 
			<label>Current Password</label> 
			<input type="password" ng-model="cpassword.current_password"/> 
		</md-input-container>
       <br />
	  	<md-input-container class="col-sm-4"> 
			<label>New Password</label> 
			<input type="password" ng-model="cpassword.new_password" required/> 
		</md-input-container>
        <br />
	  	<md-input-container class="col-sm-4"> 
			<label>Repeat New Password</label> 
			<input type="password" ng-model="cpassword.repeat_new_password" required/> 
		</md-input-container>
		<br />
        
        <md-button class="md-raised md-primary" ng-click="changePassword()">
				Submit
			</md-button>
	  		</td>
	  	</tr>
	  	</table>
	  
       
	  </md-content>
	</md-card>
    </div>
</body>
</html>