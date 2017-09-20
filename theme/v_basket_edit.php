<?php

print_r($_SESSION[goods]);

foreach($_SESSION[goods] as $key => $value){
	if($key == $_GET[id_good]){
		$_SESSION[goods][$key]=array();
		$_SESSION[goods][$key]=NULL;
		unset($_SESSION[goods][$key]);
	}
}
//session_unset($_SESSION[new_basket]);
$_SESSION[new_basket] = $_SESSION[goods];



?>

