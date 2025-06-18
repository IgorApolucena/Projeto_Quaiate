<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/logado.css">
        <title>Document</title>
    </head>

    <body>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Senha</th>
                </tr>
            </thead>
            <?php
            include "../config/database.php";

            $buscar = "SELECT * FROM usuarios";

            $resultado = $conn -> query($buscar);

            WHILE ($linha = mysqli_fetch_array($resultado)) {

                $id   = $linha  ['id'];
                $nome = $linha  ['nome'];
                $email = $linha ['email'];
                $senha = $linha ['senha'];

                echo "<tr>
                <td>$id</td>
                <td>$nome</td>
                <td>$email</td>
                <td>$senha</td>
                <td><a href='excluir.php?id=$id'>Excluir</a></td>
                <td><a href='alterar.php?id=$id'>Alterar</a></td>";
            }
            ?>
        </table>
    </body>
</html>