<?php
include_once('inc/model.php');
include_once('inc/view.php');
$test1 = "20";
$content = view_include(
	   'theme/v_text.php',
	   array('x' => $test1)
	    );

$page = view_include(
	   'theme/v_main.php', 
	         array('content' => $content));
echo $page;