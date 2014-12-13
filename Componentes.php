<?php
include 'model.php';

class Componentes {
	public static function DibujarComboGenerico($SQL, $NombreCombo, $TextoPorDefecto = '', $OnChange = '', $ArrayParametros = null, $Disabled = false, $Silent = false, $Error = false) {
		$HTML = '';
		$background = '';
		
		if ($Error == true)
			$background = ' style="background-color: #FFFF99" ';
		
		$PropiedadDisabled = '';
		if ($Disabled)
			$PropiedadDisabled = 'disabled="disabled"';
			
			// A partir de acá comienzo a dibujar el Combo
		$HTML .= '<select id="' . $NombreCombo . '"' . $background . ' name="' . $NombreCombo . '"';
		
		if ($OnChange != '') // Si está definido el OnChange se lo pone.
			$HTML .= ' onchange="' . $OnChange . '"';
		
		$HTML .= '>';
		
		if ($TextoPorDefecto != '') {
			$HTML .= '<option value="" selected="selected">' . $TextoPorDefecto . '</option>';
		}
		
		$rs = get_query ( $SQL);

		
		while ( $row = $rs->fetch_row () ) {
			
			$id = $row [0];
			$descripcion = $row [1];
			
			$HTML .= '<option ' . $PropiedadDisabled . ' value="' . $id . '"  >' . $descripcion . '</option>';
		}
		
		$HTML .= "</select>";
		
		if ($Silent)
			return $HTML;
		else
			echo $HTML;
	}
}



?>