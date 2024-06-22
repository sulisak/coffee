<style type="text/css">
	.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
    color: #fff;
    background-color: #f0ad4e;
border-radius: 20px;
box-shadow: 5px 5px rgba(0,0,0,.3);
}
a{
	color: #000000;
}
.panel{
  border-radius: 0px;
border-radius: 20px;
box-shadow: 5px 5px rgba(0,0,0,.3);
}
.btn{
 border-radius: 0px;
border-radius: 20px;
box-shadow: 5px 5px rgba(0,0,0,.3);
}
.form-control{
 border-radius: 0px;
border-radius: 20px;
box-shadow: 5px 5px rgba(0,0,0,.3);
}
.img-responsive{
border-radius: 20px;
}
</style>

<label><font color="white" size="4"><b>ໂທ & WhatsApp 020 59339954</b></font></label>
<br>
<font color="blue" size="4"><b>Support:</b></font> <a href="https://api.whatsapp.com/send?phone=8562059339954&text=ສະບາຍດີ%20ລາວຊອບແວ-Laosoftware" target="_blank"></font>
<font color="blue" size="4"><b>click ຕິດຕໍ່ whatsapp ທີ່ນີ້</b></font>
</a>

﻿<br />
<div class="text-center" style="color: #fff;">
<!-- Language <a href="<?php echo $base_url;?>/?lang=th">ภาษาไทย</a>
| <a href="<?php echo $base_url;?>/?lang=lao">ພາສາລາວ</a>
<br /> -->


</div>

<?php

$modal_enddate =  '


<div class="modal fade" id="modal-enddate">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-left">

				<h4 class="modal-title">หมดอายุการใช้งาน</h4>
			</div>
			<div class="modal-body">

<center>
<h2>
การใช้งานของคุณหมดอายุแล้ว
			<br /><br />
			กรุณาต่ออายุ เพื่อใช้งาน
			<br /><br />
			 <a class="btn btn-success btn-lg" target="_blank" href="http://facebook.com/cus2merpage"> ติดต่อผู้ให้บริการ</a>

			 </h2>
			<hr />

			 <br />
			<a href="'.$base_url.'/logout"> ออกจากระบบ</a>
			</center>

		</div>

			</div>

		</div>



	</div></div>



<script>
$("#modal-enddate").modal({backdrop: "static", keyboard: false});
</script>

';

if(time() > strtotime($_SESSION['owner_end_time'])){
	//echo $modal_enddate;
}

?>


<script src="<?php echo $base_url; ?>/js/excel-export.js"></script>


</body>
</html>

<?php
if(!isset($_SERVER["HTTP_REFERER"])){
		echo '<script>
window.location = "'.$base_url.'";
	</script>';
	}
	?>




	<style type="text/css">
	body{
		font-family: Phetsarath OT;
		background-image: url("<?php echo $base_url.'/'.$_SESSION['owner_bgimg'];?>");
		background-color: #f0ad4e;
	}
</style>


<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

<style>
body{
font-family: 'Prompt', sans-serif;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
	    padding: 3px;
}
</style>

<script>
	$("form :input").attr("autocomplete", "off");
</script>
