﻿<div class="container" ng-app="firstapp" ng-controller="Index">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">


    	<?php if(isset($_GET['regis'])){ ?>
    	<div><p class="text-center" style="color: green;border-style: dotted;border-width: 1px;">สมัครสมาชิกสำเร็จ!</p></div>
    	<?php } ?>

    	<?php if(isset($_GET['login'])){ ?>
    	<div><p class="text-center" style="color: red;border-style: dotted;border-width: 1px;"><?=$lang_cannotlogin?></p></div>
    	<?php } ?>

    	<?php if(isset($_GET['email'])){ ?>
    	<div><p class="text-center" style="color: red;border-style: dotted;border-width: 1px;"><?=$lang_loginemailplz?></p></div>
    	<?php } ?>


<center>
	<?php
foreach ($getlogo as $key => $value) {

$logo = $value['owner_logo'];
$bgimg = $value['owner_bgimg'];
}
 ?>
<img src="<?php echo $base_url;?>/<?php echo $logo;?>" style="max-width: 300px;">
</center>


    		<div class="panel panel-warning" style="border-radius: 20px;
box-shadow: 5px 5px rgba(0,0,0,.3);">
			  	<div class="panel-heading" style="background-color: #fff;border-radius: 20px;
box-shadow: 5px 5px rgba(0,0,0,.3);">
			    	<center><h1 class="panel-title" style="font-size: 35px;">ໂປຼແກຼມຮ້ານກາເຟ</h1></center>
			 	</div>
			  	<div class="panel-body">
			    	<form action="login_submit" method="post">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="<?=$lang_loginemail?>" name="email" type="text" style="height: 50px;font-size: 20px;">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="<?=$lang_loginpassword?>" name="password" type="password" value="" style="height: 50px;font-size: 20px;">
			    		</div>

			    		<input id="submit"  class="btn btn-lg btn-warning btn-block" type="submit" value="<?=$lang_pagelogin?>" >
			    	</fieldset>
			      	</form>



			    </div>
			</div>
		</div>
	</div>
</div>




<style type="text/css">
	body{
		font-family: Phetsarath OT;
		background-image: url("<?php echo $bgimg;?>");
		background-color: #f0ad4e;
	}
</style>






<script>

function Submit(){
$('#submit').prop('disabled',true);
};

var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.Submit = function(){
$('#submit').prop('disabled',true);
};

});


	</script>



<div class="col-md-12 text-center" style="color: #fff;">


<!-- 	Language <a style="color: #fff;" href="http://localhost:8080/pos7/?lang=th">ภาษาไทย</a> 
| <a style="color: #fff;" href="http://localhost:8080/pos7/?lang=lao">ພາສາລາວ</a>
<br /> -->

<span style="color: red;background-color:#fff;font-weight:bold;">

<br />



</span>

</div>

