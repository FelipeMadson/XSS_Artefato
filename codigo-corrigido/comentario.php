<?php

require_once "conexao.php";

$usuario_id = $_POST["usuario_id"] ?? "";
$comentario = $_POST["comentario"] ?? "";

if ($usuario_id === "" || $comentario === "") {
    die("Preencha todos os campos.");
}

$sql = "
    INSERT INTO comentarios
    (usuario_id, texto)
    VALUES (?, ?)
";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "is",
    $usuario_id,
    $comentario
);

if ($stmt->execute()) {

    header("Location: index.php");
    exit;

} else {

    echo "Erro ao salvar comentário.";

}

$stmt->close();

$conn->close();

?>