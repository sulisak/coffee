
<style type="text/css">
	.product_box:hover{

box-shadow: 0 1px 2px #000;

	}

	<?php
	if($_SESSION['printer_type']=='1'){
		$pt_width = '380px';
	}else{
		$pt_width = '550px';
	}
	?>


</style>
<font style="font-family:Phetsarath OT">
<div class="lodingbefor" ng-app="firstapp" ng-controller="Index" style="display: none;">

<div class="col-xs-4 col-sm-6 col-md-8">



<div style="overflow: auto;">

<select class="form-control" name="product_category_id" ng-model="product_category_id" style="height: 45px;width: 130px;float: left;font-size: 20px;" ng-change="Selectcat(product_category_id)">
<option value="0">
 <?=$lang_producthavepic?>
</option>
					<option ng-repeat="y in categorylist" value="{{y.product_category_id}}">
						{{y.product_category_name}}
					</option>
				</select>


<div class="form-group" style="float: left;">
<input id="product_name_search" ng-model="product_name_search" class="form-control" placeholder=" <?php echo $lang_searchname;?>" style="height: 45px;width: 100px;font-size: 20px;" ng-change="searchproductlist(product_name_search)">
</div>

<div class="form-group" style="float: left;">
	<a href="<?php echo $base_url;?>/home/showcus2mer" target="_blank" class="btn btn-default btn-lg">ຈໍລູກຄ້າ</a>

</div>


<form class="form-inline" style="float: right;">



<div class="form-group">
<input id="customer_name" ng-model="customer_name" class="form-control" placeholder="<?=$lang_cusname?>" style="height: 45px;width: 100px;font-size: 14px;" readonly="">
</div>
<div class="form-group">
<button type="submit" ng-click="Opencustomer()" class="btn btn-success btn-lg" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<div class="form-group">
<input type="hidden" id="cus_address_all" ng-model="cus_address_all" class="form-control" placeholder="<?=$lang_address?>" style="height: 45px;font-size: 16px;width: 500px;">
</div>

<div class="form-group">
<button ng-click="Refresh()" class="btn btn-default btn-lg" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>


</form>



</form>

<input type="hidden" name="" ng-model="customer_id">




</div>




 <p></p>





<div style="height: 575px;overflow: auto;">


<div class="col-xs-4 col-sm-4 col-md-2 panel panel-default product_box" ng-repeat="x in productlist" style="height: 220px;cursor: pointer;padding-left: 0px;padding-right: 0px;" ng-click="Addpushproductcode(x.product_code)">
<center style="font-size: 10px;">{{x.product_code}}</center>
<div class="panel-body"  style="padding: 0px;">


<center>
<img ng-if="x.product_image !=''" ng-src="<?php echo $base_url;?>/{{x.product_image}}" class="img img-responsive" style="height: 125px;" title="{{x.product_name}}">

<!-- <img ng-if="x.product_image ==''" ng-src="<?php echo $base_url;?>/pic/df.png" class="img img-responsive" style="height: 150px;" title="{{x.product_name}}"> -->

<div ng-if="x.product_image == ''" style="font-size:30px;font-weight:bold;height:140px;">
<br />	{{x.product_name}}
</div>


<p></p>

<span ng-if="x.product_image != ''">{{x.product_name}}</span>

<br />

<div ng-if="x.product_price_discount==0.00" style="color: red;font-weight: bold;">
<span ng-if="sale_type=='1'">{{x.product_price | number:2}}</span>
<span ng-if="sale_type=='2'">{{x.product_wholesale_price | number:2}}</span>
</div>

<span ng-if="x.product_price_discount!=0.00 && sale_type=='1'">
<strike>
{{x.product_price | number:2}}
</strike>
</span>

<span ng-if="x.product_price_discount!=0.00 && sale_type=='2'">
<strike>
{{x.product_wholesale_price | number:2}}
</strike>
</span>

<span ng-if="x.product_price_discount!=0.00 && sale_type=='1'" style="color: red;font-weight: bold;">
{{x.product_price-x.product_price_discount | number:2}}
</span>

<span ng-if="x.product_price_discount!=0.00 && sale_type=='2'" style="color: red;font-weight: bold;">
{{x.product_wholesale_price-x.product_price_discount | number:2}}
</span>



</center>

</div>
</div>







<!-- <div class="col-sm-3 col-md-2"  >
<div ng-click="Addproductrank()" class="panel-body  panel panel-default product_box" style="height: 90px;cursor: pointer;background-color: #eee;">


<center>
เพิ่มเข้า<br />
<span class="glyphicon glyphicon-plus" aria-hidden="true" style="font-size: 40px;"></span>

</center>

</div>


<div ng-show="productlist.length != '0'" ng-click="Delproductrank()" class="panel-body  panel panel-default product_box" style="height: 90px;cursor: pointer;background-color: #eee;">


<center>
นำออก<br />
<span class="glyphicon glyphicon-remove" aria-hidden="true" style="font-size: 40px;"></span>

</center>

</div>



</div> -->




</div>







	</div>



<div class="col-xs-8 col-md-4 col-sm-6">


	<table width="100%">
	<tbody>
		<tr >

			<td>


				<div class="form-group" style="float: right;">
				<?php if(isset($_SESSION['shift_user_id']) && $_SESSION['user_id']==$_SESSION['shift_user_id']){?>
					<button ng-click="Closeshiftnow()"  class="btn btn-lg btn-info" style="font-weight:bold">ປິດກະ (<?php if(isset($_SESSION['shift_id'])){echo $_SESSION['shift_id'];} ?>)</button>
				<?php } ?>
				</div>


<form class="form-inline">
<div class="form-group">
<input type="text" id="product_code_id" class="form-control" ng-model="product_code" style="text-align: right;height: 47px;background-color:#dff0d8;font-size: 20px;width:150px;" placeholder="ລະຫັດບາໂຄດ" autofocus>
</div>

<div class="form-group">
<button type="submit" ng-click="Addpushproductcode(product_code)" class="btn btn-default btn-lg">Enter</button>
</div>


</form>

<span  ng-show="cannotfindproduct" style="color: red;">
<?=$lang_cannotfoundproduct?>
</span>

			</td>
			</tr>

			</tbody>
			</table>




<div class="panel panel-default">
	<div class="panel-body">
<!-- salebox -->

<div style="height: 300px;overflow: auto;">


	<div ng-if="listsale==''" style="height:100px;text-align:center;"><br /><br />ຍັງບໍ່ມີລາຍການ...</div>



<table class="table table-hover">
	<thead>
		<tr>
			<th style="text-align:center;">ຈຳນວນ</th>
			<th style="text-align:center;">ອ໋ອບຊັນ</th>
			<th style="text-align:center;">ສິນຄ້າ</th>
			<!-- <th style="text-align:center;">ราคา</th> -->
			<th class="text-right">ລວມ</th>
			<th>ລຶບ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in listsale" style="background-color:#eee;">

			<td>
<input type="text" ng-model="x.product_sale_num" style="width:30px;">
</td>

<td>
<button ng-click="Getpotmodal(x,$index)" class="btn btn-sm btn-default">
<span class="glyphicon glyphicon-plus"></span>
</button>

</td>


			<td>
<pre style="text-align: left;white-space: pre-line;background-color:#eee;border: 0px;border-radius: 0px;font-size: 16px;">
	{{x.product_name}}</pre>


<span style="font-size:12px;">

	ຫຼຸດ
	<select ng-model="x.product_price_discount_percent" ng-change="Price_discount_percent(x,$index)"  style="width:50px;height: 20px;font-size: 14px;">

	<?php
	for($i=0;$i<=100;$i++){
		echo '<option value="'.$i.'">'.$i.'</option>';
	}
	?>
	</select>
	%
	<!-- <input type="text" placeholder="%" ng-model="x.product_price_discount_percent" ng-change="Price_discount_percent(x,$index)" style="width:50px;height: 20px;font-size: 14px;"> -->

	 <input type="text" ng-model="x.product_price_discount" style="width:50px;height: 20px;font-size: 14px;">



</span>


<input type="hidden" ng-model="x.product_id">

			</td>

			<!-- <td>
				{{x.product_price - x.product_price_discount}}

</td> -->



			<td align="right">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2 }}</td>


			<td style="width: 1px;"><button class="btn btn-danger btn-sm" ng-click="Deletepush(x)">X</button></td>
		</tr>





		<tr style="font-size:18px;">
		<td colspan="2" align="right"><?=$lang_all?>ທັງໝົດ</td>

			<td align="right" style="font-weight: bold;">{{Sumsalenum() | number }}</td>
			<td align="right" style="font-weight: bold;">{{Sumsaleprice() | number:2 }}</td>
<td></td>
		</tr>


<!-- <tr>
		<td colspan="5" align="right">
<input type="checkbox" ng-model="addvat" ng-change="Addvatcontrol()">
		<?=$lang_vat?></td>

		</tr>  -->

<?php
if($_SESSION['owner_vat_status']=='2'){
?>
		<tr >
		<td colspan="3" align="right">
		<?=$lang_vat?>
		{{vatnumber}} %
			<td align="right" style="font-weight: bold;">
			{{(Sumsaleprice() * vatnumber/100) | number:2 }}
			</td>
			<td></td>
		</tr>

		<tr >
		<td colspan="3" align="right"><?=$lang_pricesumvat?></td>
			<td align="right" style="font-weight: bold;">
			{{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) | number:2 }}</td>
<td></td>
		</tr>




<?php
}
?>



	</tbody>
</table>

</div>

<table  class="table">
	<tbody>


<tr>
<td width="30%">
ສ່ວນຫຼຸດທ້າຍບິນ <select ng-model="discount_percent">
	<option value="0"><?=$lang_mo?></option>
	<option value="1">%</option>
</select>



<div ng-show="discount_percent=='0'">
<input type="text" class="form-control" ng-model="discount_last" placeholder="<?=$lang_discount_last?>" style="font-size: 20px;text-align: right;height: 47px;background-color:#dff0d8;">
<span ng-if="discount_last!='0'" style="font-weight: normal;">{{(discount_last*100)/(Sumsaleprice() + (Sumsaleprice() * vatnumber/100)) | number:2 }} %</span>
</div>


<div ng-show="discount_percent=='1'">
<input type="text" class="form-control" ng-model="discount_last_percent" placeholder="<?=$lang_dis?> %" style="font-size: 20px;text-align: right;height: 47px;background-color:#dff0d8;">
<span ng-if="discount_last_percent!='0'" style="font-weight: normal;">{{(Sumsaleprice() + (Sumsaleprice() * vatnumber/100))*(discount_last_percent/100) | number:2 }} <?=$lang_currency?></span>
</div>



</td>
			<td style="font-weight: bold;font-size: 70px;color: green;text-align: center;vertical-align:middle;">
			<span ng-show="discount_percent=='0'">
		{{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) - discount_last | number:2 }}
		</span>

		<span ng-show="discount_percent=='1'">
		{{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) - ((Sumsaleprice() + (Sumsaleprice() * vatnumber/100))*(discount_last_percent/100)) | number:2 }}
		</span>

			</td>
		</tr>

	</tr>

	</tbody>
	</table>


	<table class="table">

<tbody>

		<tr >

			<td style="width:30%;">



<form class="form-inline">

	<!-- <div class="form-group" >
	<select class="form-control" ng-model="sale_type"  style="height: 45px;width: 90px;font-size: 20px;">
		<option value="1">
			ปลีก
		</option>
		<option value="2">
			ส่ง
		</option>
	</select>
	</div> -->

	<div class="form-group">
	<select class="form-control" ng-model="pay_type" style="height: 83px;width: 130px;font-size: 30px;background-color:orange;color:#fff;">
		<option value="1">
			<?=$lang_cash?>
		</option>
		<!-- <option value="2">
			<?=$lang_transfer?>
		</option> -->
		<option value="3">
			<?=$lang_creditcard?>
		</option>
		<option value="5">
			<?=$lang_qrpayment?>
		</option>
		<!-- <option value="4">
			<?=$lang_owe?>
		</option> -->

	</select>
	</div>


</form>




		</td>

		<td align="right">

<button ng-click="Opengetmoneymodal()" class="btn btn-lg btn-primary" style="width:100%;font-size:45px;font-weight:bold;">
ຮັບເງິນ(F9)</button>



		</td>
		</tr>

	</tbody>
</table>




<div class="modal fade" id="Addproductrankmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">ເພີ່ມເຂົ້າ</h4>
			</div>
			<div class="modal-body">
	<input type="text" name="" ng-model="searchproductrank" ng-change="Searchproductranklist(searchproductrank)" placeholder="ຄົ້ນຫາຊື່ລູກຄ້າ" class="form-control">
<table class="table table-hover">
	<thead>
		<tr style="background-color: #ddd;">
			<th>ເພີ່ມ</th>
			<th>ຊື່ສິນຄ້າ</th>
			<th>ລາຄາ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in productranklist">
			<th><button class="btn btn-success btn-xs" ng-click="Addproductranksave(x)">+ ເພີ່ມ</button>

			</th>

			<th>({{x.product_code}}) {{x.product_name}}</th>
			<th>{{x.product_price}}</th>
		</tr>
	</tbody>
</table>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>





<div class="modal fade" id="Delproductrankmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">ນຳອອກ</h4>
			</div>
			<div class="modal-body">

<table class="table table-hover">
	<thead>
		<tr style="background-color: #ddd;">
			<th>ນຳອອກ</th>
			<th>ຊື່ສິນຄ້າ</th>
			<th>ລາຄາ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in productlist">
			<th><button class="btn btn-default btn-xs" ng-click="Delproductranksave(x)">- ນຳອອກ</button></th>
			<th>{{x.product_name}}</th>
			<th>{{x.product_price}}</th>
		</tr>
	</tbody>
</table>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>





<div class="modal fade" id="Openfull">
	<div class="modal-dialog modal-lg" style="width: 100%;margin: 0px;">
		<div class="modal-content">
			<div class="modal-body">





<table width="100%">
	<tbody>
		<tr>

			<td align="left">
			<form class="form-inline">
<div class="form-group">
				<input type="text" class="form-control" ng-model="product_code" style="font-size: 20px;text-align: right;height: 47px;width: 300px;background-color:#dff0d8;" placeholder="<?=$lang_searchproductnameorscan?>">
				</div>
				<div class="form-group">
				<button type="submit" ng-click="Addpushproductcode(product_code)" class="btn btn-default btn-lg"><?=$lang_enter?></button>
				</div>
				<div class="form-group" ng-show="cannotfindproduct" style="color: red;">
					<?=$lang_cannotfoundproduct?>
				</div>
				<div class="form-group">
<button ng-click="Refresh()" class="btn btn-default btn-lg" placeholder="" title="รีเฟรส"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>
				</form>

			</td>
			<td style="font-size: 50px;font-weight: bold;">
				<span style="color: red">{{Sumsalepricevat() | number:2 }}</span> <?=$lang_currency?>
			</td>
			<td align="right"  width="10%">
			<button type="button" class="btn btn-default btn-lg" data-dismiss="modal">x</button>
		</td>

		</tr>
	</tbody>
</table>


<hr />
<div style="height: 350px;overflow: auto;" id="Openfulltable">

<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="width: 50px;"><?=$lang_rank?></th>

			<th style="text-align: center;width: 250px;"><?=$lang_productname?>_test</th>
			<th style="text-align: center;width: 100px;"><?=$lang_barcode?></th>
			<th style="text-align: center;width: 150px;"><?=$lang_saleprice?></th>

			<th width="100px;" style="text-align: center;width: 100px;"><?=$lang_discountperunit?></th>
			<th style="text-align: center;width: 80px;"><?=$lang_qty?></th>
			<th style="text-align: center;width: 80px;"><?=$lang_priceall?></th>
			<th style="width: 50px;"><?=$lang_delete?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in listsale" style="font-size: 20px;">
			<td  style="width: 50px;" align="center">{{$index+1}}</td>

			<td style="width: 250px;">

  {{x.product_name}}


<input type="hidden" ng-model="x.product_id">

			</td>
<td align="center" style="width: 100px;">{{ x.product_code }}</td>


			<td align="right" style="width: 150px;">{{x.product_price | number:2}}</td>
			<td align="right" style="width: 100px;"><input type="" placeholder="<?=$lang_discount?>" class="form-control" ng-model="x.product_price_discount" style="text-align: right;"></td>
			<td align="right" style="width: 80px;"><input type="" placeholder="<?=$lang_qty?>" class="form-control" ng-model="x.product_sale_num" style="text-align: right;width: 80px;"></td>

			<td style="width: 50px;" align="right">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2 }}</td>
			<td><button class="btn btn-danger" ng-click="Deletepush($index)">ລຶບ</button></td>
		</tr>


		<tr style="font-size: 20px;">
		<td colspan="5" align="right"><?=$lang_all?></td>

			<td align="right" style="font-weight: bold;">{{Sumsalenum() | number }}</td>
			<td align="right" style="font-weight: bold;">{{Sumsaleprice() | number:2 }}</td>
<td></td>
		</tr>

		<tr style="font-size: 20px;">
		<td colspan="8" align="right">
<input type="checkbox" ng-model="addvat" ng-change="Addvatcontrol()">
		<?=$lang_addvat?></td>

		</tr>


		<tr style="font-size: 20px;" ng-show="addvat">
		<td colspan="6" align="right">
		vat
		 <input type="number" ng-model="vatnumber" style="width: 50px;text-align: right;">
		 %</td>
			<td align="right" style="font-weight: bold;">
			{{(Sumsaleprice() * vatnumber/100) | number:2 }}
			</td>
<td></td>
		</tr>

		<tr style="font-size: 20px;" ng-show="addvat">
		<td colspan="6" align="right"><?=$lang_pricesumvat?></td>
			<td align="right" style="font-weight: bold;">
			{{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) | number:2 }}</td>
<td></td>
		</tr>

	</tbody>
</table>


</div>

<hr />
<table  class="table table-hover" width="100%">
	<tbody>
	<tr style="font-size: 20px;">
		<td align="right"><?=$lang_all?></td>

			<td align="right" style="font-weight: bold;"><?=$lang_qty?> {{Sumsalenum() | number }}</td>
			<td align="right" style="font-weight: bold;"><?=$lang_summary?> <span style="color: red">{{Sumsalepricevat() | number:2 }}</span> <?=$lang_currency?></td>
<td></td>
		</tr>
		</tbody>
		</table>

<table  class="table table-hover" width="100%">
	<tbody>


		<tr  style="font-size: 20px;">
		<td   width="25%" align="right"><?=$lang_getmoney?>:</td>
			<td>
			<form>
			<input type="text" id="money_from_customer2" class="form-control" ng-model="money_from_customer" placeholder="<?=$lang_moneyfromcus?>" style="font-size: 20px;text-align: right;height: 47px;background-color:#dff0d8;">



		</td>
		<td width="35%"> <?=$lang_moneychange?>: <b>{{money_from_customer - Sumsalepricevat() | number:2}} <?=$lang_currency?></b></td>
		<td align="right" width="10%"><button type="submit" class="btn btn-success btn-lg" id="savesale2" ng-click="Savesale(money_from_customer,Sumsalepricevat())"><?=$lang_getmoneyenter?></button></td>
</form>

		</tr>
	</tbody>
</table>





			</div>

		</div>
	</div>
</div>




<div class="modal fade" id="Openchangemoney">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">

				<h4 class="modal-title"><?=$lang_moneychange?></h4>
			</div>
			<div class="modal-body text-center">
		<h1 style="color: red;font-weight: bold;font-size: 100px;">
		{{changemoney | number:2}}
		</h1>
<br />



<button ng-show="printer_ul =='0'" class="btn btn-primary btn-lg" style="height:100px;font-size: 30px;font-weight: bold;" ng-click="printDivmini()"><?=$lang_billmini?>(slip)</button>

<button ng-show="printer_ul !='0'" class="btn btn-primary btn-lg" style="height:100px;font-size: 30px;font-weight: bold;" ng-click="printDivminiip()"><?=$lang_billmini?>(slip)</button>


<!-- <button class="btn btn-primary btn-lg"  ng-click="printDivfull()"><?=$lang_billfull?>(A4)</button> -->


<hr />

<button type="button" class="btn btn-danger btn-lg" ng-click="clickokafterpay()">ປິດໜ້າ(Esc)</button>



			</div>

		</div>
	</div>
</div>













<hr />



</div>
</div>






<div class="modal fade" id="Opencustomer">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_searchcus?></h4>
			</div>
			<div class="modal-body">

<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="customer_name" class="form-control" placeholder="<?=$lang_searchkeyword?>" style="height: 45px;width: 400px;font-size: 20px;">
</div>
<div class="form-group">
<button type="submit" ng-click="Searchcustomer()" class="btn btn-success btn-lg" placeholder="" title="<?=$lang_searchcus?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<div class="form-group">
<a href="<?php echo $base_url; ?>/mycustomer" class="btn btn-default btn-lg" placeholder="" title="<?=$lang_addcus?>" target="_blank"><?=$lang_addcus?></a>
</div>
</form>
<br />
<table class="table table-hover">
	<thead>
		<tr class="trheader">
			<th><?=$lang_select?></th><th><?=$lang_memberid?></th><th><?=$lang_cusname?></th><th><?=$lang_address?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in customerlist">
			<td><button class="btn btn-success" ng-click="Selectcustomer(x)">
<?=$lang_select?>
			</button></td>
			<td>{{x.cus_add_time}}</td>
			<td>{{x.cus_name}}</td>
			<td>{{x.cus_tel}} {{x.cus_address}}  {{x.district_name}} {{x.amphur_name}} {{x.province_name}} {{x.cus_address_postcode}} </td>
		</tr>
	</tbody>
</table>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="Modalproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_productlist?></h4>
			</div>
			<div class="modal-body">
	<input type="text" ng-model="searchproduct" placeholder="ຄົ້ນຫາລະຫັດຫຼືຊື່ລູກຄ້າ" style="width:300px;" class="form-control">
<br />
<div style="overflow: auto;height: 400px;">
<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th>ເລືອກ</th><th>ລະຫັດສິນຄ້າ</th><th>ຊື່ສິນຄ້າ</th><th> ລາຄາ</th><th>ສ່ວນຫຼຸດຕໍ່ໜ່ວຍ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="y in productlist | filter:searchproduct" >
			<td><button ng-click="Selectproduct(y,indexrow)" class="btn btn-success">ເລືອກ</button></td>
			<td align="center">{{y.product_code}}</td><td>{{y.product_name}}</td>
			<td align="right">{{y.product_price | number:2}}</td>
			<td align="right">{{y.product_price_discount | number:2}}</td>
		</tr>
	</tbody>
</table>
</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>







<div class="modal fade" id="Openone">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-body" id="section-to-print2">
		<center>

<span ng-if="pay_type!='4'" style="font-size: 35px;font-weight: bold;">ໃບບິນຮັບເງິນ/ໃບສົ່ງສິນຄ້າ</span>

<span ng-if="pay_type=='4'" style="font-size: 35px;font-weight: bold;">ໃບຄ້າງຊຳລະ</span>
		</center>
<table class="table table-bordered" style="table-layout: fixed;">
	<tr>
<td width="150px">
	<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="100px">
<br />
	<center style="font-size:100px;font-weight:bold;">{{number_for_cus | number}}</center>
</td>
		<td>
		<b>	<?php echo $_SESSION['owner_name']; ?> </b>
		<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
<br />
<?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>

</td>
</tr>
<tr>
			<td colspan="2">
	<?=$lang_runno?>:{{sale_runno}} , <?=$lang_cusname?>: {{cus_name}}	, <?=$lang_address?>: {{cus_address_all}}
</td>
</tr>
</table>

<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="width:10px;">ລາຍການ</th>
			<th ><?=$lang_barcode?></th>
			<th><?=$lang_productname?></th>
			<th style="width:300px;">ລາຍລະອຽດ</th>

			<th><?=$lang_saleprice?></th>
			<th><?=$lang_discountperunit?></th>
			<th><?=$lang_qty?></th>
			<th><?=$lang_priceall?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in listone">
			<td align="center" style="width:10px;">{{$index+1}}</td>
			<td align="center" style="width:50px;">{{x.product_code}}</td>
			<td><pre style="text-align: left;white-space: pre-line;background-color:#fff;border: 0px;border-radius: 0px;font-size: 16px;">
				{{x.product_name}}</pre></td>
			<td style="width:300px;">{{x.product_des}}</td>

			<td align="right" style="width:50px;">{{x.product_price | number:2}}</td>
			<td align="right" style="width:50px;">{{x.product_price_discount | number:2}}</td>
			<td align="right" style="width:5px;">{{x.product_sale_num | number}}</td>
			<td align="right" style="width:50px;">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}</td>
		</tr>
		<tr>
			<td colspan="6"  align="right" style="font-weight: bold;">
			<?=$lang_all?></td>

			<td align="right" style="font-weight: bold;">{{sumsale_num | number}}</td>
			<td align="right" style="font-weight: bold;"><u>{{sumsale_price | number:2}}</u></td>
		</tr>


<!-- <tr ng-if="vat3 > '0'">
		<td align="right" colspan="6">VAT {{vat3}}%</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-sumsale_price | number:2}}</td>
		</tr>


<tr ng-if="vat3 > '0'">
		<td align="right" colspan="6"><?=$lang_pricesumvat?></td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat | number:2}}</td>
		</tr> -->





	<?php
if($_SESSION['owner_vat_status']=='1'){
?>
 <tr ng-if="vat3=='0'">
		<td align="right" colspan="7"><?=$lang_vat?> {{<?=$_SESSION['owner_vat']?>}}%</td>
		<td style="font-weight: bold;" align="right">
		{{((sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?>)*(<?=$_SESSION['owner_vat']?>/100) | number:2}}</td>
		</tr>




		<tr ng-if="vat3=='0'">
		<td align="right" colspan="7"><?=$lang_pricebeforvat?></td>
		<td style="font-weight: bold;" align="right">
		{{(sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?> | number:2}}</td>
		</tr>

		<tr ng-if="vat3=='0'">
		<td align="right" colspan="7">ราคารวม vat</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat | number:2}}</td>
		</tr>


<tr ng-if="vat3!='0'">
		<td align="right" colspan="7"><?=$lang_vat?> {{vat3}}%</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-sumsale_price | number:2}}</td>
		</tr>




		<tr ng-if="vat3!='0'">
		<td align="right" colspan="7"><?=$lang_pricebeforvat?></td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-(sumsalevat-sumsale_price) | number:2}}</td>
		</tr>

		<tr ng-if="vat3!='0'">
		<td align="right" colspan="7">ราคารวม vat</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat | number:2}}</td>
		</tr>



<?php
}
?>



<?php
if($_SESSION['owner_vat_status']=='2'){
?>
 <tr ng-if="vat3!='0'">
		<td align="right" colspan="7"><?=$lang_vat?> {{vat3}}%</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-sumsale_price | number:2}}</td>
		</tr>




		<tr ng-if="vat3!='0'">
		<td align="right" colspan="7"><?=$lang_pricebeforvat?></td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-(sumsalevat-sumsale_price) | number:2}}</td>
		</tr>

		<tr ng-if="vat3!='0'">
		<td align="right" colspan="7">ราคารวม vat</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat | number:2}}</td>
		</tr>

<?php
}
?>




		<tr><td align="right" colspan="7"><?=$lang_discount?></td>
		<td  style="font-weight: bold;" align="right">{{discount_last2 | number:2}}</td></tr>
		<tr><td align="right" colspan="7"><?=$lang_sumall?></td>
		<td  style="font-weight: bold;" align="right"><u>{{sumsalevat-discount_last2 | number:2}}</u></td></tr>
		<tr><td align="right" colspan="7"><?=$lang_getmoney?></td>
		<td  style="font-weight: bold;" align="right">{{money_from_customer3 | number:2}}</td></tr>
		<tr>
			<td align="right" colspan="7">
<span ng-if="pay_type=='4'">ຄ້າງຊຳລະ</span>

<span ng-if="pay_type!='4'"><?=$lang_moneychange?></span>

			</td>

		<td  style="font-weight: bold;" align="right">{{money_from_customer3-(sumsalevat-discount_last2) | number:2}}</td></tr>
	</tbody>
</table>

<table style="width: 100%">

	<tbody>
		<tr>
			<td style="width: 50%;">
				<center> <b>ຜູ້ຊຳລະ</b>
				<br /><br />

				ລົງຊື່............................................................
				<br />
				ວັນທີ {{adddate}}</center>

			</td>
			<td style="width: 50%;">
				<center><b>ຜູ້ຮັບເງິນ</b>
				<br /><br />

				ລົງຊື່............................................................
				<br />
				ວັນທີ {{adddate}}	</center>

			</td>
		</tr>
	</tbody>
</table>





			</div>


			<div class="modal-footer">
			<button class="btn btn-primary" ng-click="printDiv()"><?=$lang_print?></button>
			<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>

			</div>
		</div>
	</div>
</div>















<div class="modal fade" id="getpotmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">ລາຍການ ອ໋ອບຊັນເສີມ <br />
					<span style="color:red;"> {{potdata.product_name}}
</span>
					</h4>
			</div>
			<div class="modal-body" style="height:450px;overflow: auto;">
ລາຍການ ອ໋ອບຊັນເສີມ
<br />


<div class="col-xs-4 col-sm-4 col-md-4 text-center btn btn-default" ng-repeat="x in getproductpotlist"  ng-click="Selectpot(x)">
<center>
	<img ng-src="<?php echo $base_url?>/{{x.product_ot_image}}" class="img img-responsive" style="max-height: 83px;" />
</center>
<p>
</p>
<b>{{x.product_ot_name}}</b>
<br />
ລາຄາ: {{x.product_ot_price}}
<br />
	<button class="btn btn-lg btn-success">ເລືອກ</button>
</div>

<div class="col-md-12">
<hr />
</div>

<div class="col-xs-4 col-sm-4 col-md-4 text-center btn btn-default" ng-repeat="x in getproductpotlistshowall"  ng-click="Selectpot(x)">
<center>
	<img ng-src="<?php echo $base_url?>/{{x.product_ot_image}}" class="img img-responsive" style="max-height: 83px;" />
</center>
<p>
</p>
<b>{{x.product_ot_name}}</b>
<br />
ราคา: {{x.product_ot_price}}
<br />
	<button class="btn btn-lg btn-success">ເລືອກ</button>
</div>






</center>

			</div>
			<div class="modal-footer">
<button type="button" class="btn btn-default btn-lg" data-dismiss="modal">ປິດ</button>
			</div>
		</div>
	</div>
</div>













<div class="modal fade" id="Openonesend">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

	<select ng-model="lung" ng-change="Selectlung(lung)" class="form-control" style="font-size: 20px;text-align: center;height: 40px;">
		<option value="1">
			ເລືອກໃບຕິດໜ້າກ່ອງໃຫຍ່ເຈ້ຍ A4
		</option>
		<option value="2">
			ເລືອກໃບຕິດໜ້າກ່ອງນ້ອຍ
		</option>
	</select>
	<button class="btn btn-primary" ng-click="printDiv()"><?=$lang_print?></button>
			<div class="modal-body" id="section-to-print2">




<table ng-if="lung=='2'" class="table table-bordered" style="table-layout: fixed;">
	<tr>
<td>
	<span style="font-size: 30px;"> ຜູ້ສົ່ງ </span>

<br />
	<span style="font-size: 20px;"><b>	<?php echo $_SESSION['owner_name']; ?> </b>
	<br />
		<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
</span>

</td>
<td>
			<span style="font-size: 30px;">	ຜູ້ຮັບ </span>
			<br />
	<span style="font-size: 20px;">
<b>{{dataprintsend.cus_name}}</b>
	<br />
ທີ່ຢູ່: {{dataprintsend.cus_address_all}}

	</span>
</td>
</tr>
</table>




<table ng-if="lung=='1'" class="table table-bordered" style="table-layout: fixed;">
	<tr>
<td align="center" style="height: 500px;">
	<span style="font-size: 50px;"> ຜູ້ສົ່ງ </span>

<br />
	<span style="font-size: 30px;"><b>	<?php echo $_SESSION['owner_name']; ?> </b>
	<br />
		<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
</span>

</td>
</tr>
<tr>
			<td align="center" style="height: 500px;">
			<span style="font-size: 60px;">	ຜູ້ຮັບ </span>
			<br />
	<span style="font-size: 30px;">
<b>{{dataprintsend.cus_name}}</b>
	<br />
ທີ່ຢູ່: {{dataprintsend.cus_address_all}}

	</span>
</td>
</tr>
</table>




			</div>


			<div class="modal-footer">
			<button class="btn btn-primary" ng-click="printDiv()"><?=$lang_print?></button>
			<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>

			</div>
		</div>
	</div>
</div>
















<div class="modal fade" id="Openshiftmodal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">


			<div class="modal-body">
<center>


	<?php if($_SESSION['user_type'] < '9'){?>




<?php if(isset($_SESSION['shift_id_old'])){;?>

<button ng-if="printer_ul =='0'" ng-click="Openbillcloseday()" class="btn btn-info btn-lg"   >ພິມບິນປິດຍອດກະ <?php if(isset($_SESSION['shift_id_old'])){echo $_SESSION['shift_id_old'];} ?></button>

<button ng-if="printer_ul !='0' " type="button" class="btn btn-info btn-lg" ng-click="Openbillclosedayip()" >ພິມບິນປິດຍອດກະ <?php if(isset($_SESSION['shift_id_old'])){echo $_SESSION['shift_id_old'];} ?></button>


<hr />
<?php } ?>

<b>ເປີດກະການຂາຍໃໝ່</b>
<br />
<input type="text" class="form-control" style="font-size:20px;font-weight:bold;height:50px;" ng-model="shift_money_start" placeholder="ເງິນໃນລີ້ນຊັກເລີ່ມຕົ້ນ x.xx"/>
<br>
<button ng-show="shift_money_start" class="btn btn-lg btn-info" ng-click="Openshiftnow()">
ເລີ່ມຂາຍ
</button>


<?php }else{
	echo '<h1>ກະລຸນາຖ້າເປີດກະ</h1>';
}?>
</center>



			</div>


			<div class="modal-footer">
				<center>
				<a href="<?php echo $base_url;?>" class="btn btn-xs btn-default">
					ໄປໜ້າທຳອິດ
				</a>


				<a href="<?php echo $base_url;?>/logout" class="btn btn-xs btn-default">
				<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
				ອອກຈາກລະບົບ</a>
				</center>
			</div>
		</div>
	</div>
</div>







<div class="modal fade" id="Closeshiftnow">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">


			<div class="modal-body">
<center>
<b>ປິດກະສົ່ງເງິນ</b>
<br />
<input type="text" class="form-control" style="font-size:20px;font-weight:bold;height:50px;" ng-model="shift_money_end" placeholder="ເງິນໃນລີ້ນຊັກ x.xx"/>
<br>
<button ng-show="shift_money_end" class="btn btn-lg btn-info" ng-click="Closeshiftnowconfirm()">
ຢືນຢັນການປິດກະ
</button>
</center>



			</div>


			<div class="modal-footer">

				<center>
				<a href="<?php echo $base_url;?>" class="btn btn-xs btn-default">
					ໄປໜ້າທຳອິດ
				</a>


			<a href="<?php echo $base_url;?>/logout" class="btn btn-xs btn-default">
<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
				ອອກຈາກລະບົບ</a>


				<button type="button" class="btn btn-default btn-xs" data-dismiss="modal" aria-hidden="true">ປິດໜ້າ</button>


			</center>



			</div>
		</div>
	</div>
</div>















<div class="modal fade" id="Openbillcloseday">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-body">
<form class="form-inline">
<div class="form-group">

</div>


</form>


		<div  id="section-to-print" style="font-size: 14px;text-align: left;background-color: #fff;overflow:visible !important;">

<center>
<td width="250px" align="center">
	<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="200px">
</td>
</tr>
</table>
</center>

		<b><span style="font-size: 25px;">	<?php echo $_SESSION['owner_name']; ?></span> </b>

		<br />
<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>

<br />
______________________
<br />
ບິນປິດຍອດກະທີ <?php if(isset($_SESSION['shift_id_old'])){ echo $_SESSION['shift_id_old'];}?>
<br/>
ເລີ່ມ: <?php if(isset($_SESSION['shift_start_time_old'])){ echo $_SESSION['shift_start_time_old'];}?>
<br />
ເຖິງ: <?php if(isset($_SESSION['shift_end_time_old'])){ echo $_SESSION['shift_end_time_old'];}?>
<br />
<?php
if(isset($_SESSION['shift_id_old'])){
$moneyshiftchange = number_format($_SESSION['shift_money_end_old']-$_SESSION['shift_money_start_old'],'2');
echo 'ເງິນໃນລີ້ນຊັກສຸດທ້າຍ ( '.number_format($_SESSION['shift_money_end_old'],'2').' )
<br />ເງິນໃນລີ້ນຊັກເລີ່ມຕົ້ນ ( '.number_format($_SESSION['shift_money_start_old'],'2').' )
<br />ສ່ວນຕ່າງ ( '.$moneyshiftchange.' )';
}
?>
<br />
______________________


<table style="width: 100%;">

	<tbody>
		<tr ng-repeat="x in openbillclosedaylista">
			<td>{{x.product_category_name2}}</td>

			<td align="right">{{x.product_price2 | number:2}}</td>
		</tr>

</tbody>
</table>
______________________
 <table style="width: 100%;">

	<tbody>

        <tr ng-repeat="x in openbillclosedaylistb">
			<td><?=$lang_discount?></td>
			<td align="right">{{x.discount_last2 | number:2}}</td>

		</tr>
	</tbody>
</table>

______________________
<table  style="width: 100%;">

	<tbody>
		<tr ng-repeat="x in openbillclosedaylistc">
			<td>
			<span ng-if="x.pay_type=='1'"><?=$lang_cash?></span>
			<span ng-if="x.pay_type=='3'"><?=$lang_creditcard?></span>
			<span ng-if="x.pay_type=='5'">QR Payment</span>
		</td>

			<td align="right">{{x.sumsale_price2-x.discount_last2 | number:2}}</td>
		</tr>
     </tbody>
</table>
______________________
    <table  style="width: 100%;">
	<tbody>
        <tr ng-repeat="x in openbillclosedaylistb">
			<td><?=$lang_all?></td>
			<td align="right">{{x.sumsale_price2-x.discount_last2 | number:2}}</td>
		</tr>
	</tbody>
</table>


______________________
		<table width="100%">
			<tr>
				<td style="text-align: left;"><?=$lang_sales?> </td>
				<td style="text-align: left;"><?php echo $_SESSION['name']; ?></td>
				<td> </td>
			</tr>

		</table>
<?=$lang_day?>: {{adddate}}
<br />
______________________


ລາຍການສິນຄ້າ
 <table style="width: 100%;">

	<tbody>

        <tr>
			<td>ຊື່ສິນຄ້າ</td>
			<td>
			ຈຳນວນ
			</td>
			<td>ລວມເງິນ</td>

		</tr>
		<tr ng-repeat="x in openbillclosedaylistproduct">
	<td>{{x.product_name}}</td>
	<td style="text-align:center;">
		{{x.product_sale_num | number}}
	</td>
	<td align="right">	{{x.product_sale_price | number:2}}</td>

</tr>
	</tbody>
</table>

______________________



</div>

			</div>
			<div class="modal-footer">
	<button type="button" ng-if="printer_ul =='0'" class="btn btn-primary" ng-click="printDiv()"><?=$lang_print?></button>




	<button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_close?></button>
			</div>
		</div>
	</div>
</div>












<div style="position: absolute; opacity: 0.0;">

<div class="modal fade" id="Openbillclosedayip">
	<div class="modal-dialog" style="width: 790px;">
		<div class="modal-content">

			<div class="modal-body">
<form class="form-inline">
<div class="form-group">

</div>


</form>


		<div  id="section-to-print-billclose" style="width: <?php echo $pt_width;?>;font-size: 30px;text-align: left;background-color: #fff;overflow:visible !important;">

<center>
<td width="250px" align="center">
	<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="200px">
</td>
</tr>
</table>
</center>

		<b><span style="font-size: 30px;">	<?php echo $_SESSION['owner_name']; ?></span> </b>

		<br />
<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>

<br />
____________________________________________
<br />
ບິນປິດກະທີ <?php if(isset($_SESSION['shift_id_old'])){ echo $_SESSION['shift_id_old'];}?>
<br/>
ເລີ່ມ: <?php if(isset($_SESSION['shift_start_time_old'])){ echo $_SESSION['shift_start_time_old'];}?>
<br />
ເຖິງ: <?php if(isset($_SESSION['shift_end_time_old'])){ echo $_SESSION['shift_end_time_old'];}?>
<br />
<?php
if(isset($_SESSION['shift_id_old'])){
$moneyshiftchange = number_format($_SESSION['shift_money_end_old']-$_SESSION['shift_money_start_old'],'2');
echo 'ເງິນໃນລີ້ນຊັກສຸດທ້າຍ ( '.number_format($_SESSION['shift_money_end_old'],'2').' )
<br />ເງິນໃນລີ້ນຊັກເລີ່ມຕົ້ນ ( '.number_format($_SESSION['shift_money_start_old'],'2').' )
<br />ສ່ວນຕ່າງ ( '.$moneyshiftchange.' )';
}
?>
<br />
____________________________________________


<table style="width: 100%;">

	<tbody>
		<tr ng-repeat="x in openbillclosedaylista">
			<td>{{x.product_category_name2}}</td>

			<td align="right">{{x.product_price2 | number:2}}</td>
		</tr>

</tbody>
</table>
____________________________________________
 <table style="width: 100%;">

	<tbody>

        <tr ng-repeat="x in openbillclosedaylistb">
			<td><?=$lang_discount?></td>
			<td align="right">{{x.discount_last2 | number:2}}</td>

		</tr>
	</tbody>
</table>

____________________________________________
<table  style="width: 100%;">

	<tbody>
		<tr ng-repeat="x in openbillclosedaylistc">
			<td>
			<span ng-if="x.pay_type=='1'"><?=$lang_cash?></span>
			<span ng-if="x.pay_type=='3'"><?=$lang_creditcard?></span>
			<span ng-if="x.pay_type=='5'">QR Payment</span>
		</td>

			<td align="right">{{x.sumsale_price2-x.discount_last2 | number:2}}</td>
		</tr>
     </tbody>
</table>
____________________________________________
    <table  style="width: 100%;">
	<tbody>
        <tr ng-repeat="x in openbillclosedaylistb">
			<td><?=$lang_all?></td>
			<td align="right">{{x.sumsale_price2-x.discount_last2 | number:2}}</td>
		</tr>
	</tbody>
</table>


____________________________________________
		<table width="100%">
			<tr>
				<td style="text-align: left;"><?=$lang_sales?> </td>
				<td style="text-align: left;"><?php echo $_SESSION['name']; ?></td>
				<td> </td>
			</tr>

		</table>
<?=$lang_day?>: {{adddate}}
<br />
____________________________________________


ລາຍການສິນຄ້າ
 <table style="width: 100%;">

	<tbody>

        <tr>
			<td>ຊື່ສິນຄ້າ</td>
			<td>
			ຈຳນວນ
			</td>
			<td>ລວມເງິນ</td>

		</tr>
		<tr ng-repeat="x in openbillclosedaylistproduct">
	<td>{{x.product_name}}</td>
	<td style="text-align:center;">
		{{x.product_sale_num | number}}
	</td>
	<td align="right">	{{x.product_sale_price | number:2}}</td>

</tr>
	</tbody>
</table>

____________________________________________



</div>

			</div>
			<div class="modal-footer">
	<button type="button" ng-if="printer_ul =='0'" class="btn btn-primary" ng-click="printDiv2()"><?=$lang_print?></button>




	<button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_close?></button>
			</div>
		</div>
	</div>
</div>

</div>











<div class="modal fade" id="Openonemini"  style="visibility: hidden;">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_billmini?></h4>

			</div> -->
			<div class="modal-body">
			<div  id="section-to-print" style="font-size: 12px;">
		<center>

<?php
if($_SESSION['owner_logo']!=''){
?>
<center>
<table width="100%">
	<tr>
<td width="100px" align="center">
<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" style="width: 100px;">
</td>
</tr>
</table>
</center>
<?php
}
?>
<br />
<center style="font-size:20px;font-weight:bold;">{{number_for_cus | number}}</center>
<br />
		<b><span style="font-size: 14px;">	<?php echo $_SESSION['owner_name']; ?></span> </b>
		<!--<br />
		 <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?> -->
		<br />
<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
<br />
<?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>
<br />
<?=$lang_runno?>:{{sale_runno}}
<br />
			---------------------------------
				<br />
<?=$lang_billmini?>

<!--<br />

 (VAT <span ng-if="vat3 == '0'">Included</span><span ng-if="vat3 > '0'">{{vat3}} %</span>)
 -->

<br />
<span ng-if="cus_name != null">
---------------------------------
<br />
<?=$lang_cusname?>: {{cus_name}}
<br />
 <?=$lang_address?>: {{cus_address_all}}
  <br />
 </span>
		---------------------------------
		<br />
	<?=$lang_productservice?>

</center>

<table width="95%">

		<tr ng-repeat="x in listone">

			<td width="70%" style="text-align: left; white-space: nowrap;"> {{x.product_name}}x</td>
			
			<td  width="30%" style="text-align: left; white-space: nowrap;">{{x.product_sale_num | number}}={{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}</td>
		</tr>
		<!-- create line -->
		<tr>
		<td style="text-align: center; white-space: nowrap; border-bottom: 1px solid black;" colspan="2">&nbsp;</td>
		</tr>
		<!-- create line -->
		<tr>

			<td style="text-align:  center; white-space: nowrap;"><?=$lang_summary?></td>


			<td  style="text-align: right; white-space: nowrap;">{{sumsale_price | number:2}}</td>
		</tr>

		


<?php
if($_SESSION['owner_vat_status']!='0'){
?>
 <tr>
<td><?=$lang_vat?> <?=$_SESSION['owner_vat']?> %</td>
		<td  style="font-weight: bold;" align="right">
		{{((sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?>)*(<?=$_SESSION['owner_vat']?>/100) | number:2}}</td>
		</tr>


		<tr>
		<td><?=$lang_pricebeforvat?></td>
		<td align="right">
		{{(sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?> | number:2}}</td>
		</tr>

		<tr>
		<td>ລາຄາລວມ vat</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat | number:2}}</td>
		</tr>
		

<?php } ?>
		

		<tr>

		<td style="text-align: center; white-space: nowrap;"><?=$lang_discount?></td>
		<td align="right" style="text-align: center; white-space: nowrap;">{{discount_last2 | number:2}}</td>
		</tr>
	
		

		<tr>
		
		<td style="text-align: center; white-space: nowrap;"><?=$lang_sumall?></td>
		<td align="right" style="font-weight: bold;">{{sumsalevat-discount_last2 | number:2}}</td>
		</tr>


		<tr>

		<td style="text-align: center; white-space: nowrap;"><?=$lang_getmoney?></td>
		<td align="right" style="text-align: center; white-space: nowrap;">{{money_from_customer3 | number:2}}</td></tr>
		<tr>

		<td style="text-align: center; white-space: nowrap;"><?=$lang_moneychange?></td>
		<td align="right" style="text-align: center; white-space: nowrap;">{{money_from_customer3 -(sumsalevat-discount_last2) | number:2}}</td></tr>

</table>

<center>

		<center>___________________________</center>

<?=$lang_sales?>: <?php echo $_SESSION['name']; ?>
<br />


<?=$lang_day?>: {{adddate}}
<!-- <br />
<img src="<?php echo $base_url;?>/warehouse/barcode/png?barcode={{sale_runno}}" style="height: 70px;width: 160px;"> -->


<br />
<br />
<?=$_SESSION['footer_slip']?>
<br />
___________________________<centter>
</div>

			</div>
			<div class="modal-footer">
			<button class="btn btn-primary" ng-click="printDiv()">
			<?=$lang_print?></button>
			<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>

			</div>
		</div>
	</div>
</div>









<div class="modal fade" id="Opengetmoneymodal">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-body" style="height:550px;">


<center>


							<input type="text" id="money_from_customer_id" class="form-control" ng-model="money_from_customer" placeholder="ຮັບເງິນຈາກລູກຄ້າ" style="text-align: right;height: 70px;background-color:#dff0d8;font-size: 40px;font-weight:bold;">


<br />

<div ng-click="Addnumbermoney('1')" class="col-xs-3 col-sm-3 col-md-3 btn btn-default" style="font-size:40px;font-weight:bold;height: 70px;">
	1
</div>
<div ng-click="Addnumbermoney('2')" class="col-xs-3 col-sm-3 col-md-3 btn btn-default" style="font-size:40px;font-weight:bold;height: 70px;">
	2
</div>
<div ng-click="Addnumbermoney('3')" class="col-xs-3 col-sm-3 col-md-3 btn btn-default" style="font-size:40px;font-weight:bold;height: 70px;">
	3
</div>
<div ng-click="Addnumbermoney('4')" class="col-xs-3 col-sm-3 col-md-3 btn btn-default" style="font-size:40px;font-weight:bold;height: 70px;">
	4
</div>



<div ng-click="Addnumbermoney('5')" class="col-xs-3 col-sm-3 col-md-3 btn btn-default" style="font-size:40px;font-weight:bold;height: 70px;">
	5
</div>
<div ng-click="Addnumbermoney('6')" class="col-xs-3 col-sm-3 col-md-3 btn btn-default" style="font-size:40px;font-weight:bold;height: 70px;">
	6
</div>
<div ng-click="Addnumbermoney('7')" class="col-xs-3 col-sm-3 col-md-3 btn btn-default" style="font-size:40px;font-weight:bold;height: 70px;">
	7
</div>
<div ng-click="Addnumbermoney('8')" class="col-xs-3 col-sm-3 col-md-3 btn btn-default" style="font-size:40px;font-weight:bold;height: 70px;">
	8
</div>


<div ng-click="Addnumbermoney('9')" class="col-xs-3 col-sm-3 col-md-3 btn btn-default" style="font-size:40px;font-weight:bold;height: 70px;">
	9
</div>
<div ng-click="Addnumbermoney('0')" class="col-xs-3 col-sm-3 col-md-3 btn btn-default" style="font-size:40px;font-weight:bold;height: 70px;">
	0
</div>
<div ng-click="Addnumbermoney('20')" class="col-xs-3 col-sm-3 col-md-3 btn btn-info" style="font-size:40px;font-weight:bold;height: 70px;">
	20
</div>
<div ng-click="Addnumbermoney('50')" class="col-xs-3 col-sm-3 col-md-3 btn btn-info" style="font-size:40px;font-weight:bold;height: 70px;">
	50
</div>


<div ng-click="Addnumbermoney('100')" class="col-xs-3 col-sm-3 col-md-3 btn btn-info" style="font-size:40px;font-weight:bold;height: 70px;">
	100
</div>
<div ng-click="Addnumbermoney('500')" class="col-xs-3 col-sm-3 col-md-3 btn btn-info" style="font-size:40px;font-weight:bold;height: 70px;">
	500
</div>
<div ng-click="Addnumbermoney('1000')" class="col-xs-3 col-sm-3 col-md-3 btn btn-info" style="font-size:40px;font-weight:bold;height: 70px;">
	1000
</div>
<div ng-click="Addnumbermoney('x')" class="col-xs-3 col-sm-3 col-md-3 btn btn-warning" style="font-size:20px;font-weight:bold;height: 70px;">
x <br />	ລົບທັງໝົດ
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<br /><br />
</div>

<button type="submit"  class="col-xs-12 col-sm-12 col-md-12 btn btn-success" style="font-size:40px;font-weight:bold;height: 70px;" id="savesale" ng-click="Savesale(money_from_customer,Sumsalepricevat(),discount_last )">
	ຢືນຢັນ(Enter)
</button>




</center>



			</div>
			<div class="modal-footer">
		<center>
			<button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">ປິດໜ້າຕ່າງ(Esc)</button>
</center>
			</div>
		</div>
	</div>
</div>










<div style="position: absolute; opacity: 0.0;">
<div class="modal fade" id="Openoneminiip">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-body">
			<div  id="section-to-print-slip" style="width: <?php echo $pt_width;?>;font-size: 30px;text-align: left;background-color: #fff;overflow:visible !important;">



				<?php
if($_SESSION['owner_logo']!=''){
?>

<center>
<table width="100%">
	<tr>
<td width="250px" align="center">
<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" style="width: 200px;">
</td>
</tr>
</table>
</center>
<?php
}
?>
<br />
<center style="font-size:20px;font-weight:bold;">{{number_for_cus | number}}</center>
<br />
		<b><span>	<?php echo $_SESSION['owner_name']; ?></span> </b>
		<!--<br />
		 <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?> -->
		<br />
<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
<br />
<?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>
<br />
<?=$lang_runno?>:{{sale_runno}}
<br />
			__________________________________________

<table width="100%">
	<tr>
		<td width="30%"></td>
		<td><?=$lang_billmini?></td>
	</tr>
</table>


<!--<br />

 (VAT <span ng-if="vat3 == '0'">Included</span><span ng-if="vat3 > '0'">{{vat3}} %</span>)
 -->

<b ng-if="cus_id != null">
__________________________________________
<br />
<?=$lang_cusname?>: {{cus_name}}
<br />
 <?=$lang_address?>: {{cus_address_all}}
  <br />
 </b>
		__________________________________________
		<table width="100%">
	<tr>
		<td width="30%"></td>
		<td><?=$lang_productservice?></td>
	</tr>
</table>
<table style="width: 100%;font-size: 30px;">

		<tr ng-repeat="x in listone">

			<td width="50%" style="text-align: left;">
			<pre style="text-align: left;white-space: pre-line;background-color:#fff;border: 0px;border-radius: 0px;font-size: 25px;">	{{x.product_name}} </pre>
			</td>
			<td valign="top">
				{{x.product_sale_num | number}}
			</td>
			<td align="right" valign="top">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}</td>
		</tr>
		<tr>

			<td  style="text-align: left;"><?=$lang_summary?></td>
			<td></td>

			<td align="right">{{sumsale_price | number:2}}</td>
		</tr>

<tr ng-if="vat3 > '0'">
<td  style="text-align: left;"><?=$lang_vat?> {{vat3}} %</td>
<td></td>
		<td  style="font-weight: bold;" align="right">
		{{sumsale_price*(vat3/100) | number:2}}</td>
		</tr>


		<tr  ng-if="vat3 > '0'">
		<td  style="text-align: left;"><?=$lang_pricesumvat?></td>
		<td></td>
		<td align="right">
		{{sumsalevat | number:2}}</td>
		</tr>




<?php
if($_SESSION['owner_vat_status']!='0'){
?>
 <tr>
<td><?=$lang_vat?> <?=$_SESSION['owner_vat']?> %</td>
		<td  style="font-weight: bold;" align="right">
		{{((sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?>)*(<?=$_SESSION['owner_vat']?>/100) | number:2}}</td>
		</tr>


		<tr>
		<td><?=$lang_pricebeforvat?></td>
		<td align="right">
		{{(sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?> | number:2}}</td>
		</tr>
<?php } ?>



		<tr>

		<td  style="text-align: left;"><?=$lang_discount?></td>
		<td></td>
		<td align="right">{{discount_last2 | number:2}}</td></tr>

		<tr>

		<td  style="text-align: left;"><?=$lang_sumall?></td>
		<td></td>
		<td align="right" style="font-weight: bold;">{{sumsalevat-discount_last2 | number:2}}</td></tr>


		<tr>

		<td  style="text-align: left;"><?=$lang_getmoney?></td>
		<td></td>
		<td align="right">{{money_from_customer3 | number:2}}</td></tr>

		<tr>

		<td  style="text-align: left;"><?=$lang_moneychange?></td>
		<td></td>
		<td align="right">{{money_from_customer3 -(sumsalevat-discount_last2) | number:2}}</td></tr>

</table>

		__________________________________________

<table width="100%">
	<tr>
		<td><?=$lang_sales?></td>
		<td><?php echo $_SESSION['name']; ?></td>
	</tr>
	<tr>
		<td><?=$lang_day?></td>
		<td>{{adddate}}	</td>
	</tr>

</table>
<span style="text-align:left;"><?=$_SESSION['footer_slip']?></span>
<br />
__________________________________________
</div>

			</div>
			<div class="modal-footer">
			<button class="btn btn-primary" ng-click="printDiv()">
			<?=$lang_print?></button>
			<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>

			</div>
		</div>
	</div>
</div>

</div>







	</div>










<?php if($_SESSION['user_type'] < '9'){?>
<div class="col-sm-12 col-md-12">
	<hr />
</div>

<div class="col-sm-12 col-md-12">
	<div class="panel panel-default">
	<div class="panel-body">

ລາຍການຂາຍລ້າສຸດ


 <div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut">
	<?=$lang_showdel?>
</div>


<form class="form-inline">

<div class="form-group">
<input type="text" ng-model="searchtext" ng-change="getlist(searchtext,'1')" class="form-control" placeholder="<?=$lang_search?> Runno, ชื่อลูกค้า">
</div>

 <div class="form-group">
<button type="submit" ng-click="getlist(searchtext,'1')" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>

</form>
<br />




<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th><?=$lang_rank?></th>
			<th><?=$lang_runno?></th>
			<th><?=$lang_cusname?></th>



			<th><?=$lang_productnum?></th>
			<th><?=$lang_pricesum?></th>


<?php
if($_SESSION['owner_vat_status']=='2'){
?>
			 <th><?=$lang_vat?> Exclude %</th>
			<th><?=$lang_pricesumvat?></th>
<?php
}
?>


			<th>ສ່ວນຫຼຸດທ້າຍບິນ</th>
			<th><?=$lang_sumall?></th>
			<th><?=$lang_getmoney?></th>
			<th><?=$lang_moneychange?></th>
			<th><?=$lang_payby?></th>
			<th><?=$lang_day?></th>
			<th  ng-show="showdeletcbut" style="width: 50px;"><?=$lang_delete?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
			<td ng-show="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-show="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
			<td>

				<button ng-show="printer_ul =='0'" class="btn btn-primary btn-sm" ng-click="printDivmini2(x)">ພິມບິນ</button>

								<button ng-show="printer_ul !='0'" class="btn btn-primary btn-sm" ng-click="printDivminiip2(x)">ພິມບິນ</button>

				<button class="btn btn-default btn-sm" ng-click="Getone(x)">{{x.sale_runno}}</button>


			</td>
			<td>{{x.cus_name}}
<span ng-if="x.cus_name!=null">
	<br />
<button class="btn btn-default btn-xs" ng-click="printDivfullsend(x)">ພິມໃບຕິດໜ້າກ່ອງ</button>
</span>
			</td>


			<td  align="right">{{x.sumsale_num | number}}</td>
			<td  align="right">{{x.sumsale_price | number:2}}</td>


<?php
if($_SESSION['owner_vat_status']=='2'){
?>
			 <td  align="right">{{x.sumsale_price * (x.vat/100) | number:2}}</td>
	<td  align="right">{{ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price) | number:2}}</td>
<?php
}
?>



			<td  align="right">{{x.discount_last | number:2}}</td>
			<td  align="right">{{ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price) - x.discount_last | number:2}}</td>
			<td  align="right">{{x.money_from_customer | number:2}}</td>
			<td  align="right">{{x.money_from_customer - ((ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price)) - x.discount_last) | number:2}}</td>

			<td>
<span ng-if="x.pay_type=='1'"><?=$lang_retail?></span>
<span ng-if="x.pay_type=='2'"><?=$lang_transfer?></span>
<span ng-if="x.pay_type=='3'"><?=$lang_creditcard?></span>
<span ng-if="x.pay_type=='5'"><?=$lang_qrpayment?></span>
<span ng-if="x.pay_type=='4'"><?=$lang_owe?></span>

			</td>


			<td>{{x.adddate}}</td>
			<td ng-show="showdeletcbut" align="center"><button class="btn btn-xs btn-danger" ng-click="Deletelist(x)" id="delbut{{x.ID}}">
			<?=$lang_delete?></button></td>
		</tr>
	</tbody>
</table>


<form class="form-inline">
<div class="form-group">
<?=$lang_show?>
<select class="form-control" name="" id="" ng-model="perpage" ng-change="getlist(searchtext,'1',perpage)">
	<option value="10">10</option>
	<option value="20">20</option>
	<option value="30">30</option>
	<option value="50">50</option>
	<option value="100">100</option>
	<option value="200">200</option>
	<option value="300">300</option>
</select>

<?=$lang_page?>
<select name="" id="" class="form-control" ng-model="selectthispage"  ng-change="getlist(searchtext,selectthispage,perpage)">
	<option  ng-repeat="i in pagealladd" value="{{i.a}}">{{i.a}}</option>
</select>
</div>


</form>


</div>
	</div>
</div>
  
  </font>
<?php } ?>







	</div>




			<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {
$scope.customer_name = '';
$scope.cus_address_all = '';
$scope.listsale = [];
$scope.money_from_customer = '';
$scope.customer_id = '0';
$scope.product_code = '';
$scope.listone = [];


$scope.addvat = false;
$scope.vatnumber = 0;

$scope.sale_type = '1';
$scope.pay_type = '1';
$scope.discount_last = 0;
$scope.reserv = '0';

$scope.discount_percent = '0';
$scope.discount_last_percent = 0;

$scope.product_category_id = '0';

$scope.showvatslit = '0';

$scope.searchproductrank = '';

$scope.ParsefloatFunc = function(data){
return parseFloat(data);
};






$(window).keydown(function(event) {
if(event.keyCode == 120) {
console.log('F9 was pressed');

$scope.Opengetmoneymodal();
setTimeout(function(){
$("#money_from_customer_id").focus();
 }, 1000);


}

if(event.keyCode == 27) {
console.log('esc was pressed');
$scope.clickokafterpay();
$( "#product_code_id" ).focus();
location.reload();
}


if(event.keyCode == 13) {
console.log('Enter was pressed');

if($scope.listsale == '' || $scope.listsale[0].product_id=='0' ){
		toastr.warning('<?=$lang_addproductlistplz?>');
	}else if($scope.money_from_customer ==''){
//toastr.warning('<?=$lang_getmoneyplz?>');
}else if($scope.pay_type!='4' && $scope.money_from_customer < $scope.Sumsalepricevat()-$scope.discount_last ){
	toastr.warning('<?=$lang_getmoneymoreplz?>');
}else if($scope.pay_type=='4' && $scope.money_from_customer > $scope.Sumsalepricevat()-$scope.discount_last ){
		toastr.warning('ກະລຸນາຮັບເງິນໃຫ້ເທົ່າກັບລາຄາຂາຍ');
		}else if(isNaN($scope.money_from_customer) == true ){
	toastr.warning('<?=$lang_getmoneynumberplz?>');
}else if($scope.money_from_customer-$scope.Sumsalepricevat() >= 100000000000000000000000000  ){
	toastr.warning('<?=$lang_moneychangenotmore1000?>');
	}else{
$scope.Savesale();
setTimeout(function(){
	if($scope.printer_ul=='0'){
		//$scope.printDivmini();
}else{
		//$scope.printDivminiip();
}
 }, 1000);
}

}



});







<?php
if($_SESSION['owner_vat_status']=='0' || $_SESSION['owner_vat_status']=='1'){
?>

	$scope.vatnumber = 0;

<?php
}else if($_SESSION['owner_vat_status']=='2'){
?>

     $scope.vatnumber = <?=$_SESSION['owner_vat']?>;

<?php
}
?>





$scope.Addproductrank = function(){
$('#Addproductrankmodal').modal('show');
$scope.getproductlist();
};

$scope.Searchproductranklist = function(s){

	if(s==''){

$scope.productranklist = [];

}else{
   	$http.post("Salepic/Searchproductlist",{
	searchproduct: s
	}).success(function(data){
          $scope.productranklist = data;

        });

}

};

$scope.Addproductranksave = function(x){

console.log($scope.productlist);
if($scope.productlist.length !=  '0'){
rank = $scope.productlist.length - 1;
product_rank = $scope.productlist[rank].product_rank + 1;
}else{
product_rank = '1';
}

	$http.post("Salepic/Addproductranksave",{
	product_rank: product_rank,
	product_id: x.product_id
	}).success(function(data){
  toastr.success('<?=$lang_success?>');
  $scope.getproductlist();
        });

};




$scope.Delproductrank = function(){
$('#Delproductrankmodal').modal('show');
$scope.getproductlist();
};


$scope.Delproductranksave = function(x){

	$http.post("Salepic/Delproductranksave",{
	product_id: x.product_id
	}).success(function(data){
  toastr.success('<?=$lang_success?>');
  $scope.getproductlist();
        });

};


$scope.Openshiftmodal = function(){

$('#Openshiftmodal').modal({backdrop: "static", keyboard: false});

}
<?php if(!isset($_SESSION['shift_id'])){?>
$scope.Openshiftmodal();
<?php } ?>




$scope.Openshiftnow = function(){
	if(isNaN($scope.shift_money_start) == true ){
	toastr.warning('กรุณากรอกตัวเลข');
}else{

$http.post("Salepic/Openshiftnow",{
shift_money_start:$scope.shift_money_start
}).success(function(response){

window.location.href = '<?php echo $base_url;?>/sale/salepic';
        });

			}


};






$scope.Closeshiftnow = function(){
$('#Closeshiftnow').modal({backdrop: "static", keyboard: false});
};



$scope.Closeshiftnowconfirm = function(){

	if(isNaN($scope.shift_money_end) == true ){
	toastr.warning('กรุณากรอกตัวเลข');
}else{
$('#Closeshiftnow').modal('hide');
$http.post("Salepic/Closeshiftnowconfirm",{
shift_money_end:$scope.shift_money_end
}).success(function(response){
window.location.href = '<?php echo $base_url;?>/sale/salepic';
        });
}



};




$scope.Getpotmodal = function(x,index){

$('#getpotmodal').modal('show');
$scope.potdataindex = index;
$scope.potdata = x;
$http.post("<?php echo $base_url;?>/warehouse/Productlist/getpotlist",{
product_id: x.product_id
}).success(function(data){

$scope.getproductpotlist = data;


});




$http.post("<?php echo $base_url;?>/warehouse/Productlist/getpotlistshowall",{
}).success(function(data){

$scope.getproductpotlistshowall = data;


});




}





$scope.getcategory = function(){

$http.get('<?php echo $base_url;?>/warehouse/Productcategory/get')
       .then(function(response){
          $scope.categorylist = response.data.list;

        });
   };
$scope.getcategory();




$scope.Searchcustomer = function(){
$http.post("Salepage/Customer",{
	cus_name: $scope.customer_name
	}).success(function(data){
$scope.customerlist = data;

        });
};




  $scope.searchproductlist = function(searchproduct){

if(searchproduct==''){

$scope.getproductlist();

}else{
   	$http.post("Salepic/Searchproductlist",{
	searchproduct: searchproduct
	}).success(function(data){
          $scope.productlist = data;

        });

}


   };



$scope.clickokafterpay = function(){
$('#Openchangemoney').modal('hide');
$('#Openonemini').modal('hide');

$http.post("Salepage/Updatemoneychange",{
	}).success(function(data){

        });

};


$scope.printDiv = function(){
	window.scrollTo(0, 0);
	window.print();

$.ajax({
    type: 'POST',
    dataType: 'json',
    data: 1,
    url: '127.0.0.1:8088/open',
    error: function() {
        //alert('Could not open cash drawer');
    },
    success: function() {
        //do something else
    }
});


};

$scope.printDivfull = function(){
$('#Openone').modal('show');
$scope.Getone($scope.list[0]);
setTimeout(function(){
$scope.printDiv();
 }, 1000);
};


$scope.printDivfullsend = function(x){
$('#Openonesend').modal('show');

$scope.dataprintsend = x;

setTimeout(function(){
$scope.printDiv();
 }, 1000);

};

$scope.lung = '1';
$scope.Selectlung = function(x){
$scope.lung = x;
};



$scope.getcashierprinterip = function(){

$http.get('<?php echo $base_url;?>/printer/Printercategory/getcashier')
       .then(function(response){
          $scope.cashier_printer_ip = response.data[0].cashier_printer_ip;
					$scope.printer_ul = response.data[0].printer_ul;
					$scope.printer_name = response.data[0].printer_name;

        });
   };
$scope.getcashierprinterip();






$scope.Openbillcloseday = function(){
$('#Openbillcloseday').modal('show');



$http.post("Salepic/Openbillclosedaylista",{
daynow: $scope.daynow,
}).success(function(data){

	 $scope.openbillclosedaylista = data;

			});

$http.post("Salepic/Openbillclosedaylistb",{
daynow: $scope.daynow,
}).success(function(data){

	 $scope.openbillclosedaylistb = data;

			});


$http.post("Salepic/Openbillclosedaylistc",{
daynow: $scope.daynow,
}).success(function(data){

	 $scope.openbillclosedaylistc = data;

			});



			$http.post("Salepic/openbillclosedaylistproduct",{
			daynow: $scope.daynow,
			}).success(function(data){

				 $scope.openbillclosedaylistproduct = data;

						});






								setTimeout(function(){
								$scope.printDiv();
								 }, 1000);



};






$scope.Openbillclosedayip = function(){
$('#Openbillclosedayip').modal('show');



$http.post("Salepic/Openbillclosedaylista",{
daynow: $scope.daynow,
}).success(function(data){

	 $scope.openbillclosedaylista = data;

			});

$http.post("Salepic/Openbillclosedaylistb",{
daynow: $scope.daynow,
}).success(function(data){

	 $scope.openbillclosedaylistb = data;

			});


$http.post("Salepic/Openbillclosedaylistc",{
daynow: $scope.daynow,
}).success(function(data){

	 $scope.openbillclosedaylistc = data;

			});



			$http.post("Salepic/openbillclosedaylistproduct",{
			daynow: $scope.daynow,
			}).success(function(data){

				 $scope.openbillclosedaylistproduct = data;

						});






								setTimeout(function(){
								$scope.printDiv2ip('billclose');
								 }, 1000);



};





$scope.printDiv2ip = function(x){
		window.scrollTo(0, 0);
	//window.print();
toastr.info('กำลังปริ้น...');
//alert($scope.cus_id_one);


if(x=='billclose'){
	var element = $("#section-to-print-billclose");
	var print_section = 'billclose';
}else{
	var element = $("#section-to-print-slip");
	var print_section = 'slip';
}

	//$scope.Opencashdrawer();


var getCanvas; // global variable
         html2canvas(element, {
width: 1000,
height: 10000,
         onrendered: function (canvas) {
               // $("#previewImage").append(canvas);
                getCanvas = canvas;



 var imgageData = getCanvas.toDataURL("image/png");
    // Now browser starts downloading it instead of just showing it
    var newData = imgageData.replace(/^data:image\/(png|jpg);base64,/, "");


///  one /////
    $.ajax({
      url: '<?php echo $base_url;?>/printer/example/interface/lan.php',
      data: {
             imgdata:newData,
             cashier_printer_ip: $scope.cashier_printer_ip,
						 printer_ul: $scope.printer_ul,
						 printer_name: $scope.printer_name,
						 print_section: print_section
           },
      type: 'post',
      success: function (response) {
               console.log(response);

      $('#Openoneminiip').modal('hide');
      }
    });
//$('#Openoneminiip').modal('hide');
///  one /////






             }
         });




};






$scope.printDivminiip = function(){
$('#Openoneminiip').modal('show');
	window.scrollTo(0, 0);
$scope.Getonemini($scope.list[0]);
setTimeout(function(){
$scope.printDiv2ip();
 }, 1000);

};





$scope.printDivmini = function(){
$('#Openonemini').modal('show');
$scope.Getonemini($scope.list[0]);
setTimeout(function(){
$scope.printDiv();
 }, 1000);

};






$scope.printDivminiip2 = function(x){
$('#Openoneminiip').modal('show');
	window.scrollTo(0, 0);
$scope.Getonemini(x);
setTimeout(function(){
$scope.printDiv2ip();
 }, 1000);

};





$scope.printDivmini2 = function(x){
$('#Openonemini').modal('show');
$('#Openonemini').css('visibility','');
$('#Openone').modal('hide');
$scope.Getonemini(x);
setTimeout(function(){
$scope.printDiv();
 }, 1000);

};






$scope.Openfull = function(){
$('#Openfull').modal({backdrop: "static", keyboard: false});
};

$scope.Opencustomer = function(){
$('#Opencustomer').modal({backdrop: "static", keyboard: false});
	$scope.Searchcustomer();
};

$scope.Selectcustomer = function(x){
$scope.customer_id = x.cus_id;
$scope.customer_name = x.cus_name;
$scope.cus_address_all = x.cus_address + ' ' +  ' <?=$lang_tel?>: ' + x.cus_tel;
$('#Opencustomer').modal('hide');
$('#customer_name').prop('disabled',true);
$('#cus_address_all').prop('disabled',true);
};

$scope.Refresh = function(){
$scope.customer_id = '0';
$scope.customer_name = '';
$scope.cus_address_all = '';
$scope.listsale = [];
$scope.money_from_customer = '';

$('#customer_name').prop('disabled',false);
$('#cus_address_all').prop('disabled',false);
$('#savesale').prop('disabled',false);
$('#savesale2').prop('disabled',false);
$('#money_from_customer').prop('disabled',false);
$('#money_from_customer2').prop('disabled',false);
$scope.sale_type = '1';
$scope.pay_type = '1';
$scope.discount_last = 0;
$scope.reserv = '0';

$scope.discount_percent = '0';
$scope.discount_last_percent = 0;

};

$scope.getproductlist = function(){

$http.get('Salepage/Getproductlist')
       .then(function(response){
          $scope.productlist = response.data;

        });
   };
$scope.getproductlist();


$scope.Selectcat = function(id){
   if(id=='0'){
   	$scope.getproductlist();
   }else{

   	$http.post("Salepic/Getproductlistcat",{
	product_category_id: id
	}).success(function(data){
          $scope.productlist = data;

        });

   }

   };


	 $scope.Price_discount_percent = function(x,index){
	 	$scope.listsale[index].product_price_discount = (x.product_price*x.product_price_discount_percent)/100;
	 };

$scope.Addpushproduct = function(){
$scope.listsale.push({
	product_id: '0',
	product_name: '<?=$lang_selectproduct?>',
	product_des: '',
	product_price: '0',
	product_score: '0',
	product_sale_num: '1',
	product_price_discount: '0',
	product_price_discount_percent: '0'
});
};

$scope.Addpushproductcode = function(product_code){
$http.post("Salepage/Findproduct",{
	cus_id: $scope.customer_id,
	product_code: product_code
	}).success(function(data){

		$scope.Findproductone = data;
if(data==''){
$scope.cannotfindproduct = true;

}else{

	if($scope.sale_type=='1'){
		product_price = data[0].product_price;
	}else if($scope.sale_type=='2'){
		product_price = data[0].product_wholesale_price;
	}

if(data[0].product_stock_num < -100000000000000000000000000000000){
toastr.warning('<?=$lang_outofstock?>');
}else{

if(data[0].product_stock_num <= -10000000000000000000000000000000){
toastr.info(data[0].product_name + ' <?=$lang_balance?> '+ data[0].product_stock_num +' <?=$lang_piece?>');
}

// $scope.listsale.push({
// 	product_id: data[0].product_id,
// 	product_code: data[0].product_code,
// 	product_name: data[0].product_name,
// 	product_des: data[0].product_des,
// 	product_score: data[0].product_score,
// 	product_price: product_price,
// 	product_sale_num: '1',
// 	product_price_discount: data[0].product_price_discount
// });


$http.post("Salepic/saveshowcus",{
	product_id: data[0].product_id,
	product_code: data[0].product_code,
	product_name: data[0].product_name+' ('+(product_price-data[0].product_price_discount)+')',
  product_image: data[0].product_image,
	product_des: data[0].product_des,
	product_score: data[0].product_score,
	product_price: product_price,
	product_sale_num: '1',
	product_price_discount: data[0].product_price_discount,
	product_price_discount_percent: data[0].product_price_discount_percent
	}).success(function(data){
$scope.listsale = data;
	});




}


$scope.cannotfindproduct = false;

}
$scope.product_code = '';
$('#Openfulltable').scrollTop($('#Openfulltable')[0].scrollHeight,1000000);
        });
};


$scope.Deletepush = function(x){

	$http.post("Salepic/delshowcus",{
		//product_id: x.product_id
		sc_ID: x.sc_ID
		}).success(function(data){
	$scope.listsale = data;
		});


};



$scope.Selectpot = function(x) {
	if(x.product_ot_price=='0'){
		x.product_ot_price = '';
		product_ot_price2 = 0;
	}else{
		x.product_ot_price = ' '+x.product_ot_price;
		product_ot_price2 = x.product_ot_price;
	}


	console.log($scope.potdata.product_name);
	$http.post("Salepic/updateshowcus",{
		sc_ID: $scope.potdata.sc_ID,
		product_name:$scope.potdata.product_name+' \n ['+x.product_ot_name+''+x.product_ot_price+']',
		product_price: parseFloat($scope.potdata.product_price)+parseFloat(product_ot_price2)
		}).success(function(data){
			//toastr.success('เพิ่มสินค้าเสริมเรียบร้อย');
//console.log($scope.potdataindex);
$scope.Getpotmodal(data[$scope.potdataindex],$scope.potdataindex);

	$scope.listsale = data;
		});

}


$scope.Showlistorder = function(x){

	$http.post("Salepic/showlistorder",{
		}).success(function(data){
	$scope.listsale = data;
		});


};
$scope.Showlistorder();



$scope.Modalproduct = function(index){
$('#Modalproduct').modal({show:true});
$scope.indexrow = index;
};

$scope.Selectproduct = function(y,index){
$scope.listsale[index].product_id = y.product_id;
$scope.listsale[index].product_code = y.product_code;
$scope.listsale[index].product_name = y.product_name;
$scope.listsale[index].product_des = y.product_des;
$scope.listsale[index].product_price = y.product_price;
$scope.listsale[index].product_price_discount = y.product_price_discount;
$('#Modalproduct').modal('hide');

};



 $scope.Sumsalenum = function(){
var total = 0;

 angular.forEach($scope.listsale,function(item){
total += parseFloat(item.product_sale_num);
 });
    return total;
};


 $scope.Sumsalediscount = function(){
var total = 0;

 angular.forEach($scope.listsale,function(item){
total += parseFloat(item.product_price_discount);
 });
    return total;
};


$scope.Sumproduct_score = function(){
var total = 0;

 angular.forEach($scope.listsale,function(item){
total += parseFloat(item.product_score * item.product_sale_num);
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


$scope.Sumsalepricevat = function(){
var total = 0;
 angular.forEach($scope.listsale,function(item){
total += parseFloat((item.product_price - item.product_price_discount) * item.product_sale_num);
 });
total2 = total+(total*($scope.vatnumber/100));

    return total2;
};




$scope.Savesale = function(changemoney,sumsalepricevat,discount_last){

	if($scope.listsale == '' || $scope.listsale[0].product_id=='0' ){
			toastr.warning('<?=$lang_addproductlistplz?>');
		}else if($scope.money_from_customer ==''){
	toastr.warning('<?=$lang_getmoneyplz?>');
		}else if($scope.money_from_customer < $scope.Sumsalepricevat()-$scope.discount_last ){
	toastr.warning('<?=$lang_getmoneymoreplz?>');
	}else if(isNaN($scope.money_from_customer) == true ){
	toastr.warning('<?=$lang_getmoneynumberplz?>');
}else if($scope.money_from_customer-$scope.Sumsalepricevat() >= 100000000000000000000000000  ){
	toastr.warning('<?=$lang_moneychangenotmore1000?>');
	}else{

		if($scope.discount_last_percent!=0){
$scope.discount_last = 	($scope.Sumsaleprice() + ($scope.Sumsaleprice() * $scope.vatnumber/100))*($scope.discount_last_percent/100);
}

toastr.info('ກຳລັງບັນທຶກການຂາຍ...');

$('#savesale').prop('disabled',true);
$('#savesale2').prop('disabled',true);
$('#money_from_customer').prop('disabled',true);
$('#money_from_customer2').prop('disabled',true);
$http.post("Salepage/Savesale",{
	listsale: $scope.listsale,
	cus_name: $scope.customer_name,
	cus_id: $scope.customer_id,
	cus_address_all: $scope.cus_address_all,
	sumsale_discount: $scope.Sumsalediscount(),
	sumsale_num: $scope.Sumsalenum(),
	vat: $scope.vatnumber,
	product_score_all: $scope.Sumproduct_score(),
	sumsale_price: $scope.Sumsaleprice(),
	money_from_customer: $scope.money_from_customer,
	money_changeto_customer: $scope.money_from_customer - ($scope.Sumsalepricevat() - $scope.discount_last) ,
	sale_type: $scope.sale_type,
	pay_type: $scope.pay_type,
	reserv: $scope.reserv,
	discount_last: $scope.discount_last,
	shift_id: '<?php if(isset($_SESSION['shift_id'])){ echo $_SESSION['shift_id']; }?>'
	}).success(function(data){
//toastr.success('<?=$lang_success?>');

$('#Opengetmoneymodal').modal('hide');

toastr.success('ບັນທຶກການຂາຍສຳເລັດ...');

$scope.changemoney = $scope.money_from_customer - ($scope.Sumsalepricevat() - $scope.discount_last);

$('#Openchangemoney').modal({backdrop: "static", keyboard: false});
$('#savesale').prop('disabled',false);
$('#savesale2').prop('disabled',false);
$('#money_from_customer').prop('disabled',false);
$('#money_from_customer2').prop('disabled',false);

$scope.Refresh();
$scope.getlist();

$scope.money_from_customer = '';


        });
}

};





$scope.Addnumbermoney = function(x){

if($scope.money_from_customer=='' && x==0){
	$scope.money_from_customer = '0';
}else if(x < 10){
	$scope.money_from_customer = $scope.money_from_customer+x;
}else if(x > 10){

	$scope.money_from_customer = x;
}else if(x == 'x'){
	$scope.money_from_customer = '';
}else{

}


};


$scope.perpage = '10';
$scope.getlist = function(searchtext,page,perpage){
   if(!searchtext){
   	searchtext = '';
   }


    if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '10';
   }

   $http.post("Salepage/gettoday",{
searchtext:searchtext,
page: page,
perpage: perpage
}).success(function(data){
$scope.list = data.list;
$scope.pageall = data.pageall;
$scope.numall = data.numall;

$scope.pagealladd = [];
           for(i=1;i<=$scope.pageall;i++){
$scope.pagealladd.push({a:i});
}

$scope.selectpage = page;
$scope.selectthispage = page;

        });

   };
$scope.getlist('','1');



$scope.Getone = function(x){
$('#Openone').modal('show');
$http.post("Salelist/Getone",{
	sale_runno: x.sale_runno
}).success(function(response){
$scope.listone = response;
$scope.cus_name = x.cus_name;
$scope.cus_address_all = x.cus_address_all;
$scope.sale_runno = x.sale_runno;
$scope.sumsale_discount = x.sumsale_discount;
$scope.sumsale_num = x.sumsale_num;
$scope.sumsale_price = x.sumsale_price;
$scope.money_from_customer3 = x.money_from_customer;
$scope.vat3 = x.vat;
$scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat)/100)) + parseFloat(x.sumsale_price);
$scope.money_changeto_customer = x.money_changeto_customer;
$scope.adddate = x.adddate;
$scope.discount_last2 = x.discount_last;
$scope.pay_type = x.pay_type;
$scope.number_for_cus = x.number_for_cus;
        });

};


$scope.Getonemini = function(x){
$http.post("Salelist/Getone",{
	sale_runno: x.sale_runno
}).success(function(response){
$scope.listone = response;
$scope.cus_name = x.cus_name;
$scope.cus_address_all = x.cus_address_all;
$scope.sale_runno = x.sale_runno;
$scope.sumsale_discount = x.sumsale_discount;
$scope.sumsale_num = x.sumsale_num;
$scope.sumsale_price = x.sumsale_price;
$scope.money_from_customer3 = x.money_from_customer;
$scope.vat3 = x.vat;
$scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat)/100)) + parseFloat(x.sumsale_price);
$scope.money_changeto_customer = x.money_changeto_customer;
$scope.adddate = x.adddate;
$scope.discount_last2 = x.discount_last;
$scope.number_for_cus = x.number_for_cus;
        });

};


$scope.Opengetmoneymodal = function(){
$('#Opengetmoneymodal').modal('show');

};




$scope.Deletelist = function(x){
$('#delbut'+ x.ID).prop('disabled',true);
$http.post("Salelist/Deletelist",{
	ID: x.ID,
	sale_runno: x.sale_runno,
	product_score_all: x.product_score_all,
	cus_id: x.cus_id
}).success(function(response){
toastr.success('<?=$lang_success?>');
$scope.getlist();
        });

};


$('.lodingbefor').css('display','block');

});


</script>
