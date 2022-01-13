<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/economia.css">
</head>

<body>
    <?php
    include("header.php");
    include("conexion.php");
    $id = 0;

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $pCompra = $_POST['pcompra'];
        $cantidadC = $_POST['cantidad'];
        $provedor = $_POST['provedor'];
        $fecha = $_POST['fecha'];

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

<a class="flecha" href="productos.php?idCategoria=<?php echo $producto['categoria'] ?>"><i class="bi bi-arrow-left"></i></a>

    <div class="contenedor">
        <div class="nh">
            <div class="infoProducto">
                <p for="">Producto: <?php echo $producto['nombre'] ?></p>
                <p for="">Descripción:<?php echo $producto['descripcion'] ?></p>
                <p>Cantidad Actual: <?php echo $producto['cantidad'] ?></p>
                <div>
                <img class="img-fluid" src="img/<?php echo $producto['imagen'] ?>" alt="">
                </div>
            </div>
            <form action="economia.php" method="POST">
                <input type="number" class="d-none" name="id" value="<?php echo $id ?>" id="">
                <label for="">Precio de compra unit: $</label>
                <input class="form-control" type="number" name="pcompra" id="">
                <label for="">Cantidad de compra:</label>
                <input class="form-control" type="number" name="cantidad" id="">
                <label for="">Proveedor:</label>
                <input class="form-control" type="text" name="provedor">
                <label for="">Fecha compra:</label>
                <input class="form-control" type="date" name="fecha" id="">
                <button type="submit">Guardar</button>
            </form>
        </div>
        <div class="lista">
            <p> <span>Precio C Unit.</span> <span>Cantidad</span> <span>Fecha</span><span>Provedor</span></p>
            <?php
            $query = "SELECT * FROM historial WHERE idProducto = $id order by id DESC";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <p><span>$<?php echo $row['precioCompra'] ?></span> <span><?php echo $row['cantidadCompra'] ?></span> <span><?php echo $row['fechaCompra'] ?></span> <span><?php echo $row['provedor'] ?></span></p>
            <?php } ?>
        </div>
    </div>  
        <?php
        include("footer.php");
    ?>
</body>
</html>