<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/proveedor.css">
    <title>Document</title>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <?php
    include("conexion.php");
    $id = $_GET['id'];
    $idVendedor = $_GET['idVendedor'];
    $query = "SELECT * FROM proveedor WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if (isset($_POST['actualizar'])) {
        $id = $_POST['id'];
        $nombre = ucwords(strtolower($_POST['nombre']));
        $calle = ucwords(strtolower($_POST['calle']));
        $colonia = ucwords(strtolower($_POST['colonia']));
        $num = ucwords(strtolower($_POST['num']));
        $ciudad = ucwords(strtolower($_POST['ciudad']));
        $telefono = ucwords(strtolower($_POST['telefono']));
        $email = ucwords(strtolower($_POST['email']));


        $insert = "UPDATE proveedor set nombre ='$nombre',calle = '$calle', colonia = '$colonia', num = '$num',ciudad = '$ciudad',
         telefono = '$telefono', email = '$email' WHERE id= $id";
                if (mysqli_query($conn, $insert)) {
            $_SESSION['message'] = 'Registro Actualizado';
            $_SESSION['message_type'] = 'success';
            header('Location:proveedor.php?id');
        } else {
            echo "El registro no se pudo guardar" . mysqli_error($conn);
        }
    }
    ?>
    <div class="contenedor">

        <div class="actualizar">
            <form action="editarProveedor.php?id=<?php echo $row['id'] ?><?php echo $id?>"
                method="POST">
                <input class="d-none" type="text" name="idV" value="<?php echo $row['id'] ?>">
                <label class="d-none" for="">id</label>
                <input class="d-none" type="text" name="id" value="<?php echo $row['id'] ?>">
                <div>
                    <label for="">Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo $row['nombre'] ?>" require>
                </div>
                <div>
                    <label for="">Calle:</label>
                    <input type="calle" name="calle" value="<?php echo $row['calle'] ?>" required>
                </div>
                <div>
                    <label for="">Colonia:</label>
                    <input type="text" name="colonia" value="<?php echo $row['colonia'] ?>" required>
                </div>
                <div>
                    <label for="">Numero:</label>
                    <input type="text" name="num" value="<?php echo $row['num'] ?>" required>
                </div>
                <div>
                    <label for="">Ciudad:</label>
                    <input type="text" name="ciudad" value="<?php echo $row['ciudad'] ?>" required>
                </div>
                <div>
                    <label for="">Telefono:</label>
                    <input type="number" name="telefono" value="<?php echo $row['telefono'] ?>" required>
                </div>
                <div>
                    <label for="">Email:</label>
                    <input type="email" name="email" value="<?php echo $row['email'] ?>" required>
                </div>
              
                <button class="btn-actualizar btn btn-secondary" type="submit" name="actualizar">Actualizar</button>
            </form>
            
        </div>

    </div>
    <?php
    include("footer.php");
    ?>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>