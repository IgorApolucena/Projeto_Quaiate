<?php
include "../config/database.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$verificar = "SELECT * FROM usuarios WHERE '$email' = email AND '$senha' = senha";
$resultado = $conn->query($verificar);

while ($linha = mysqli_fetch_array($resultado)){
    $tipo = $linha['tipo'];
    $nome = $linha['nome'];
}

if ($resultado->num_rows > 0 and $tipo == 2) {
    $_SESSION['tipo_session'] = $tipo;
    $_SESSION['nome_session'] = $nome;

    // header('Location: dashboard.php');
    header("Refresh: 2; url=../html/dashboard.html");
}elseif ($resultado->num_rows > 0 and $tipo == 1){
    echo "Sessão Admin logada com sucesso!";
    header("Refresh: 2; url=logado.php");
}else{
    echo"Ops! Algo deu errado, tente novamente!";
    header("Refresh: 2; url=../html/login.html");
}

?>