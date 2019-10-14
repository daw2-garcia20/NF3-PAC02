<?php

$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.'); 
mysqli_select_db($db,'comicsite') or die(mysqli_error($db));
$pages = 4; 
if(isset($_GET["page"])) { 
    if ($_GET["page"]==1){ 
       header("Location:N3P203pagination.php");
    }else { 
       $page = $_GET["page"];
    }
}else {
  $page=1; 
}

$sql_total = "SELECT gente_id, gente_fullname, gente_iscaracther , gente_iscreator FROM gente "; 
$result = mysqli_query($db,$sql_total) or die(mysqli_error($db)); 

$num_filas = "SELECT count(*) FROM gente"; 
$result =  mysqli_query($db,$num_filas) or die(mysqli_error($db));
$row = mysqli_fetch_array($result);
$totalRegistres = $row["count(*)"]; 
$total_pages= ceil($totalRegistres/$pages); 
echo "Mostrando la pagina " . $page. "de " . $total_pages . "<br>";
$sql_limit =  "SELECT gente_id, gente_fullname ,gente_iscaracther , gente_iscreator FROM gente LIMIT ".($page-1)*$pages." ,$pages";  

$result2 = mysqli_query($db,$sql_limit) or die(mysqli_error($db));
while($registro2 = mysqli_fetch_array($result2)) {  
	echo "<br> ID: " . $registro2["gente_id"] . "Nombre: " . $registro2["gente_fullname"] .
	" <br> Es personaje?(1=SI): " . $registro2["gente_iscaracther"] . " Es creador?(1=SI): " . $registro2["gente_iscreator"] ;
	echo "<br>";
		  
		  
}


for($cont1=1; $cont1<=$total_pages; $cont1++){ 
    if($cont1 == $page)
		echo "" . $cont1 .""; 
	else
		echo "<a href='?page="  . $cont1 . "'>" . $cont1 . "</a>  ";
}
}
?>
