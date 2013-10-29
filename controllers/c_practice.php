<?php
class practice_controller extends base_controller {

public function test_db(){
/*$q = "INSERT INTO users
	 SET first_name = 'Albert', 
	 last_name = 'Einstien'";
echo $q;

$q = " UPDATE users
	 SET email = '6666669999999'
	 WHERE first_name = 'DAVID'";


$new_user = Array(
	'first_name'  => 'Albert',
	'last_name'  => 'Albert',
	'email'  => 'Xmail',
	);

*/
$q = "SELECT email 
	  FROM users
	  WHERE user_id = 10";

echo DB::instance(DB_NAME)->select_field($q);
}








}




?>