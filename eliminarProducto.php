<?php
    include ("conexion.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $idCategoria = $_GET['idCategoria'];
        $accion = $_GET['accion'];
            $delete = "DELETE FROM producto WHERE id = $id";
            if (mysqli_query($conn, $delete)){
                $_SESSION['message'] = 'Registro borrado exitosamente';
                $_SESSION['message_type'] = 'danger'; # Funcion de bootstrap
                if (isset($_GET['idCategoria'])) {
                header('Location:productos.php?idCategoria='.$idCategoria); # Redireccionar el archivo
                }else{
                    header('Location:productosG.php'); # Redireccionar el archivo
                }
            }else{
                echo "Error al borrar registro: " . mysqli_error($conn);
                echo "no elimino";
                if (isset($_GET['idCategoria'])) {
                header('Location:productos.php?idCategoria='.$idCategoria); # Redireccionar el archivo
                }else{
                    header('Location:productosG.php'); # Redireccionar el archivo
                }
            }
    }
?>