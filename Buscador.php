<?php
include 'Componentes.php';

echo "<ul class='navbar'>";

Componentes :: DibujarComboGenerico ("select titulo, descripcion from publicaciones", "Localidad", " ");

?>

