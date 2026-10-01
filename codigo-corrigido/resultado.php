<?php

$nome = $_GET["nome"] ?? "";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Resultado - XSS Corrigido</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <main class="container">

        <h1>Resultado da busca</h1>

        <h2>
            Bem-vindo,
            <?= htmlspecialchars(
                $nome,
                ENT_QUOTES,
                "UTF-8"
            ) ?>
        </h2>

        <br>

        <a href="busca.php">
            Nova busca
        </a>

        <br><br>

        <a href="index.php">
            Voltar para comentários
        </a>

    </main>

</body>

</html>