<font style="font-family:Phetsarath OT">
<div class="col-md-12 col-sm-12" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">


<h2>ເຄື່ອງພິມ</h2>
<table width="100%" class="table table-hover table-bordered">
	<tr>

		<td colspan="1" class="text-center">

<select class="form-control" ng-model="printer_ul" ng-change="Cashierprinteripsave()"  style="width:300px;font-size:16px;font-weight:bold;height:50px;">
	<option value="0">
	USB ປິນ Browser
	</option>
  <!-- <option value="1">
USB Standalone
</option>

<option value="2">
LAN Network Wifi
</option>
</select> -->

		</td>

		<td colspan="2" class="text-center" ng-show="printer_ul!='0'">

<select class="form-control" ng-model="printer_type" ng-change="Cashierprinteripsave()"  style="width:200px;font-size:16px;font-weight:bold;height:50px;">
<option value="1">
ຂະໜາດ 58mm
</option>
<option value="2">
ຂະໜາດ 80mm
</option>
</select>

		</td>





	</tr>


<tr ng-show="printer_ul=='1'">
	<td>ຊື່ເຄື່ອງພິມ Slip</td>
	<td>
		<input type="text" ng-model="printer_name" class="form-control" placeholder="ชื่อ เครื่องปริ้น" style="font-size:16px;font-weight:bold;height:50px;">
	</td>
	<td>
		<button class="btn btn-success btn-lg" ng-click="Cashierprinteripsave()">ບັນທຶກ</button>

	</td>
	</tr>


	<tr ng-show="printer_ul=='2'">
		<td>IP ປິນເຕີຂອງ Cashier</td>
		<td>
			<input type="text" ng-model="cashier_printer_ip" class="form-control" placeholder="192.168.0.250" style="font-size:16px;font-weight:bold;height:50px;">
		</td>
		<td>
			<button class="btn btn-success btn-lg" ng-click="Cashierprinteripsave()">ບັນທຶກ</button>

		</td>
	</tr>

</table>


<div style="position: absolute; opacity: 0.0;">
<span id="printtest" style="text-align: left;font-size: 20px;font-weight: bold;width: 400px;">
<br />
ຂໍ້ຄວາມພິມ
<br />
</span>
</div>




	</div>


	</div>

	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {



$scope.getcashier = function(){

$http.get('Printercategory/getcashier')
       .then(function(response){
          $scope.cashier_printer_ip = response.data[0].cashier_printer_ip;
					$scope.printer_type = response.data[0].printer_type;
					$scope.printer_ul = response.data[0].printer_ul;
					$scope.printer_name = response.data[0].printer_name;

        });
   };
$scope.getcashier();


$scope.Cashierprinteripsave = function(){
$http.post("Printercategory/Cashierprinteripupdate",{
	cashier_printer_ip: $scope.cashier_printer_ip,
	printer_type: $scope.printer_type,
	printer_ul: $scope.printer_ul,
	printer_name: $scope.printer_name
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.getcashier();

        });
};











$scope.printDiv2 = function(x){
	window.scrollTo(0, 0);

toastr.info('กำลังปริ้น...');

	var element = $("#printtest");

var getCanvas; // global variable
         html2canvas(element, {
         onrendered: function (canvas) {
               // $("#previewImage").append(canvas);
                getCanvas = canvas;



 var imgageData = getCanvas.toDataURL("image/png");
    // Now browser starts downloading it instead of just showing it
    var newData = imgageData.replace(/^data:image\/(png|jpg);base64,/, "");



    $.ajax({
      url: '<?php echo $base_url;?>/printer/example/interface/lan.php',
      data: {
             imgdata:newData,
             cashier_printer_ip: $scope.cashier_printer_ip
           },
      type: 'post',
      success: function (response) {
               console.log(response);

      }
    });



             }
         });





    //$("#btn-Convert-Html2Image").attr("download", "your_pic_name.png").attr("href", newData);



};








});
	</script>
