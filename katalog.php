<?php
include_once('inc/model.php');
include_once('inc/view.php');
$title = '�������';
if (isset($_GET[id])){
	
	$data = katalog($_GET[id]);//��� ������ �� ���������� �������
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
	$content = '�������� ������';
}







// Внешний шаблон.
$page = view_include(
	'theme/v_main.php', 
	array('title' => $title, 'content' => $content));

// Вывод.
echo $page;
?>