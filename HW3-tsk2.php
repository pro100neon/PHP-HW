<?php
function getData() {
    $pdo = new PDO("mysql:host=localhost;dbname=my_db",'php','php');
    $sth = $pdo->query("SELECT * FROM users where age > 50");
    $array = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $array;
}; 
var_dump(getData());
