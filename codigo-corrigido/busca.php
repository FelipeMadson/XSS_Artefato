<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Busca - XSS Corrigido</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <main class="container">

        <h1>Buscar usuário</h1>

        <form action="resultado.php" method="GET">

            <label for="nome">
                Nome:
            </label>

            <input
                type="text"
                id="nome"
                name="nome"
                required
            >

            <button type="submit">
                Buscar
            </button>

        </form>

        <br>

        <a href="index.php">
            Voltar
        </a>

    </main>

</body>

</html>