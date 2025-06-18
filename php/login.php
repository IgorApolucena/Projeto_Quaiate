<?php
include "../config/database.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$verificar = "SELECT email, senha FROM usuarios WHERE '$email' = email AND '$senha' = senha";

$resultado = $conn->query($verificar);

if ($resultado->num_rows > 0){
    echo"Login efetudado com sucesso!";
}else{
    echo"Ops! Algo deu errado, tente novamente!";
}

?>