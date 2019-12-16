<?php
function getUniqueName() {
    $pdo = new PDO("mysql:host=localhost;dbname=my_db",'php','php');
	$sth = $pdo->query("SELECT distinct name FROM users");
	$array = $sth->fetchAll(PDO::FETCH_ASSOC);
	return $array;

}; 

var_dump(getUniqueName());
