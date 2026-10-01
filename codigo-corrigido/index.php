<?php

require_once "conexao.php";

$sql = "
    SELECT
        comentarios.id,
        usuarios.nome,
        comentarios.texto,
        comentarios.data_criacao
    FROM comentarios
    INNER JOIN usuarios
        ON comentarios.usuario_id = usuarios.id
    ORDER BY comentarios.id DESC
";

$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Aplicação Web - XSS Corrigido</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <main class="container">

        <h1>Aplicação Web - XSS</h1>

        <p>
            Sistema de comentários com proteção contra XSS.
        </p>

        <a href="busca.php">
            Testar XSS Refletido
        </a>

        <hr>

        <h2>Comentários</h2>

        <?php while ($row = $resultado->fetch_assoc()): ?>

            <article class="comentario">

                <h3>
                    <?= htmlspecialchars(
                        $row["nome"],
                        ENT_QUOTES,
                        "UTF-8"
                    ) ?>
                </h3>

                <p>
                    <?= htmlspecialchars(
                        $row["texto"],
                        ENT_QUOTES,
                        "UTF-8"
                    ) ?>
                </p>

                <small>
                    <?= htmlspecialchars(
                        $row["data_criacao"],
                        ENT_QUOTES,
                        "UTF-8"
                    ) ?>
                </small>

            </article>

        <?php endwhile; ?>

        <hr>

        <h2>Adicionar comentário</h2>

        <form action="comentario.php" method="POST">

            <label for="usuario">
                Usuário
            </label>

            <select name="usuario_id" id="usuario" required>

                <option value="1">Maria</option>
                <option value="2">João</option>
                <option value="3">Admin</option>

            </select>

            <br><br>

            <label for="comentario">
                Comentário
            </label>

            <br>

            <textarea
                name="comentario"
                id="comentario"
                rows="5"
                required
            ></textarea>

            <br><br>

            <button type="submit">
                Enviar comentário
            </button>

        </form>

    </main>

</body>

</html>