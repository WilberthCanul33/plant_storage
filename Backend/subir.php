<?php
include('conexion.php');

if(isset($_POST['guardar'])){
    $imagen = $_FILES['imagen']['name'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];


    if(isset($imagen) && $imagen != ""){
        $tipo = $_FILES['imagen']['type'];
        $temp  = $_FILES['imagen']['tmp_name'];

       if( !((strpos($tipo,'gif') || strpos($tipo,'jpeg') || strpos($tipo,'webp') || strpos($tipo,'png') || strpos($tipo,'jpg')))){
          $_SESSION['mensaje'] = 'solo se permite archivos jpeg, gif, webp, png, jpg';
          $_SESSION['tipo'] = 'danger';
          header('location:../index.php');
       }else{
         $query = "INSERT INTO imagenes(imagen, titulo, descripcion) values('$imagen', '$titulo', '$descripcion')";
         $resultado = mysqli_query($conexion,$query);
         if($resultado){
              move_uploaded_file($temp,'imagenes/'.$imagen);   
             $_SESSION['mensaje'] = 'se ha subido correctamente';
             $_SESSION['tipo'] = 'success';
             header('location:../reg.php');
         }else{
             $_SESSION['mensaje'] = 'ocurrio un error en el servidor';
             $_SESSION['tipo'] = 'danger';
         }
       }
    }
}


?>