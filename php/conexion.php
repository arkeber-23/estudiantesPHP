<?php

$db = mysqli_connect(
    'localhost',
    'root',
    'root23',
    'examenparcial'
);
$sql_select = "SELECT * FROM instituto";
$consulta = mysqli_query($db, $sql_select);

session_start();
