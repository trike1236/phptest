<?php

define('DB_DATABASE', 'quiz');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', 'pikacchi1236');
define('PDO_DSN', 'mysql:host=localhost;dbname=' . DB_DATABASE.';charset=utf8;');

try {
  //接続
  $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  //総クイズ数取得
  $sql = 'select count(*) from quiz_table';
  $stmt = $db->query($sql);
  $quiz_all=  $stmt->fetchColumn();
  
  switch($_POST["type"]){
	 case "yontaku":
		  	$arr_id = select_random($quiz_all,$_POST["quiz_count"]);
		  	// select
		  	for($i=1;$i<count($arr_id);$i++){
			  	$stmt = $db->prepare('select type,quiz_id,text,answer_txt,answer_num from quiz_table where quiz_id ='.$arr_id[$i]);
			  	$stmt->execute();
			  	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
			  	foreach ($users as $quizVal) {
			    	$arr_quiz[] = json_encode($quizVal);
			  	}
			  	unset($quizVal);
		  	}
		  	//$arr_quiz[] = count($arr_id);
		  	print  json_encode($arr_quiz);
		  	break;

	 case "user_data":
		  	$id = $_POST["user_id"];
		  	// select
		  	$stmt = $db->query("select * from users where id = {$id}");
		  	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
		  	foreach ($users as $userVal) {
		  	 print json_encode($userVal);
		  	}
		  	break;
	
	 case "result":
		  $id = $_POST["id"]; 
		  $quiz_id = explode(",", trim($_POST["quiz_id"]));
		  $quiz_tf = explode(",", trim($_POST["quiz_tf"]));
		  $count = count($quiz_id);

 		  //count_all更新
 		  $db->exec("update users set count_all = count_all + {$count} where id = {$id}");
		  //count_correct更新
 		  for($i=0;$i<$count; $i++){
 		  	if($quiz_tf[$i] == 1){
 		  		$db->exec("update users set count_correct = count_correct + 1 where id = {$id}");
 		  		$db->exec("update quiz_table set count_correct = count_correct + 1 where quiz_id = {$quiz_id[$i]}");
 		  		$db->exec("update quiz_table set count_all = count_all + 1 where quiz_id = {$quiz_id[$i]}");
 		  	}
 		  	else{
 		  		$db->exec("update quiz_table set count_all = count_all + 1 where quiz_id = {$quiz_id[$i]}");
 		  	}
 		  }
 		  print "success";
 		  break;
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