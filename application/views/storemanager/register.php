<div class="container" ng-app="firstapp" ng-controller="Index">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">

    	<?php if(isset($_GET['regis'])){ ?>
    	<div><p class="text-center" style="color: red;border-style: dotted;border-width: 1px;">ສະມັກສະມະຊິກບໍ່ສຳເລັດ! ມີອີເມວນີ້ໃນລະບົບແລ້ວ</p></div>
    	<?php } ?>


    		<div class="panel panel-default">
			  	<div class="panel-heading"  style="background-color: #fff;">
			    <center>	<h3>ສະມັກສະມະຊິກ ຜູ້ຈັດການຮ້ານ</h3> </center>
			 	</div>
			  	<div class="panel-body">
			    	<form action="signup" method="post">
                    <fieldset>

                    	    <div class="form-group">
			    		    <input class="form-control" minlength="2" placeholder="ຊື່ເຈົ້າຂອງຮ້ານ" name="owner" type="text" style="height: 50px;font-size: 20px;" required>
			    		</div>



 <div class="col-md-12">
<br />
</div>


                    <div class="form-group">
			    		    <input class="form-control" minlength="2" placeholder="ຊື່ຮ້ານ" name="name" type="text" style="height: 50px;font-size: 20px;" required>
			    		</div>



 <div class="col-md-12">
<br />
</div>




 <div class="form-group">
			    		    <input class="form-control" placeholder="ເບີໂທ" name="tel" type="text" style="height: 50px;font-size: 20px;" required>
			    		</div>


                    	<div class="form-group">
			    		    <input class="form-control" placeholder="ອີເມວ" name="email" type="email" style="height: 50px;font-size: 20px;" required>
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" minlength="6" placeholder="ລະຫັດຜ່ານ" name="password" style="height: 50px;font-size: 20px;" type="password" value="" required>
			    		</div>
			    		
			    		
			    		
			    		<input id="submit" class="btn btn-lg btn-default btn-block" type="submit" value="ສະໝັກສະມະຊິກ">
			    	</fieldset>
			      	</form>


			      	<hr />
			      	<center>
	<a href="<?php echo $base_url;?>/storemanager/login">ເຂົ້າສູ່ລະບົບ ຜູ້ຈັດການຮ້ານ</a>
</center>
			    </div>
			</div>
		</div>
	</div>
</div>

<script>

function Submit(){
$('#submit').prop('disabled',true);
};


var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {




});

	</script>