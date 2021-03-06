<?php

define('DB_DATABASE', 'quiz');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', 'pikacchi1236');
define('PDO_DSN', 'mysql:host=localhost;dbname=' . DB_DATABASE.';charset=utf8;');



try {
  // connect
  $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  /***debug***/
  
  $POST =array("type" => "user_data", "player_id" =>1); 
  /***********/
  
  if($POST["type"] == "yontaku"){
  	
  	$id = $_POST["quiz_id"];

  	// select
  	$stmt = $db->prepare("select type,text,answer_txt,answer_num from quiz_table where id = $id");
  	$stmt->execute();

  	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
  	foreach ($users as $quizVal) {
  	 print json_encode($quizVal);
  	}
  }
  elseif($POST["type"] == "user_data"){
  	
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