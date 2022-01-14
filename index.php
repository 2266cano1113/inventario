<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <!-- <link rel="stylesheet" href="css/normalize.css"> -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/styleIndex.css">
</head>

<body>
    <?php
    include("conexion.php");
        include("header.php");
    ?>
    <main>
                    <a href="productosG.php">
                        <h2>General</h2>
                    </a>
        <?php
                $query = "SELECT * FROM categoria";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <a href="productos.php?idCategoria=<?php echo $row['id'] ?>">
                        <h2><?php echo $row['categoria'] ?></h2>
                    </a>
                <?php } ?>
                    <a href="categoria.php">
                        <h2><i class="bi bi-plus-circle"></i></h2>
                    </a>
    </main>
    <?php
        include("footer.php");
    ?>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
</body>

</html>