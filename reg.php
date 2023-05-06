<?php
include('Backend/conexion.php');
$query = "select * from imagenes";
$resultado = mysqli_query($conexion, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="css/reg.css">
  <title>Document</title>
</head>

<body>
  <section class="reg">
    <div class="so">
      <a class="btn btn-warning" href="index.php">Atras</a>
    <h1>Registra tus Plantas</h1>
    </div>
    <br>
    <div class="formulario">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h1 class="text-success">Registrar🍃</h1>
            <form action="Backend/subir.php" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="" class="form-label">Seleccione la imagen de la planta📷:</label>
                <input type="file" name="imagen" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-muted">Imagen de tu planta</small>
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Nombre de la planta🌹:</label>
                <input type="text" name="titulo" id="" class="form-control" placeholder="Escribe el Nombre" aria-describedby="helpId">
                <small id="helpId" class="text-muted">Cool name!</small>
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Descripcion de la planta💐:</label>
                <input type="text" name="descripcion" id="" class="form-control" placeholder="Escribe la descripcion" aria-describedby="helpId">
                <small id="helpId" class="text-muted">So Epic!</small>
              </div>
              <?php if (isset($_SESSION['mensaje'])) { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong><?php echo $_SESSION['mensaje']; ?></strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php session_unset();
              } ?>
              <input class="btn btn-warning" type="submit" value="Subir" name="guardar">
            </form>
          </div>
          <div class="col-lg-8">
            <h1 class="text-success text-center">Tus Plantas</h1>
            <hr>

            <div class="row row-cols-1 row-cols-md-1 g-4">
              <?php foreach ($resultado as $row) { ?>
                <div class="card" style="width: 20rem;">
                  <img src="Backend/imagenes/<?php echo $row['imagen']; ?>" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h4 class="card-title"><strong><?php echo $row['titulo']; ?></strong></h4>
                    <h5 class="card-title"><?php echo $row['descripcion']; ?></h5>
                  </div>
                  <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Eliminar</a>

                </div>
              <?php } ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>

</body>

</html>