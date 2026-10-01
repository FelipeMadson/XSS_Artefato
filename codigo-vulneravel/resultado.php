<?php

$nome = $_GET["nome"] ?? "";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Resultado</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <main class="container">

        <h1>Resultado da busca</h1>

        <div class="resultado">

            <h2>
                Bem-vindo,
                <?php echo $nome; ?>
            </h2>

        </div>

        <a href="busca.php">
            Voltar
        </a>

    </main>

</body>

</html>