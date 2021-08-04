<?php
require_once 'conexion.php';
if (isset($_POST)) {
    $estudiante =  $_POST['estudiante'] ?  $_POST['estudiante'] : false;
    $carrera = $_POST['carrera'] ? $_POST['carrera'] : false;
    $correo =  $_POST['correo'] ? $_POST['correo'] : false;
    $sexo =  $_POST['sexo'] ? $_POST['sexo'] : false;

    $errores = array();

    if (
        !empty($estudiante) && !is_numeric($estudiante) && !preg_match("/[0-9]/", $estudiante)
    ) {
        $estudiante_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    if (
        !empty($carrera) && !is_numeric($carrera) && !preg_match("/[0-9]/", $carrera)
    ) {
        $carrera_validado = true;
    } else {
        $carrera_validado = false;
        $errores['carrera'] = "La carrera no es valida";
    }

    if (
        !empty($correo) && filter_var($correo, FILTER_VALIDATE_EMAIL)
    ) {
        $correo_validado = true;
    } else {
        $correo_validado = false;
        $errores['correo'] = "El correo no es valido";
    }

    if (
        !empty($sexo)
    ) {
        $sexo_validado = true;
    } else {
        $sexo_validado = false;
        $errores['sexo'] = "Seleccione el sexo";
    }
    $registro = false;
    if (count($errores) == 0) {
        $registro = true;
        $sql_insert = "INSERT INTO instituto(estudiante,carrera,correo,sexo)VALUES ('$estudiante','$carrera','$correo','$sexo')";
        $resulta = mysqli_query($db, $sql_insert);
    } else {
        $_SESSION['errores'] = $errores;
    }
    header('location: ../index.php');
}
