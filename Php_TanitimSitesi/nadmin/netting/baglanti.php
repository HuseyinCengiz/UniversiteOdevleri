<?php 
try {
	$db=new PDO("mysql:host=localhost;dbname=memleketanitim;charset=utf8","root","");
} catch (PDOException $e) {
	echo $e->getMessage();
}
?>