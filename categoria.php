<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/categoria.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>
    <?php
    include("header.php");
    include("conexion.php");

    $mensaje = '';

    if (isset($_GET['mensaje'])) {
        $mensaje = $_GET['mensaje'];
    }

    if (isset($_POST['categoria'])) {
        $nuevaCategoria = $_POST['categoria'];

        $query = "SELECT * FROM categoria WHERE categoria = '$nuevaCategoria'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);

        if (!$row) {
            $insert = "INSERT INTO categoria (categoria)
            VALUES ('$nuevaCategoria')";
            if (mysqli_query($conn, $insert)) {
                header('Location:categoria.php');
            }
        } else {
            header('Location:categoria.php?mensaje=ya existe esa categoria');
        }
    }
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $categoria = $_POST['categoriaE'];
        $color = $_POST['color'];

        $update = "UPDATE categoria set categoria = '$categoria', color = '$color' WHERE id = $id";
        if (mysqli_query($conn, $update)) {
            $_SESSION['message'] = 'Registro actualizado exitosamente';
            $_SESSION['message_+type'] = 'info';
            header('Location:categoria.php');
        } else {
            echo 'no se pudo actualizar';
            echo $color;
        }
    }
    ?>
    <a class="flecha" href="index.php"><i class="bi bi-arrow-left"></i></a>
    <div>
        <h2><?php echo $mensaje ?></h2>
        <form action="categoria.php" method="post">
            <label for="">Nueva Categoria</label>
            <input type="text" name="categoria" required autocomplete="off">
            <button>Crear</button>
        </form>
        <div class="categorias">
            <h1>Categorias</h1>
            <div class="tarjetero">
                <?php
                $query = "SELECT * FROM categoria";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {

                    $cadena_base =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

                    $password = '';
                    $limite = strlen($cadena_base) - 1;

                    for ($i = 0; $i < 10; $i++) {
                        $password .= $cadena_base[rand(1, $limite)];
                    }
                ?>
                    <button data-bs-toggle="modal" data-bs-target="#<?php echo $password ?>">
                        <!-- style="background-color:<?php echo $row['color'] ?>;" -->
                        <p><?php echo $row['categoria'] ?></p>
                    </button>
                    <div class="modal fade" id="<?php echo $password ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">

                                    <form action="categoria.php" method="post">
                                        <input class="d-none" type="text" name="id" value="<?php echo $row['id']  ?>">
                                        <h3 for="">Nombre de categoria</h3>
                                        <input type="text" name="categoriaE" value="<?php echo $row['categoria'] ?>">
                                        <!-- <input type="color" class="color" name="color" value="<?php echo $row['color'] ?>"> -->
                                        <button class="btn-modal" >Guardar</button>
                                        <a  class="btn-modal" href="eliminarCategoria.php?id=<?php echo $row['id'] ?>&accion=0"><i class="bi bi-trash-fill"></i></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>