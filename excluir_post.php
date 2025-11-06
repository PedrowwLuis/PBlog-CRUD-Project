<?php
session_start();
if (!isset($_SESSION["logado"])) {
    header("Location: login.php");
    exit;
}
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    $id = intval($_POST["id"]);

    $sql = "DELETE FROM posts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: admin.php?excluido=1");
    } else {
        header("Location: admin.php?erro=1");
    }

    $stmt->close();
    $conn->close();
    exit;
} else {
    header("Location: admin.php");
    exit;
}
?>
