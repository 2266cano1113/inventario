<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php

    include("conexion.php");

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $pCompra = $_POST['pcompra'];
        $cantidadC = $_POST['cantidad'];
        $provedor = $_POST['provedor'];
        $fecha = $_POST['fecha'];

        $pCompra = $pCompra / $cantidadC;

        $insert = "INSERT INTO historial (idProducto,fechaCompra,precioCompra,cantidadCompra,provedor)
        VALUES ($id,'$fecha',$pCompra,$cantidadC,'$provedor')";

        if (mysqli_query($conn, $insert)) {
            $_SESSION['message'] = 'Registro guardado exitosamente';
            $_SESSION['message_type'] = 'success';
            echo 'si se pudo';

            $query = "SELECT * FROM producto WHERE id = $id";
            $result = mysqli_query($conn, $query);
            $producto = mysqli_fetch_array($result);

            $cantidadC = $cantidadC + $producto['cantidad'];

            $update = "UPDATE producto set cantidad = '$cantidadC' WHERE id = $id";
            mysqli_query($conn, $update);

            header('Location:productos.php');
        } else {
            echo "El registro no se pudo guardar" . mysqli_error($conn);
            // header('Location:productos.php');
        }
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $query = "SELECT * FROM producto WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $producto = mysqli_fetch_array($result);

    ?>

    <div class="contenedor w-50">
        <p for="">Producto: </p>
        <p><?php echo $producto['nombre'] ?></p>
        <p for="">Descripción</p>
        <p><?php echo $producto['descripcion'] ?></p>
        <label for="">Cantidad Actual</label>
        <p><?php echo $producto['cantidad'] ?></p>
        <div class="w-50">
            <img class="img-fluid" src="img/<?php echo $producto['imagen'] ?>" alt="">
        </div>
        <form action="economia.php" method="POST" class="mt-4">
            <input type="number" class="d-none" name="id" value="<?php echo $id ?>" id="">
            <label for="">Precio de : $</label>
            <input class="form-control" type="number" name="pcompra" id="">
            <label for="">Cantidad de compra</label>
            <input class="form-control" type="number" name="cantidad" id="">
            <label for="">Provedor</label>
            <input class="form-control" type="text" name="provedor">
            <label for="">Fecha compra</label>
            <input class="form-control" type="date" name="fecha" id="">
            <button type="submit">Guardar</button>
        </form>

        <div class="lista">
            
        </div>
    </div>
</body>

</html>