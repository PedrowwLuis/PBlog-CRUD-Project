<?php
session_start();
if (!isset($_SESSION["logado"])) {
    header("Location: login.php");
    exit;
}

include("conexao.php");

$titulo = $_POST["titulo"];
$conteudo = $_POST["conteudo"];

$sql = "INSERT INTO posts (titulo, conteudo) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $titulo, $conteudo);

if ($stmt->execute()) {
    header("Location: admin.php?sucesso=1");
} else {
    echo "Erro ao salvar o post.";
}

$stmt->close();
$conn->close();
?>
