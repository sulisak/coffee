<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buy extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('purchase/buy_model');

     if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url );
        }

    }

	public function index()
	{


$data['tab'] = 'buy';
$data['title'] = 'Buy Product';
		$this->purchaselayout('purchase/buy',$data);
}



 function Add()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$header_code = time();

for($i=1;$i<=count($data['productimportlist']) ;$i++){


$data['importproduct_header_code'] = 'PN'.$header_code;
$data['importproduct_header_date'] = $header_code;

	if($data['productimportlist'][$i-1]['product_id']!='' && $data['productimportlist'][$i-1]['importproduct_detail_num']!='0'){
$data['productimportlist'][$i-1]['importproduct_header_code'] = 'PN'.$header_code;
$data['productimportlist'][$i-1]['importproduct_detail_date'] = $header_code;

if($this->buy_model->Adddetail($data['productimportlist'][$i-1])){
//$this->buy_model->Updateproductimportstock($data['productimportlist'][$i-1]);
}




if($i==1){
$this->buy_model->Addheader($data);

}

}

}


}



function Get()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo  $this->buy_model->Get($data);

	}








    function Getimportone()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo  $this->buy_model->Getimportone($data);

}



  function Deleteimportlist()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}


$resault =  $this->buy_model->Getimportone2($data);


foreach ($resault as $row)
{

 $data2['product_id'] = $row->product_id;
 $data2['detailpricebase'] = $row->importproduct_detail_pricebase;
  $data2['detailnum'] =   $row->importproduct_detail_num;

//$this->buy_model->Updateproductdeletestock($data2);


    }

$this->buy_model->Deleteimportlist($data);

}



function Findproduct()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->buy_model->Findproduct($data);

    }




    function Findproduct2()
        {

    $data = json_decode(file_get_contents("php://input"),true);
    echo  $this->buy_model->Findproduct2($data);

        }



        function Findvendor()
            {

        $data = json_decode(file_get_contents("php://input"),true);
        echo  $this->buy_model->Findvendor($data);

            }





	}
