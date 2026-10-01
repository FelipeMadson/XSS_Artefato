<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reflected XSS</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <main class="container">

        <h1>Busca de usuário</h1>

        <p>
            Esta página será utilizada para demonstrar
            XSS Refletido.
        </p>

        <form action="resultado.php" method="GET">

            <label for="nome">
                Digite seu nome:
            </label>

            <input
                type="text"
                name="nome"
                id="nome"
                placeholder="Digite seu nome aqui"
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