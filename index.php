<?php
include 'model.php';

$sql = "SELECT titulo, descripcion, cod_ubicacion FROM publicaciones where cod_ubicacion ='".$_GET['cod_ubicacion']."';";
/*
$result = array ();

$posts = get_query ( $aquery );

echo $posts [0]['titulo'];
*/



$conn = open_database_connection ();

$rs=$conn->query($sql);

if($rs === false) {
	trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
} else {
	$rows_returned = $rs->num_rows;
	$rs->data_seek(0);
	
	return $rs;
	
/*	while($row = $rs->fetch_row()){
		echo $row[0] . '<br>';
		echo $row[1]. '<br>';
	}*/
}

/*
for ($i=0;$i<count($posts);$i++)
{
	printf ("%s\n",$posts[$i]);
}

foreach ( $posts as $post => $value) :
	echo $value, $post;
echo '<br>';
	echo $post ['2'];

	echo '<br>';
	echo $post ['cod_ubicacion'];
	
endforeach
;*/

?>
