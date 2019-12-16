<?php
function getJsonData() {
    $pdo = new PDO("mysql:host=localhost;dbname=my_db",'php','php');
	$sth = $pdo->query("SELECT NAME, AGE FROM USERS WHERE NAME LIKE '%ав%' OR NAME LIKE '%аб%'");
//	$sth = $pdo->query("SELECT NAME, AGE FROM USERS WHERE NAME LIKE '%ёе%' OR NAME LIKE '%аб%'");
	$result = json_encode($sth->fetchAll(PDO::FETCH_ASSOC));
	return $result;
}; 

echo getJsonData();
