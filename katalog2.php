<?php
include_once('inc/model.php');
include_once('inc/view.php');



// Информация для отображения.
$title = 'Название сайта::Редактирование';
$data = getrazdelname();
print_r($data);

// Внутренний шаблон.
$content = view_include(
	'theme/v_catalog2.php', 
	array('data' => $data));

// Внешний шаблон.
$page = view_include(
	'theme/v_main.php', 
	array('title' => $title, 'content' => $content));

// Вывод.
echo $page;
?>