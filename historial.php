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
    <link rel="stylesheet" href="css/historial.css">
</head>
<body>
    <?php  
    include("header.php");
    include("conexion.php");
    ?>

<a class="flecha" href="index.php"><i class="bi bi-arrow-left"></i></a>
    <div class="lista">
        <p><span>Fecha</span> <span>Producto</span> <span>Precio C Unit.</span> <span>Cantidad</span> <span>Provedor o Personal</span></p>
        <?php
        $query = "SELECT * FROM historial order by id DESC";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
            $producto = $row['idProducto'];
            $queryP = "SELECT * FROM producto WHERE id = $producto";
            $nombreP = ' ';
            if (mysqli_query($conn, $queryP)) {
                $resultP = mysqli_query($conn, $queryP);
                $rowP = mysqli_fetch_array($resultP);
                $nombreP = $rowP['nombre'];
            }
        ?>
            <p> <span><?php echo $row['fechaCompra'] ?></span> <span><?php echo $nombreP?></span> <span><?php echo $row['precioCompra'] ?></span> <span><?php echo $row['cantidadCompra'] ?></span> <span><?php echo $row['provedor'] ?></span></p>
        <?php } ?>
    </div>

    <?php
        include("footer.php");
    ?>
</body>
</html>