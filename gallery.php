<?php
include_once('inc/model.php');
include_once('inc/view.php');



// Информация для отображения.
$title = 'Название сайта::Редактирование';
$photo = photo();

// Внутренний шаблон.
$content = view_include(
	'theme/v_gallery.php', 
	array('photo' => $photo));

// Внешний шаблон.
$page = view_include(
	'theme/v_main.php', 
	array('title' => $title, 'content' => $content));

// Вывод.
echo $page;