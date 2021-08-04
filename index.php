<?php
require_once './php/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Examen Parcial</title>
  <link rel="stylesheet" href="css/main.css" />
</head>

<body>
  <div class="contenedor">
    <div class="contenedor-formulario">
      <h1>Registrar Estudiante</h1>
      <form action="./php/datos.php" id="formulario" method="POST">
        <input type="text" class="input" placeholder="Estudiante" name="estudiante" />
        <input type="text" class="input" placeholder="Carrera" name="carrera" />
        <input type="mail" class="input" placeholder="Correo" name="correo" />
        <div class="genero">
          <label><input type="radio" name="sexo" value="masculino" />Masculino</label>
          <label><input type="radio" name="sexo" value="femenino" />Femenino</label>
        </div>
        <input type="submit" class="btn" value="Guardar" />
      </form>
      <div class="error">
        <p><?= isset($_SESSION['errores']) ? "Por favor llene los campos Correctamente.." : ""; ?></p>
      </div>
      <?php if (isset($_SESSION['errores'])) : ?>
        <?php $_SESSION['errores'] = null;
        unset($_SESSION['errores']); ?>
      <?php endif; ?>
    </div>

    <div class="contenedor-datos">
      <table class="tabla">
        <thead>
          <tr>
            <th>ID</th>
            <th>ESTUDIANTE</th>
            <th>CARRERA</th>
            <th>CORREO</th>
            <th>GENERO</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($fila = mysqli_fetch_assoc($consulta)) : ?>
            <tr>
              <td><?= $fila['id']; ?></td>
              <td><?= $fila['estudiante']; ?></td>
              <td><?= $fila['carrera']; ?></td>
              <td><?= $fila['correo']; ?></td>
              <td><?= $fila['sexo']; ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
  <script src="js/index.js"></script>
</body>

</html>