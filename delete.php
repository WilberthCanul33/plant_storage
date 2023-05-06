<?php
include 'Backend/conexion.php';
$id = $_REQUEST['id'];
$query = "DELETE FROM imagenes WHERE id ='$id'";
unlink("imagenes/".$imagen);

$resultado = mysqli_query($conexion,$query);
if ($resultado) {
    header('Location: reg.php');
}


?>