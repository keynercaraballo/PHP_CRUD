<?php 
    include 'conexion.php'; 

    //obtener el id enviado 
    $idRegistro = $_GET['id'];

    //seleccionamos los datos asociados 
    $query = "SELECT * FROM usuarios where id='" .$idRegistro."'";
    $usuario = mysqli_query($con, $query);

    //volcamos los datos de ese registro en una fila
    $fila = mysqli_fetch_assoc($usuario);

    //crear y selecionar qry 
    if(isset($_POST['editarRegistro'])){
        $nombres =mysqli_real_escape_string($con, $_POST['nombres']);
        $apellidos =mysqli_real_escape_string($con, $_POST['apellidos']);
        $telefono = mysqli_real_escape_string($con,$_POST['telefono']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        //var_dump($nombres,$apellidos,$telefono,$email);
        //die();

        //configurar tiempo zona horaria
        date_default_timezone_set('America/Bogota');
        $time = date('h:i:s a', time());

        //validar si los campos no estan vacios 
        if($nombres =="" || $apellidos=="" || $email=="" ||$telefono=="" ){
           $error ='Algunos campos estan vacios';
        }else {
            $query = "UPDATE usuarios SET nombres='$nombres', apellidos='$apellidos', telefono='$telefono', email='$email' where id='$idRegistro'";
            
            if(!mysqli_query($con, $query)){
                die('Error'. mysqli_error($con));
                $error = "No se pudo atualiza el registro";
            }else {
                $mensaje = "Registro Actualizado con exito";
                //redireccionar 
                header('Location: index.php?mensaje='. urlencode($mensaje));
                exit();

            }
        }
    }
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

    <div class="row">
        <h4>Editar Registro</h4>
    </div>   

        <div class="row caja">
        <?php if(isset($error)) : ?>
                <h4 class="bg-danger text-white"><?php echo $error; ?></h4>

            <?php endif; ?>

            <div class="col-sm-6 offset-3">
            <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombres" placeholder="Ingresa el nombre" value="<?php echo $fila['nombres']; ?>">                    
                </div>
                
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos:</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Ingresa los apellidos" value="<?php echo $fila['apellidos']; ?>">                    
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono:</label>
                    <input type="number" class="form-control" name="telefono" placeholder="Ingresa el teléfono" value="<?php echo $fila['telefono']; ?>">                    
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingresa el email" value="<?php echo $fila['email']; ?>">                    
                </div>
              
                <button type="submit" class="btn btn-primary w-100" name="editarRegistro">Editar Registro</button>

                </form>
            </div>
        </div>
    </div>
  </body>
</html>