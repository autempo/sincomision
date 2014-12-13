<?php
function AbrirConsulta($SQL, $ArrayParametros = null, $aDBInstance = 'WEB', &$aConexion = null, $aPHPConexion = '')
{
    $conn = open_database_connection ();
	$posts = array ();
	
	if ($result = $conn->query ( $SQL )) {
		
		$x=0;
	/* fetch associative array */
		while ( $row = $result->fetch_assoc () ) {
			$posts [$x] = $row;
			$x++;
		}
		$result->free ();
	} else {
		echo "No hay datos" . $result;
	}
	
	close_database_connection ( $conn );
	
	return $posts;
	}
	
	?>