<?php

define('DB_DATABASE', 'quiz');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', 'pikacchi1236');
define('PDO_DSN', 'mysql:host=localhost;dbname=' . DB_DATABASE.';charset=utf8;');

/****PARAMATER****/
$quiz_all = 8;
/*****************/

try {
  // connect
  $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  if($_POST["type"] == "yontaku"){
  	$arr_id = select_random($quiz_all,$_POST["quiz_count"]);
  	
  	// select
  	for($i=1;$i<count($arr_id);$i++){
	  	$stmt = $db->prepare('select type,text,answer_txt,answer_num from quiz_table where id ='.$arr_id[$i]);
	  	$stmt->execute();
	  	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
	  	foreach ($users as $quizVal) {
	    $arr_quiz[] = json_encode($quizVal);
	  	}
	  	unset($quizVal);
  	}
  	//$arr_quiz[] = count($arr_id);
  	print  json_encode($arr_quiz);
  }
  elseif($_POST["type"] == "user_data"){
  	
  	$id = $_POST["player_id"];
  	// select
  	$stmt = $db->query("select * from users where id = 1");
  	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
  	foreach ($users as $userVal) {
  	 print json_encode($userVal);
  	}
 }
  

} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}

/***** unique random *****/

function select_random($x,$y){
	$random = range(1,$x);
	shuffle( $random );
	for( $i=0; $i<=$y; $i++){
		$number[$i+1] = $random[$i];
	}
	return($number);
}