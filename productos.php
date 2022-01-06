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
</head>

<body>
    <form action="productos.php" method="post">
        <div class="duo">
            <label for="">Nombre:</label>
            <input name="nombre" type="text">
        </div>
        <div class="duo">
            <label for="">Categoria:</label>
            <select class="form-select" aria-label="Default select example">
                <option value="1">Elegir categoria</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="duo">
            <label for="">Descripción:</label>
            <input name="descripcion" type="text">
        </div>
        <div class="duo">
            <label for="">Cantidad:</label>
            <input type="number" name="cantidad" id="">
        </div>
        <div class="duo">
            <input type="file" onchange="imagen()" name="" id="archivo">
            <img src="" id="imagenS" alt="">
        </div>
    </form>


    <script src="js/scriptProductos.php"></script>
</body>

</html>