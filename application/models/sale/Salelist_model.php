<?php

class Salelist_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }


 public function Get($data)
        {


$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;



 $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';
            }


            $start = ($page - 1) * $perpage;


$querynum = $this->db->query('SELECT *, from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM sale_list_header
    WHERE adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
AND owner_id="'.$_SESSION['owner_id'].'"  AND cus_name LIKE "%'.$data['searchtext'].'%"
OR adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sale_runno LIKE "%'.$data['searchtext'].'%"
    ORDER BY ID DESC ');


$query = $this->db->query('SELECT *, from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM sale_list_header
    WHERE adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
AND owner_id="'.$_SESSION['owner_id'].'"  AND cus_name LIKE "%'.$data['searchtext'].'%"
OR adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sale_runno LIKE "%'.$data['searchtext'].'%"
    ORDER BY ID DESC LIMIT '.$start.' , '.$perpage.' ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;


        }



public function Getone($data)
        {

$query = $this->db->query('SELECT *, from_unixtime(sd.adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM sale_list_datail as sd

    WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.sale_runno="'.$data['sale_runno'].'"
    ORDER BY sd.ID ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


        public function Getone2($data)
        {

$query = $this->db->query('SELECT *, from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM sale_list_datail
    WHERE owner_id="'.$_SESSION['owner_id'].'" AND sale_runno="'.$data['sale_runno'].'"
    ORDER BY ID ASC');

return $query->result();

        }



  public function Deletelist($data)
        {

		if($data['product_score_all'] == null){
    $data['product_score_all'] = '0';
}






$query0 = $this->db->query('INSERT INTO sale_list_header_bak(ID,sale_runno,
cus_name,
cus_id,
cus_address_all,
sumsale_discount,
sumsale_num,
sumsale_price,
money_from_customer,
money_changeto_customer,
vat,
product_score_all,
sale_type,
pay_type,
reserv,
discount_last,
adddate,
owner_id,
user_id,
store_id,
shift_id,
number_for_cus,
user_name_del,
del_date)
SELECT ID,sale_runno,
cus_name,
cus_id,
cus_address_all,
sumsale_discount,
sumsale_num,
sumsale_price,
money_from_customer,
money_changeto_customer,
vat,
product_score_all,
sale_type,
pay_type,
reserv,
discount_last,
adddate,
owner_id,
user_id,
store_id,
shift_id,
number_for_cus,
"'.$_SESSION['name'].'",
"'.time().'"
FROM sale_list_header
WHERE sale_runno="'.$data['sale_runno'].'" and  owner_id="'.$_SESSION['owner_id'].'"');





$query0 = $this->db->query('INSERT INTO sale_list_datail_bak(ID,sale_runno,
product_id,
product_name,
product_image,
product_code,
product_price,
product_sale_num,
product_price_discount,
product_price_discount_percent,
product_score,
adddate,
owner_id,
user_id,
store_id,
sc_ID,
shift_id)
SELECT ID,sale_runno,
product_id,
product_name,
product_image,
product_code,
product_price,
product_sale_num,
product_price_discount,
product_price_discount_percent,
product_score,
adddate,
owner_id,
user_id,
store_id,
sc_ID,
shift_id
FROM sale_list_datail
WHERE sale_runno="'.$data['sale_runno'].'" and  owner_id="'.$_SESSION['owner_id'].'"');






$query = $this->db->query('DELETE FROM sale_list_datail  WHERE sale_runno="'.$data['sale_runno'].'" and  owner_id="'.$_SESSION['owner_id'].'"');

if($query){
$query2 = $this->db->query('DELETE FROM sale_list_header  WHERE sale_runno="'.$data['sale_runno'].'" and  owner_id="'.$_SESSION['owner_id'].'"');


$this->db->query('UPDATE customer_owner
    SET product_score_all=product_score_all - '.$data['product_score_all'].' WHERE cus_id="'.$data['cus_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
}


return true;

        }



 public function Updateproductaddstock($data)
        {

$price_value = $data['product_price'] * $data['product_sale_num'];
$query = $this->db->query('UPDATE wh_product_list
    SET product_stock_num=product_stock_num + '.$data['product_sale_num'].'
    WHERE product_id="'.$data['product_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }







  }
