<?
 if($basket==1){
	 echo "<p>Товар добавлен в корзину <a href='basket.php'> Перейти в корзину</a></p>";
 }
 $table = "<table height=500 width=500 border=1 >";
 
foreach($goods as $key => $value ){ 
  $table.= "<tr><td><img height=100 src=data/images/$value[img]></td>
  <td><h1>$value[name]</h1></td><td>$value[info]</td><td>$value[price]</td>
  <td><a href='katalog.php?id_good=".$value[id]."&id=".$_GET[id]."'><button>Добавить в корзину</button></a></td></tr>";
	
}
 $table.= "</table>";
echo $table;
?>
