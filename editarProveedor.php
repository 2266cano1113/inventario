<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/proveedor.css">


    <title>Implants Bionic</title>


</head>

<body>
<?php
    include("header.php");
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center fondo">
                <h1>Actualizar Datos</h1>
            </div>
        </div>


        <?php
        include("conexion.php");
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $query = "SELECT * FROM proveedor WHERE id = $id";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result);

                $id = $row['id'];
                $nombre = $row['nombre'];
                $calle = $row['calle'];
                $num = $row['num'];
                $colonia = $row['colonia'];
                $ciudad = $row['ciudad'];
                $telefono = $row['telefono'];
                $email = $row['email'];

            }
        }
        if (isset($_POST['update'])) {
            $id = $_GET['id'];
            $nombre = $_POST['nombre'];
            $calle = $_POST['calle'];
            $num = $_POST['num'];
            $colonia = $_POST['colonia'];
            $ciudad = $_POST['ciudad'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];

            $update = "UPDATE descripcion set nombre = '$nombre', calle ='$calle', num = '$num', colonia = '$colonia',
             ciudad = '$ciudad', telefono = '$telefono',email ='$email',  WHERE id= $id";
            mysqli_query($conn, $update);
            $_SESSION['message'] = 'Registro actualizado exitosamente';
            $_SESSION['message_type'] = 'info';
            header('Location:proveedor.php?id='.$id);
        }
        ?>
       
                        <form name="form" action="updateDescripcion.php?id=<?php echo $_GET['id']; ?>" onsubmit="return validarform()" method="POST">
                            <label for="" class="d-none">ID: </label>
                            <div class="form-group">
                                <input type="number" name="id" value="<?php echo $id; ?>" class="form-control d-none" placeholder="Actualiza ID" autocomplete="off" autofocus>
                            </div>
                            <label for="" class="d-none">nombre:</label>
                            <div class="form-group">
                                <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control d-none" placeholder="Actualiza ID_Asociado" autocomplete="off" required>
                            </div><label for=""> calle:</label>
                            <div class="form-group">
                                <input type="text" name="calle" value="<?php echo $calle; ?>" class="form-control" placeholder="Actualiza Descripcion" autocomplete="off" required>
                            </div>
                            </div><label for=""> num:</label>
                            <div class="form-group">
                                <input type="text" name="num" value="<?php echo $num; ?>" class="form-control" placeholder="Actualiza Descripcion" autocomplete="off" required>
                            </div></div><label for=""> colonia:</label>
                            <div class="form-group">
                                <input type="text" name="colonia" value="<?php echo $colonia; ?>" class="form-control" placeholder="Actualiza Descripcion" autocomplete="off" required>
                            </div></div><label for=""> ciudad:</label>
                            <div class="form-group">
                                <input type="text" name="ciudad" value="<?php echo $ciudad; ?>" class="form-control" placeholder="Actualiza Descripcion" autocomplete="off" required>
                            </div></div><label for=""> telefono:</label>
                            <div class="form-group">
                                <input type="text" name="telefono" value="<?php echo $telefono; ?>" class="form-control" placeholder="Actualiza Descripcion" autocomplete="off" required>
                            </div></div><label for=""> email:</label>
                            <div class="form-group">
                                <input type="text" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Actualiza Descripcion" autocomplete="off" required>
                            </div>

                            <button class="btn btn-secondary w-100 mt-3" name="update">
                                Actualizar
                            </button>
                            <a class="btn btn-secondary w-100 mt-3" href="proveedor.php?id=<?php echo $id ?>">Cancelar</a>
                        </form>
                  

    <?php
    include("footer.php");
    ?>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>