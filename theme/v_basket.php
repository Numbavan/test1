<script>
   function update(id_good){
		var x = "#col_"+id_good;
		var col = $(x).val();
		var str = "col="+col+"&id_good="+id_good;
		$.ajax({
			type: "GET",
			url: "basket.php",
			data: str,
			success: function(msg){
				$("h2").html(msg);
				document.reload();
			}
		});
	}
</script>
<?

echo "<h1>Basket</h1>";
echo "<h2 style='color:green;'></h2>";
$table = "<table border=1 width=100%>";
$table.= "<tr><th>Name tovara</th><th>Price</th><th>Kolichestvo</th><th>Edit</th></tr>";

//print_r($goods);

foreach($goods as $key => $value){
	 $col=$value[col];
	 $name=$value[name];
	 $price=$value[price];
	
	 
	 $table.= "<tr><td width=200>$name</td><td width=100>$price</td><td width=200 align=center><input class='' style='width:40px;text-align:center;' id='col_$key' type='number' value='$col'><button style='width:20px;height=20px;' onclick='update($key)'>ok</button></td><td width=100><a href='basket.php?option=1&id_good=$key'>Del</a></td></tr>";

}

$table.="</table>";
echo $table;
echo "<a href=\"orders.php\"><button>Oformit zakaz</button></a>";
?>