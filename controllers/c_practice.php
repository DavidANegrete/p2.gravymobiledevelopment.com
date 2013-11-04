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
$_POST["numb"] = 1;
    $GLOBALS["error"] = '';



if($_POST["numb"] == 1){
    var_dump($GLOBALS);
}
else{
    Router::redirect("/bios/add");

}

}








}




