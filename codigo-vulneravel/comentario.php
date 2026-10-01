<?php

require_once "conexao.php";

$usuario = $_POST["usuario"] ?? "";
$texto = $_POST["texto"] ?? "";

if ($usuario === "" || $texto === "") {
    die("Preencha todos os campos.");
}

$sqlUsuario = "
    SELECT id
    FROM usuarios
    WHERE nome = ?
    LIMIT 1
";

$stmtUsuario = $conn->prepare($sqlUsuario);

$stmtUsuario->bind_param("s", $usuario);

$stmtUsuario->execute();

$resultadoUsuario = $stmtUsuario->get_result();

if ($resultadoUsuario->num_rows === 0) {
    die("Usuário não encontrado.");
}

$dadosUsuario = $resultadoUsuario->fetch_assoc();

$usuarioId = $dadosUsuario["id"];

$sql = "
    INSERT INTO comentarios
    (usuario_id, texto)
    VALUES (?, ?)
";

$stmt = $conn->prepare($sql);

$stmt->bind_param("is", $usuarioId, $texto);

$stmt->execute();

$stmt->close();
$stmtUsuario->close();
$conn->close();

header("Location: index.php");

exit;

?>