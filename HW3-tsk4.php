<?php
function updData() {
    $pdo = new PDO("mysql:host=localhost;dbname=my_db",'php','php');
	$var = 'Php';
	$sth = $pdo->query("SELECT * FROM users where age > 70");
	$array = $sth->fetchAll(PDO::FETCH_ASSOC);
	$sthUpd = $pdo->query("UPDATE users
			           	   SET name = '$var'
           				   WHERE age > 70");
	return $array;

}; 

var_dump(updData());
