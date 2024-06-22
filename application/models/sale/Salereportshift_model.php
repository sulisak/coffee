<?php

class Salereportshift_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }


 public function Get($data)
        {



 $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';
            }


            $start = ($page - 1) * $perpage;


$querynum = $this->db->query('SELECT *
    FROM shift');


$query = $this->db->query('SELECT
  s.shift_id as shift_id,
  s.user_name as user_name,
  from_unixtime(shift_start_time,"%d-%m-%Y %H:%i:%s") as shift_start_time,
  from_unixtime(shift_end_time,"%d-%m-%Y %H:%i:%s") as shift_end_time,
  s.shift_money_start as shift_money_start,
  s.shift_money_end as shift_money_end,
  sum(sh.sumsale_price) as sumsale_price,
  sum(sh.discount_last) as discount_last,
  sum(sh.sumsale_num) as sumsale_num
    FROM shift as s
    LEFT JOIN sale_list_header as sh on sh.shift_id=s.shift_id
    WHERE s.user_name LIKE "%'.$data['searchtext'].'%"
    GROUP BY sh.shift_id
    ORDER BY s.shift_id DESC LIMIT '.$start.' , '.$perpage.' ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;


        }









  }
