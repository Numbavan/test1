<?php
session_start();

include_once('inc/model.php');
include_once('inc/view.php');

if(isset($_GET[col])){
	$col = $_GET[col];
	$id_good=$_GET[id_good];
	if(update_basket($id_good,$col))
		echo "Data save!";
	else
		echo "Error!";
	die();
}	


if(isset($_GET[option])){
	$id_good= $_GET[id_good];
	delfrombasket($id_good);
	
	/*
	$good= get_info_good($id_good);
    $content = view_include(
	    'theme/v_basket_edit.php', 
	     array('good' => $good, 'id' => $id_good));
	*/

}
else{
	

$title = 'Каталог товаров';


$data = showbasket();
$content = view_include(
	    'theme/v_basket.php', 
	     array('goods' => $data));




}
// Внешний шаблон.
$page = view_include(
	'theme/v_main.php', 
	array('title' => $title, 'content' => $content));

// Вывод.
echo $page;
?>