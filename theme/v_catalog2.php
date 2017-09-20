<?foreach($data as $key => $value ){ 
    $url = "theme/images3/$value[src]";
	echo "<p><a href ='katalog.php?id=".$value[id]."'><img src='$url'></a></p>";
	

}
 
?>