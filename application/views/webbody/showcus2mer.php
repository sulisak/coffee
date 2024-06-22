<style>
.video-container {
	position:relative;
	padding-bottom:56.25%;
	padding-top:30px;
	height:0;
	overflow:hidden;
}

.video-container iframe, .video-container object, .video-container embed {
	position:absolute;
	top:0;
	left:0;
	width:100%;
	height:100%;
}
</style>


<div class="container" ng-app="firstapp" ng-controller="Index" style="margin-left: 0px; padding-left: 0px; padding-right: 0px; margin-right: 0px;width: 100%;">

<div ng-if="money_change_showcus[0].money_change_showcus =='0.01' && listsale==''">



  <?php
  $url = $_SESSION['youtube_url_forcus'];
  parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
  //echo $my_array_of_vars['v'];
    // Output: C4kxS1ksqtw
  ?>

  <div class="video-container">
   <!-- https://www.youtube.com/watch?v=VHX5F8Sas6I
     https://www.youtube.com/embed  -->
  <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $my_array_of_vars['v'];?>?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
  </div>


  <!-- <hr />
  <center>
  <h1 style="font-weight:bold;font-size:40px;color:orange;">
   <?=$lang_welcomecusnext?>
  </h1>
  </center> -->

  </div>




<div ng-if="money_change_showcus[0].money_change_showcus!='0.01' && listsale==''" class="panel panel-default">
<br />

<table class="table" style="font-size:50px;font-weight:bold;font-family: Phetsarath OT">
<tr>
  <td class="text-right" width="40%">
  ຮັບເງິນ</td>
  <td class="text-right" style="color:green;">{{money_change_showcus[0].money_from_cus_showcus | number:2}}</td>
  <td width="20%"></td>
</tr>
<tr>
  <td class="text-right">ຍອດເງິນຊຳລະ</td>
  <td class="text-right" style="color:green;">{{money_change_showcus[0].price_value_showcus | number:2}}</td>
  <td width="20%"></td>
</tr>
<tr>
  <td class="text-right"> ເງິນທອນ</td>
  <td class="text-right" style="color:red;"> {{money_change_showcus[0].money_change_showcus | number:2}}</td>
  <td width="20%"></td>
</tr>
</table>


<br />
</div>


<div ng-show="listsale!=''" class="panel panel-default" style="font-size:30px;font-weight:bold;font-family: Phetsarath OT">
		<div class="panel-body">


<div style="height: 570px;overflow: auto;">
      <table class="table table-hover">
      	<thead style="background-color:orange;color:#fff;">
      		<tr>

      			<th>ສິນຄ້າ</th>
            <th class="text-center">ຈຳນວນ</th>
      			<th>ລາຄາ</th>
      			<th class="text-right">ລວມ</th>

      		</tr>
      	</thead>
      	<tbody style="color:green;">
      		<tr ng-repeat="x in listsale">



      			<td>

              <img ng-if="x.product_image!=''" ng-src="<?php echo $base_url?>/{{x.product_image}}" width="80px" height="80px">


      {{x.product_name}}


      <input type="hidden" ng-model="x.product_id">

      			</td>

            <td align="center">
      {{x.product_sale_num | number}}
      </td>

      			<td>
      				{{x.product_price | number}}

      </td>



      			<td align="right">{{(x.product_price - x.product_price_discount) * x.product_sale_num  | number }}</td>



      		</tr>

        </tbody>
      </table>

    </div>

<table class="table">
  <tbody style="background-color:orange;color:#fff;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">

      		<tr style="font-size:50px;">
      		<td colspan="2" align="right"><?=$lang_all?>ທັງໝົດ</td>

      			<td align="right" style="font-weight: bold;">{{Sumsalenum() | number }} ອັນ</td>
      			<td align="right" style="background-color:#fff;font-weight: bold;color:red;border:1px solid orange;">{{Sumsaleprice() | number }} ກີບ</td>

      		</tr>


      	</tbody>
      </table>


		</div>
	</div>
</div>


<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http) {

  $scope.Showlistorder = function(){

  	$http.post("<?php echo $base_url;?>/sale/Salepic/showlistorder",{
  		}).success(function(data){
  	$scope.listsale = data;
  		});


  };
  $scope.Showlistorder();


  setInterval(function () {
    $scope.Showlistorder();
  }, 2000);





  $scope.Showmoney_change = function(){


      $http.post("<?php echo $base_url;?>/sale/Salepic/showmoneychange",{
    		}).success(function(data){
    	$scope.money_change_showcus = data;
    		});


  };
  setInterval(function () {
    $scope.Showmoney_change();
  }, 2000);








   $scope.Sumsalenum = function(){
  var total = 0;

   angular.forEach($scope.listsale,function(item){
  total += parseFloat(item.product_sale_num);
   });
      return total;
  };




   $scope.Sumsaleprice = function(){
  var total = 0;

   angular.forEach($scope.listsale,function(item){
  total += parseFloat((item.product_price - item.product_price_discount) * item.product_sale_num);
   });
      return total;
  };




});

</script>
