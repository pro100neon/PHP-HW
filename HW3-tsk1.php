<?php

function insData() {

	function genName() {
	    $azbuka = ["a","б","в","г","д","е","ё","ж","з","и","й","к","л","м","н","о","п","р","с","т","у","ф","х","ц","ч","ш","щ","ъ","ы","ь","э","ю","я"];
	    $name = '';
	    for ( $i = 0; $i < mt_rand(6, 7); $i++ ) {
	        $name .= $azbuka[mt_rand(0, 32)];
	    }
	//    return ucfirst('$name');
	    return mb_strtoupper(mb_substr($name, 0, 1)) . mb_substr($name, 1);
	};

	$pdo = new PDO("mysql:host=localhost;dbname=my_db",'php','php');

	for ($i = 0; $i < 1000; $i++) {
	    $sql = "INSERT INTO users (name, age) VALUES (:name, :age)";
	    $stmt = $pdo->prepare($sql);
		$age =  mt_rand(10,100);
	    $name = genName();
	    $stmt->bindParam(':name', $name);
	    $stmt->bindParam(':age', $age);
	    $pdo->query("set :name utf8");
	    $stmt->execute();
	};
};

insData();
