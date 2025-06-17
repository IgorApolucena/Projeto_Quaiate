<?php

include "../config/database.php";

$buscar = "SELECT * FROM usuario";

$resultado = $conn -> query($buscar);

WHILE ($linha = mysqli_fetch_array($resultado)) {

    $id   = $linha  ['id'];
    $nome = $linha  ['nome'];
    $email = $linha ['email'];
    $senha = $linha ['senha'];

    echo "<tr>
            <tr>$id<tr>
    "

}

?>