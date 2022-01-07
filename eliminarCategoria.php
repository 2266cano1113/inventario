<?php
    include ("conexion.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $accion = $_GET['accion'];

            $delete = "DELETE FROM categoria WHERE id = $id";
            if (mysqli_query($conn, $delete)){
                $_SESSION['message'] = 'Registro borrado exitosamente';
                $_SESSION['message_type'] = 'danger'; # Funcion de bootstrap

                header('Location:categoria.php'); # Redireccionar el archivo
            }else{
                echo "Error al borrar registro: " . mysqli_error($conn);
                header('Location:categoria.php'); # Redireccionar el archivo
                echo "no elimino";
            }
    }
