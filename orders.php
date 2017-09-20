<?php
session_start();

include_once('inc/model.php');
include_once('inc/view.php');

$title = 'Oformlenie zakaza';

if(!isset($_POST[ready])){
	$content = view_include('theme/v_order.php');
}
else{
   addOrder($_POST[fio],$_POST[phone]);	
}

// Внешний шаблон.
$page = view_include(
	'theme/v_main.php', 
	array('title' => $title, 'content' => $content));

// Вывод.
echo $page;
?>