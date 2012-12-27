<?php
include_once('puntuaciones.php');
$puntuaciones = new puntuaciones();
if(isset($_POST['idEvento'])){
	echo $eventos->getJSONPuntuacionesEvento($_POST['idEvento']);
} else {
	echo $eventos->getJSONError('envio','Error en el envío de datos');
}
?>