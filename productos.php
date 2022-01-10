<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/productos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>
    <?php
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
        <form action="guardarProduct.php" method="post" enctype="multipart/form-data">
            <div class="contenido">

                <div class="duo">
                    <label for="">Categoria: <span><?php echo $categoria ?></span></label>
                    <select class="form-select" name="" aria-label="Default select" value="<?php echo $categoria ?>" onchange="location = this.value;">
                        <option selected>Selecciona una catogoria</option>
                        <option value="categoria.php">Nueva Categoria
                        </option>
                        <?php
                        $query = "SELECT * FROM categoria ORDER BY categoria";
                        $result = mysqli_query($conn, $query);
                        while ($categoria = mysqli_fetch_array($result)) {
                        ?>
                            <option value="productos.php?idCategoria=<?php echo $categoria['id'] ?>">
                                <?php echo $categoria['categoria'] ?>
                            </option>
                            <!-- agregue idcliente idvendedor falta usarlo al dar click en un producto  -->
                        <?php } ?>
                    </select>
                </div>
                <div class="duo">
                    <label for="">Nombre:</label>
                    <input name="nombre" type="text">
                </div>
                <div class="duo">
                    <label for="">Cantidad Actual:</label>
                    <input type="number" name="cantidad" id="">
                </div>

                <input type="text" class="d-none" name="categoria" value="<?php echo $idCategoria ?>">
                <div class="duo">
                    <label for="">Foto:</label>
                    <input type="file" name="image" accept="image/*" class="archivito" placeholder="Elige imagen">
                </div>
            </div>
            <div class="duo">
                <label for="">Descripción:</label>
                <textarea name="descripcion" type="text"></textarea>
            </div>
            <button type="submit">Guardar</button>
        </form>

        <div class="listaProductos">
            <p><span>Nombre</span> <span>Categoria</span> <span>Stock</span></p>
            <?php
                $query = "SELECT * FROM producto ORDER BY nombre";
                $result = mysqli_query($conn, $query);
                while ($producto = mysqli_fetch_array($result)) {
                    $idCategoria = $producto['categoria'];
                    $query2 = "SELECT * FROM categoria WHERE id = $idCategoria";
                    $result2 = mysqli_query($conn, $query2);
                    $categoria = mysqli_fetch_array($result2);

                    $cadena_base =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

                    $password = '';
                    $limite = strlen($cadena_base) - 1;
                    
                    for ($i = 0; $i < 10; $i++) {
                        $password .= $cadena_base[rand(1, $limite)];
                    }
            ?>
                <p>
                    <button data-bs-toggle="modal" data-bs-target="#<?php echo $password ?>"><span><?php echo $producto['nombre'] ?></span> <span><?php echo $categoria['categoria'] ?></span> <span><?php echo $producto['cantidad'] ?></span></button>
                </p>
                <div class="modal fade" id="<?php echo $password ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h3 for="">Nombre</h3>
                                <label for="">Producto: <?php echo $producto['nombre'] ?></label>
                                <?php
                                $idddd = $producto['id'];
                                $queryM = "SELECT * FROM categoria WHERE id = $idddd";
                                $resultM = mysqli_query($conn, $queryM);
                                $categoriaM = mysqli_fetch_array($resultM);
                                ?>
                                <label for="">Categoria: <?php echo $categoriaM['categoria'] ?></label>
                                <label for="">Cantidad: <?php echo $producto['cantidad'] ?></label>
                                <label for="">Descripción: </label>
                                <p><?php echo $producto['descripcion'] ?></p>
                                <div class="imagen">
                                    <img class="img-fluid" src="img/<?php echo $producto['imagen'] ?>" alt="">
                                </div>
                                <a href="economia.php?id=<?php echo $producto['id'] ?>">Ingresos</a>
                                <a href="eliminarProducto.php?id=<?php echo $producto['id'] ?>">Eliminar<i class="bi bi-trash-fill"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>