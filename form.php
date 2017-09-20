<?php
include_once('inc/model.php');
include_once('inc/view.php');

if(!isset($_POST[button])){
	$content = view_include(
	   'theme/v_form.php'
	    );
	
	$page = view_include(
	   'theme/v_main.php', 
	         array('content' => $content));
			 
	echo $page;
	
}

else{
	$email = $_POST[Email];
	$comment = $_POST[comment];
	if(save($email, $comment)){
		
		header('location:index.php');
	}
	else{
		echo 'Данные несохранены';
	}
	
}

