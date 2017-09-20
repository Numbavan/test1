//inc/view.php

<?php
//
// Подключение шаблона.
//
function view_include($fileName, $vars = array())
{
	// Установка переменных для шаблона.
	foreach ($vars as $k => $v)
	{
		$$k = $v;
	}

	// Генерация HTML в строку.
	ob_start();
	include $fileName;
	return ob_get_clean();	
}



//inc/model.php

<?php
function text_get()
{
	return file_get_contents('data/text.txt');
}

function text_set($text)
{
	file_put_contents('data/text.txt', $text);
}


//index.php

<?php
include_once('inc/model.php');
include_once('inc/view.php');

// Информация для отображения.
$title = 'Название сайта::Чтение';
$text = text_get();

// Внутренний шаблон.
$content = view_include(
	'theme/v_index.php',
	array('text' => $text));

// Внешний шаблон.
$page = view_include(
	'theme/v_main.php', 
	array('title' => $title, 'content' => $content));

// Вывод.
echo $page;
?>

//theme/v_main.php
<?php
/**
 * Основной шаблон
 * ===============
 * $title - заголовок
 * $content - HTML страницы
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title><?=$title?></title>
	<meta content="text/html; charset=Windows-1251" http-equiv="content-type">	
	<link rel="stylesheet" type="text/css" media="screen" href="theme/style.css" /> 	
</head>
<body>
	<div id="header">
		<h1><?=$title?></h1>
	</div>
	
	<div id="menu">
		<a href="index.php">Читать текст</a> |
		<a href="edit.php">Редактировать текст</a>
	</div>
	
	<div id="content">
		<?=$content?>
	</div>
	
	<div id="footer">
		Все права защищены. Адрес. Телефон.
	</div>
</body>
</html>

//edit.php

<?php
include_once('inc/model.php');
include_once('inc/view.php');

// Обработка отправки формы.
if (!empty($_POST))
{
	$text = $_POST['text'];
	text_set($text);
	header('Location: index.php');
	die();
}

// Информация для отображения.
$title = 'Название сайта::Редактирование';
$text = text_get();

// Внутренний шаблон.
$content = view_include(
	'theme/v_edit.php', 
	array('text' => $text));

// Внешний шаблон.
$page = view_include(
	'theme/v_main.php', 
	array('title' => $title, 'content' => $content));

// Вывод.
echo $page;



//theme/v_index.php

<?php
/**
 * Ўаблон главной страницы
 * =======================
 * $text - текст
 */
?>

<?=nl2br($text)?>
                   
//theme/v_edit.php

<?php
/**
 * Шаблон редактора
 * ================
 * $text - текст статьи
 */
?>

<form method="post">
	<textarea name="text"><?=$text?></textarea>
	<br/>
	<input type="submit" value="Сохранить" />
</form>
                        