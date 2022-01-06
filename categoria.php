<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/categoria.css">
</head>

<body>
    <?php
        include("conexion.php");

        
    if (isset($_GET['envio'])) {
        $costoEnvio = $_GET['envio'];
        $codigo = $_GET['codigo'];

        $queryV = "SELECT * FROM venta where codigo = '$codigo' and folio = $folio";
        $resultV = mysqli_query($conn, $queryV);
        $rowV = mysqli_fetch_array($resultV);

        if ($rowV['codigo']) {
            // echo 'ya existe';
            header('Location:venta.php?idVendedor=' . $idVendedor . '&idCliente=' . $idCliente);
        } else {
            // echo 'no existe';
            $cantidad = 1;
            $producto = 'Envio';

            $insert = "INSERT INTO venta (folio,codigo,producto,cantidad,precio)
            VALUES ('$folio','$codigo','$producto',$cantidad,$costoEnvio)";
            if (mysqli_query($conn, $insert)) {
                //echo 'SiSePudo'.$folio.$codigo.$producto.$cantidad.$precio ;
                header('Location:venta.php?idVendedor=' . $idVendedor . '&idCliente=' . $idCliente);
            } else {
                //echo 'NoSePudo'.$folio.$codigo.$producto.$cantidad.$precio ;
                header('Location:venta.php?idVendedor=' . $idVendedor . '&idCliente=' . $idCliente);
            }
        }
    }
    ?>
    <div>
        <form action="categoria.php" method="post">
            <label for="">Nueva Categoria</label>
            <input type="text">
            <button>Crear</button>
        </form>
        <div class="categorias">
            ccc
        </div>
    </div>
</body>

</html>