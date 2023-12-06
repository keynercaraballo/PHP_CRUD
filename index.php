<?php include 'conexion.php'; ?>
<?php
    //crear y selecionar qry 
    $query = "SELECT * FROM usuarios ORDER BY id DESC";
    $usuarios = mysqli_query($con, $query);

?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="css/estilos.css" rel="stylesheet">

    <title>CRUD PHP Y MYSQL</title>
  </head>
  <body>
    <h1 class="text-center">CRUD PHP Y MYSQL</h1>
    <p class="text-center">Aprende a realizar las 4 operaciones básicas entre PHP y una base de datos, en este caso MYSQL: CRUD(Create, Read, Update, Delete)</p>

    <div class="container">
        <?php if(isset($_GET['mensaje'])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $_GET['mensaje']; ?></strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
              

        <?php endif; ?>

    <div class="row">
            <div class="col-sm-4 offset-8 mb-4">
                <a href="crear.php" class="btn btn-success w-100"> Crear Nuevo Registro</a>
            </div>            
        </div>

        <div class="row caja">
            <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($fila= mysqli_fetch_assoc($usuarios)): ?>
                    <tr>
                            <td><?php echo $fila['id'];?></td>
                            <td><?php echo $fila['nombres'];?></td>
                            <td><?php echo $fila['apellidos'];?></td>
                            <td><?php echo $fila['telefono'];?></td>
                            <td><?php echo $fila['email'];?></td>
                            <td>
                            <a href="editar.php?id=<?php echo $fila['id'];?>" class="btn btn-primary"> Editar</a>
                            <a href="borrar.php?id=<?php echo $fila['id'];?>" class="btn btn-danger"> Borrar</a>
                            </td>
                        </tr> 
                    <?php endwhile; ?>
                    

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>