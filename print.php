//inc/view.php

<?php
//
// ����������� �������.
//
function view_include($fileName, $vars = array())
{
	// ��������� ���������� ��� �������.
	foreach ($vars as $k => $v)
	{
		$$k = $v;
	}

	// ��������� HTML � ������.
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

// ���������� ��� �����������.
$title = '�������� �����::������';
$text = text_get();

// ���������� ������.
$content = view_include(
	'theme/v_index.php',
	array('text' => $text));

// ������� ������.
$page = view_include(
	'theme/v_main.php', 
	array('title' => $title, 'content' => $content));

// �����.
echo $page;
?>

//theme/v_main.php
<?php
/**
 * �������� ������
 * ===============
 * $title - ���������
 * $content - HTML ��������
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
		<a href="index.php">������ �����</a> |
		<a href="edit.php">������������� �����</a>
	</div>
	
	<div id="content">
		<?=$content?>
	</div>
	
	<div id="footer">
		��� ����� ��������. �����. �������.
	</div>
</body>
</html>

//edit.php

<?php
include_once('inc/model.php');
include_once('inc/view.php');

// ��������� �������� �����.
if (!empty($_POST))
{
	$text = $_POST['text'];
	text_set($text);
	header('Location: index.php');
	die();
}

// ���������� ��� �����������.
$title = '�������� �����::��������������';
$text = text_get();

// ���������� ������.
$content = view_include(
	'theme/v_edit.php', 
	array('text' => $text));

// ������� ������.
$page = view_include(
	'theme/v_main.php', 
	array('title' => $title, 'content' => $content));

// �����.
echo $page;



//theme/v_index.php

<?php
/**
 * ������ ������� ��������
 * =======================
 * $text - �����
 */
?>

<?=nl2br($text)?>
                   
//theme/v_edit.php

<?php
/**
 * ������ ���������
 * ================
 * $text - ����� ������
 */
?>

<form method="post">
	<textarea name="text"><?=$text?></textarea>
	<br/>
	<input type="submit" value="���������" />
</form>
                        