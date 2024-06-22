
	<?php
if($_SESSION['user_type']=='1'){
	echo '<script>
window.location = "'.$base_url.'/sale/salepic";
	</script>';
	}?>


<?php
if($_SESSION['user_type']=='2'){
		echo '<script>
window.location = "'.$base_url.'/warehouse/productlist";
	</script>';
	}
	?>





<style type="text/css">
	body{
		background-color: #eee;
	}
</style>

<font style="font-family:Phetsarath OT">
<div class="container text-center" ng-app="firstapp" ng-controller="Index">

<div class="col-md-12">




<div class="col-md-7">

<div class="col-md-6">
<a style="text-decoration:none" href="<?php echo $base_url;?>/sale/salereportshift" title="ຄລິກເພື່ອເບິ່ງຍອດຂາຍຕາມກະ">
<div class="panel" style="height: 240px;background-color: rgba(0,0,0,.5);color: #fff;">
<br />
<b>ຍອດຂາຍຕາມກະທີ <?php if(isset($_SESSION['shift_id'])){ echo number_format($_SESSION['shift_id']);}else{ echo '(ຍັງບໍ່ໄດ້ເປີດກະ)';} ?></b>

<br />
<h3 ng-repeat="x in saletoday">
	<?php echo $lang_qty;?>
	<b>{{x.sumnum | number}}</b>
	<br /><br />
	<?php echo $lang_income;?>
	<b>{{x.sumprice-x.sumdiscount | number:2}}</b>
</h3>

</div>
</a>
</div>


<div class="col-md-6">
<a style="text-decoration:none" href="<?php echo $base_url;?>/sale/salereport" title="ຄລິກເພື່ອເບິ່ງສິນຄ້າຂາຍດີ">
<div class="panel" style="text-align: left;height: 240px;background-color: rgba(0,0,0,.5);color: #fff;">
<br />
<center><b>ຂາຍດີກະທີ <?php if(isset($_SESSION['shift_id'])){ echo number_format($_SESSION['shift_id']);}else{ echo '(ຍັງບໍ່ໄດ້ເປີດກະ)';} ?></b>

<table width="90%">
	<tr ng-repeat="x in productsaletoday">
		<td>
		{{$index+1}}.	{{x.product_name}}
		</td>
	<td align="right">
		{{x.product_numall | number}}
		</td>
	</tr>
 </table>

</center>

</div>
</a>
</div>


<!-- <div class="col-md-4">
<a href="<?php echo $base_url;?>/sale/salecustomerreport" title="คลิกเพื่อดู ลูกค้าซื้อดี">
<div class="panel"  style="text-align: left;height: 240px;background-color: rgba(0,0,0,.5);color: #fff;">
<br />
<center><b><?=$lang_cussaletoday?></b></center>
<table width="100%">

<?php
$i = 1;
foreach ($customersaletoday as $key => $value) {
	echo '<tr>';
	echo '<td>'.$i.'. '.$value['name'].'</td><td align="right">'.number_format($value['sumsale_num']).'</td>';
echo '</tr>';

$i++;
}
 ?>
 </table>
</div>
</a>
</div> -->



<div class="col-md-12">
<a style="text-decoration:none" href="<?php echo $base_url;?>/warehouse/stock" title="ຄລິກເພຶ່ອເບິ່ງສິນຄ້າ stock">
<div class="panel"  style="text-align: left;height: 240px;background-color: rgba(0,0,0,.5);color: #fff;">
<br />
<center><b>ສິນຄ້າສະຕ໋ອກ</b>

<table width="90%">

	<tr ng-repeat="x in productoutofstock">
	<td>{{$index+1}}. {{x.product_name}}</td>
	<td align="right">{{x.product_stock_num | number}}</td>
	</tr>

 </table>

 </center>

</div>
</a>
</div>


<!--
<div class="col-md-6">
<a style="text-decoration:none" href="<?php echo $base_url;?>/pawn/pawnenddate" title="คลิกเพื่อดู สินค้ารับฝากเลยกำหนด ทั้งหมด">
<div class="panel"  style="text-align: left;height: 280px;background-color: rgba(0,0,0,.5);color: #fff;">
<br />
<center><b>สินค้ารับฝากเลยกำหนด</b>

<table width="90%">

<?php
$i = 1;
foreach ($productpawnenddate as $key => $value) {
	echo '<tr>';
	echo '<td>'.$i.'. '.mb_substr($value['product_name'],0,17, 'UTF-8').'.</td><td align="right">'.$value['end_date_date'].'</td>';
echo '</tr>';

$i++;
}
 ?>
 </table>

 </center>


</div>
</a>
</div> -->






</div>








<div class="col-md-5">

<a href="<?php echo $base_url;?>/sale/salepic" class="btn btn-success"  style="font-size: 18px;font-weight: bold; width: 340px;">
<span class="glyphicon glyphicon-blackboard" aria-hidden="true" style="font-size: 50px;"></span><br />
ຈໍຂາຍກາເຟ
</a>

<!-- <a href="<?php echo $base_url;?>/sale/salepage" class="btn btn-warning"  style="font-size: 18px;font-weight: bold; width: 170px;">
<span class="glyphicon glyphicon-record" aria-hidden="true" style="font-size: 50px;"></span><br /> <?=$lang_salelist?>
</a> -->



<!-- <p></p>

	<a href="<?php echo $base_url;?>/sale/salebill" class="btn btn-warning"  style="font-size: 18px;font-weight: bold;width: 170px;">
<span class="glyphicon glyphicon-align-justify" aria-hidden="true" style="font-size: 50px;"></span><br />
<?=$lang_billreserv?>
</a>



<a href="<?php echo $base_url;?>/sale/product_return" class="btn btn-warning"  style="font-size: 18px;font-weight: bold; width: 170px;">
<span class="glyphicon glyphicon-refresh" aria-hidden="true" style="font-size: 50px;"></span><br /> <?=$lang_returnproduct?>
</a> -->


<p></p>

<a href="<?php echo $base_url;?>/purchase/buy" class="btn btn-primary" style="font-size: 18px;font-weight: bold; width: 340px;">

<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true" style="font-size: 50px;"></span><br />ບັນທຶກລາຍຈ່າຍ

</a>
<p></p>

<!-- <a href="<?php echo $base_url;?>/pawn/pawnlist" class="btn btn-warning"  style="font-size: 18px;font-weight: bold;width: 170px;">
<span class="glyphicon glyphicon-list" aria-hidden="true" style="font-size: 50px;"></span><br />
รับฝาก
</a> -->


<a href="<?php echo $base_url;?>/warehouse/productlist" class="btn btn-primary"  style="font-size: 18px;font-weight: bold;width: 170px;">
<span class="glyphicon glyphicon-home" aria-hidden="true" style="font-size: 50px;"></span><br />
ກາເຟ/ເຂົ້າໜົມ
</a>


<a href="<?php echo $base_url;?>/mycustomer" class="btn btn-primary" style="font-size: 18px;font-weight: bold; width: 170px;">
<span class="glyphicon glyphicon-user" aria-hidden="true" style="font-size: 50px;"></span><br /> ລູກຄ້າ
</a>


<p></p>







<a href="<?php echo $base_url;?>/sale/salelist" class="btn btn-default"  style="font-size: 18px;font-weight: bold; width: 170px;">
<span class="glyphicon glyphicon-list-alt" aria-hidden="true" style="font-size: 50px;"></span><br />
 ລາຍງານການຂາຍ
</a>


<a href="<?php echo $base_url;?>/printer/printercategory" class="btn btn-default"  style="font-size: 18px;font-weight: bold; width: 170px;">
<span class="glyphicon glyphicon-print" aria-hidden="true" style="font-size: 50px;"></span><br /> ເຄື່ອງພິມ
</a>




<p></p>


<a href="<?php echo $base_url;?>/salesetting/discount" class="btn btn-default"  style="font-size: 18px;font-weight: bold; width: 170px;">
<span class="glyphicon glyphicon-cog" aria-hidden="true" style="font-size: 50px;"></span><br /> <?=$lang_salesetting?>
</a>

<a href="<?php echo $base_url;?>/storemanager/user_owner" class="btn btn-default"  style="font-size: 18px;font-weight: bold; width: 170px;">
<span class="glyphicon glyphicon-cog" aria-hidden="true" style="font-size: 50px;"></span><br /> ພະນັກງານ/ຮ້ານ
</a>






<p></p>






<!-- <a href="<?php echo $base_url;?>/marketing/email" class="btn btn-default"  style="font-size: 15px;font-weight: bold; width: 150px;" >
<span class="glyphicon glyphicon-envelope" aria-hidden="true" style="font-size: 50px;"></span><br /> <?=$lang_emailmarketting?>
</a> -->
<p></p>

<a class="btn btn-default btn-lg" href="<?php echo $base_url;?>/home/showcus2mer" target="_blank"   style="font-size: 18px;font-weight: bold; width: 340px;">
<span class="glyphicon glyphicon-blackboard" aria-hidden="true" style="font-size: 30px;"></span><br />
	ໜ້າຈໍສຳລັບລູກຄ້າ</a>

<br/><br/>

</div>





<div class="col-md-12">
<center>


<!-- Manu backup database here  ==================================
	<a href="<?php echo $base_url;?>/backup_all" class="btn btn-info"  style="font-size: 16px;font-weight: bold; width: 200px;border-radius: 20px;">
	<span class="glyphicon glyphicon-save" aria-hidden="true" style="font-size: 30px;"></span><br />
	Backup Database
	</a>
-->

<br /><br />	



<a href="#" class="btn btn-danger" ng-click="Delsaleall()"  style="font-size: 16px;font-weight: bold; width: 200px;border-radius: 20px;">
	<span class="glyphicon glyphicon-remove" aria-hidden="true" style="font-size: 30px;"></span><br />
	ລົບປະຫວັດການຂາຍທັງໝົດ
	</a>



</center>
</div>








<div class="modal fade" id="Delsaleall">
	<div class="modal-dialog modal-xs">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">ລົບປະຫວັດການຂາຍທັງໝົດ</h4>
			</div>
			<div class="modal-body">
			<center>
<font style="color:red;">*** ປະຫວັດການຂາຍທັງໝົດຈະຫາຍໄປ ບໍ່ສາມາດນຳກັບຄືນມາໄດ້ </font>
<br />
<a href="<?php echo $base_url;?>/c2mhelper/delsaleall" class="btn btn-success"  style="font-size: 16px;font-weight: bold; width: 200px;border-radius: 20px;">
	ຢືນຢັນ
	</a>

</center>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>




</div>
</div>
</font>





<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


$scope.Saletoday = function(){

$http.get('Home/Saletoday')
		 .then(function(response){
				$scope.saletoday = response.data;

			});
 };
$scope.Saletoday();




$scope.Productsaletoday = function(){

$http.get('Home/Productsaletoday')
		 .then(function(response){
				$scope.productsaletoday = response.data;

			});
 };
$scope.Productsaletoday();


$scope.Productoutofstock = function(){

$http.get('Home/Productoutofstock')
		 .then(function(response){
				$scope.productoutofstock = response.data;

			});
 };
$scope.Productoutofstock();


$scope.Delsaleall = function(){

$('#Delsaleall').modal('show');
 };
 

});
	</script>
