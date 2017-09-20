<?php
include_once('inc/model.php');
include_once('inc/view.php');
$title = 'Каталог';
if (isset($_GET[id])){
	
	$data = katalog($_GET[id]);//все товары из выбранного раздела
	if (isset($_GET[id_good])){
	    addbasket($_GET[id_good]);
		$content = view_include(
	    'theme/v_catalog.php', 
	     array('goods' => $data, "basket" => '1'));

    }
	else{
		$content = view_include(
	    'theme/v_catalog.php', 
	     array('goods' => $data));

	}
}
else{
	$content = 'Выберите раздел';
}







// Р’РЅРµС€РЅРёР№ С€Р°Р±Р»РѕРЅ.
$page = view_include(
	'theme/v_main.php', 
	array('title' => $title, 'content' => $content));

// Р’С‹РІРѕРґ.
echo $page;
?>