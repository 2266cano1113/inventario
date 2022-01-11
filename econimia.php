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
    <div class="contenedor">

        <form action="guardarProduct.php" method="post" enctype="multipart/form-data">
            <label for="">Producto: </label>
            <select class="form-select" name="" aria-label="Default select">
                <option selected>Selecciona una catogoria</option>
                <?php
                $query = "SELECT * FROM producto ORDER BY nombre";
                $result = mysqli_query($conn, $query);
                while ($producto = mysqli_fetch_array($result)) {
                ?>
                    <option value="<?php echo $producto['id'] ?>">
                        <?php echo $producto['nombre'] ?>
                    </option>
                <?php } ?>
            </select>
        </form>
    </div>
</body>

</html>