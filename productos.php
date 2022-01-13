<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/productos.css">
</head>
<body>
    <?php
    include("header.php");
    include('conexion.php');
    $categoria = "";
    $idCategoria = "";
    if (isset($_GET['idCategoria'])) {
        $idCategoria = $_GET['idCategoria'];

        $query = "SELECT * FROM categoria WHERE id = $idCategoria";
        $result = mysqli_query($conn, $query);
        $infoCategoria = mysqli_fetch_array($result);

        $categoria = $infoCategoria['categoria'];
    }
    ?>
    <div class="contenedor">
        <a class="flecha" href="index.php"><i class="bi bi-arrow-left"></i></a>
        <form action="guardarProduct.php" method="post" enctype="multipart/form-data">
                <Label>Categoria: <?php echo $categoria?></Label>
            <div class="contenido">
                <div class="duo">
                    <label for="">Nombre:</label>
                    <input name="nombre" type="text" required>
                </div>
                <!-- <div class="duo">
                    <label for="">Cantidad Actual:</label>
                    <input type="number" name="cantidad" id="">
                </div> -->
                <input type="text" class="d-none" name="categoria" value="<?php echo $idCategoria ?>">
                <div class="duo">
                    <label for="">Foto:</label>
                    <input class="input-file-input" type="file" name="image" accept="image/*" class="archivito" placeholder="Elige imagen">
                </div>
            </div>
            <div class="duo">
                <label for="">Descripción:</label>
                <textarea name="descripcion" type="text"></textarea>
            </div>
            <button class="btn" type="submit">Guardar</button>
        </form>

        <div class="listaProductos">
            <p><span>Nombre</span> <span>Categoria</span> <span>Stock</span></p>
            <?php
                $query = "SELECT * FROM producto WHERE categoria = $idCategoria ORDER BY nombre";
                $result = mysqli_query($conn, $query);
                while ($producto = mysqli_fetch_array($result)) {

                    $cadena_base =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

                    $password = '';
                    $limite = strlen($cadena_base) - 1;
                    
                    for ($i = 0; $i < 10; $i++) {
                        $password .= $cadena_base[rand(1, $limite)];
                    }
            ?>
                <p>
                    <button data-bs-toggle="modal" data-bs-target="#<?php echo $password ?>"><span><?php echo $producto['nombre'] ?></span> <span><?php echo $categoria ?></span> <span><?php echo $producto['cantidad'] ?></span></button>
                </p>
                <div class="modal fade" id="<?php echo $password ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h3 for="">Datos del Producto</h3>
                                <label for="">Producto: <?php echo $producto['nombre'] ?></label>
                                <?php
                                ?>
                                <label for="">Categoria: <?php echo $categoria ?></label>
                                <label for="">Cantidad: <?php echo $producto['cantidad'] ?></label>
                                <label for="">Descripción: </label>
                                <p><?php echo $producto['descripcion'] ?></p>
                                <div class="imagen">
                                    <img class="img-fluid" src="img/<?php echo $producto['imagen'] ?>" alt="">
                                </div>
                                <a href="economia.php?id=<?php echo $producto['id'] ?>"><span>Ingresos<i class="bi bi-box-arrow-in-down"></i></span></a>
                                <a href="salidas.php?id=<?php echo $producto['id'] ?>"><span>Salidas <i class="bi bi-box-arrow-up"> </i></span></a>
                                <a href="eliminarProducto.php?id=<?php echo $producto['id'] ?>&idCategoria=<?php echo $idCategoria ?>"><span>Eliminar<i class="bi bi-trash"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php
        include("footer.php");
    ?>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>