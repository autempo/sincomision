

<?php
// model.php
function open_database_connection() {
	$host = "localhost";
	$username = "sys";
	$password = "sys";
	$database = "sincomision";
	
	// Create connection
	$conn = new mysqli ( $host, $username, $password, $database );
	
	// Check connection
	if ($conn->connect_error) {
		die ( "Connection failed: " . $conn->connect_error );
	}
	// echo "Connected successfully";
	
	return $conn;
}
function close_database_connection($conn) {
	$conn->close ();
}
function get_query($sql) {
	$conn = open_database_connection ();
	
	$rs = $conn->query ( $sql );
	
	if ($rs === false) {
		trigger_error ( 'Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR );
	} else {
		$rows_returned = $rs->num_rows;
		$rs->data_seek ( 0 );
		
		return $rs;
		$rs->free ();
	}
	$conn->close ();
}
function get_post_by_id($id) {
	$conn = open_database_connection ();
	$posts = array ();
	
	if ($result = $conn->query ( "SELECT date, title, body FROM post WHERE id = " . $id )) {
		$row = $result->fetch_assoc ();
		$result->free ();
	} else {
		echo "No hay datos" . $result;
	}
	
	close_database_connection ( $conn );
	
	return $row;
}