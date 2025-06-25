<?php

include "../config/database.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$tipo = 2;

/* Cria uma consulta no banco de dados para verificar o email digitado com o email do banco de dados */
$emailbd = $conn->query("SELECT * FROM usuarios WHERE email = '$email'");


/* Verifica se o usuário digitado existe no banco de dados. Caso exista, o usuário novo não é cadastrado. */
if ($emailbd->num_rows > 0){
    echo "Usuário já existente!";
    header("Refresh: 3; url=../criar.html");
}else{
    $conn->query("INSERT INTO usuarios (id, nome, email, senha, tipo) VALUES (NULL, '$nome', '$email', '$senha', '$tipo')");
    echo "Dados Salvos!";
    header("Refresh: 3; url=../html/login.html");
}

?>