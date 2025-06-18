<?php
include "../config/database.php";

$id_usuario = $_GET["id"];

mysqli_query($conn, "DELETE FROM usuarios WHERE id = '$id_usuario'");

header("location: logado.php")
?>