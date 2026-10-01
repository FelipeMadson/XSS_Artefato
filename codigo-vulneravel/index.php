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

    <title>Aplicação XSS</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <main class="container">

        <h1>Aplicação Web - XSS</h1>

        <p class="descricao">
            Sistema de comentários utilizado para demonstração de
            XSS Refletido e XSS Armazenado.
        </p>

        <div class="acoes">

            <a href="busca.php" class="botao">
                Testar XSS Refletido
            </a>

        </div>

        <section class="comentarios">

            <h2>Comentários</h2>

            <?php if ($resultado && $resultado->num_rows > 0): ?>

                <?php while ($row = $resultado->fetch_assoc()): ?>

                    <article class="comentario">

                        <h3>
                            <?php echo $row["nome"]; ?>
                        </h3>

                        <p>
                            <?php echo $row["texto"]; ?>
                        </p>

                        <small>
                            <?php echo $row["data_criacao"]; ?>
                        </small>

                    </article>

                <?php endwhile; ?>

            <?php else: ?>

                <p>Nenhum comentário encontrado.</p>

            <?php endif; ?>

        </section>

        <section class="novo-comentario">

            <h2>Adicionar comentário</h2>

            <form action="comentario.php" method="POST">

                <label for="usuario">
                    Usuário
                </label>

                <select name="usuario" id="usuario" required>

                    <option value="Maria">
                        Maria
                    </option>

                    <option value="João">
                        João
                    </option>

                    <option value="Admin">
                        Admin
                    </option>

                </select>

                <label for="texto">
                    Comentário
                </label>

                <textarea
                    name="texto"
                    id="texto"
                    rows="5"
                    placeholder="Digite seu comentário..."
                    required
                ></textarea>

                <button type="submit">
                    Enviar comentário
                </button>

            </form>

        </section>

    </main>

</body>

</html>