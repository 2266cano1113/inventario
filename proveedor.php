<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/proveedor.css">
    <title>Document</title>
</head>

<body>
    <?php
    include ("conexion.php");
    include ("header.php");
    if (isset($_POST['nombre'])){
        $id = $_POST['id'];
        $nombre= $_POST['nombre'];
        $calle = $_POST['calle'];
        $num = $_POST['num'];
        $colonia =$_POST['colonia'];
        $ciudad = $_POST['ciudad'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];

        $insert = "INSERT INTO proveedor (id,nombre,calle,num,colonia,ciudad,telefono,email)
        VALUES ('$id','$nombre','$calle','$num', '$colonia', '$ciudad', '$telefono', '$email')";
    
        if (mysqli_query($conn,$insert)){
            $_SESSION['message'] = 'Registro guardado exitosamente';
            $_SESSION['message_type'] = 'success'; 
            // header('Location:localhost/proveedor.php');
        }else{
        echo "El registro no se pudo guardar". mysqli_error($conn);
        }        
    }
?>
    <div class="contenedor">
        <h2>Datos del proveedor</h2>
        <form method="post" name="form" action="proveedor.php">

            <div>
                <label for="">Id</label>
                <input type="text" name="id" placeholder="" autocomplete="off" required>
            </div>
            <div>
                <label for="">Nombre:</label>
                <input type="text" name="nombre" placeholder="" autocomplete="off" required>
            </div>
            <div>
                <label for="">Calle:</label>
                <input type="text" name="calle" placeholder="" autocomplete="off" required>
            </div>
            <div>
                <label for="">Num:</label>
                <input type="number" name="num" placeholder="" autocomplete="off" required>
            </div>
            <div>
                <label for="">Colonia:</label>
                <input type="text" name="colonia" placeholder="" autocomplete="off" required>
            </div>
            <div>
                <label for="">Ciudad:</label>
                <input type="text" name="ciudad" placeholder="" autocomplete="off" required>
            </div>
            <div>
                <label for="">Telefono:</label>
                <input type="text" name="telefono" placeholder="" autocomplete="off" required>
            </div>
            <div>
                <label for="">Email:</label>
                <input type="text" name="email" placeholder="" autocomplete="off" required>
            </div>

            <input class="boton" type="submit" name="enviar">
        </form>
    </div>

    <di class="contenedorTabla">
        <table>
            <thead>
                <tr>
                    <th class="">Id</th>
                    <th class="">Nombre</th>
                    <th class="">Direccion</th>
                    <th class="">Telefono</th>
                    <th class="">Email</th>
                    <th class="">Opciones</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                                    include("conexion.php");
                                    $query = "SELECT * FROM proveedor";
                                    $result = mysqli_query($conn, $query);
                                    while($row = mysqli_fetch_array($result)){ 
                                    
                                ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['nombre'] . " "?></td>
                    <td><?php echo $row['calle'] . " " . $row['num'] . " " . $row['colonia'] . " " . $row['ciudad'] ?>
                    </td>
                    <td><?php echo $row['telefono'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td>
                        <a href="editarProveedor.php?id=<?php echo $row['id']?>">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="eliminarProveedor.php?id=<?php echo $row['id']?>">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
        </div>
        <?php
include ("footer.php");
?>

</body>

</html>