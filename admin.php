<?php
session_start();
if (!isset($_SESSION["logado"])) {
    header("Location: login.php");
    exit;
}
include("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Painel Admin</title>
<style>
    /* ======== GERAL ======== */
body { font-family: Arial, sans-serif; background: #eef3f8; margin: 0; }


    /* ======== TOPO ======== */   
header {
            background: linear-gradient(90deg, #0077ff, #00d4ff);
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 50px;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

/* ======== FORMULÁRIO ======== */
main { padding: 40px; }    
form {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    width: 60%;
    margin: 0 auto 50px auto;
}
input, textarea, button {
    width: 100%;
    margin: 10px 0;
    padding: 10px;
}
button {
    background: #0077ff;
    border: none;
    color: white;
    cursor: pointer;
    font-weight: bold;
    border-radius: 5px;
}
button:hover { background: #005fd4; }

    /* ======== POSTS ======== */
table {
    width: 90%;
    margin: 0 auto;
    border-collapse: collapse;
    background: white;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
    border-radius: 8px;
    overflow: hidden;
}
    /* ======== GERENCIAMENTO DOS POSTS ======== */

th, td {
    padding: 12px 15px;
    border-bottom: 1px solid #ddd;
    text-align: left;
}
th { background: #0077ff; color: white; }
tr:hover { background: #f5faff; }
.delete-btn {
    background: #ff3b3b;
    color: white;
    border: none;
    padding: 6px 12px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
}
.delete-btn:hover {
    background: #d92626;
}

.success { color: green; text-align: center; }
.error { color: red; text-align: center; }

/* ======== RODAPÉ ======== */
footer {
            background: #111;
            color: #ccc;
            text-align: center;
            padding: 25px;
            margin-top: 50px;
        }
</style>
</head>
<body>
<header>
    <h2>PBlog Admin Posts</h2>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </nav>
</header>

<main>
    <form action="cadastrar_post.php" method="post">
        <h3>Novo Post</h3>
        <input type="text" name="titulo" placeholder="Título do post" required>
        <textarea name="conteudo" placeholder="Conteúdo do post" rows="8" required></textarea>
        <button type="submit">Publicar</button>
    </form>

    <h3 style="text-align:center;">Posts Cadastrados</h3>

    <?php
    // Mostra mensagem de sucesso, se houver
    if (isset($_GET['sucesso'])) echo "<p class='success'>Post cadastrado com sucesso!</p>";
    if (isset($_GET['excluido'])) echo "<p class='success'>Post excluído com sucesso!</p>";
    if (isset($_GET['erro'])) echo "<p class='error'>Erro ao excluir o post!</p>";

    // Busca os posts
    $sql = "SELECT id, titulo, data_publicacao FROM posts ORDER BY data_publicacao DESC";
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Título</th><th>Data</th><th>Ações</th></tr>";
        while ($row = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . htmlspecialchars($row['titulo']) . "</td>";
            echo "<td>" . date('d/m/Y H:i', strtotime($row['data_publicacao'])) . "</td>";
            echo "<td>
            <form action='excluir_post.php' method='post' style='display:inline; margin:0; padding:0;'>
                <input type='hidden' name='id' value='" . $row['id'] . "'>
                <button type='submit' class='delete-btn' onclick='return confirm(\"Tem certeza que deseja excluir este post?\")'>Excluir</button>
            </form>
        </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align:center;'>Nenhum post encontrado.</p>";
    }

    $conn->close();
    ?>
</main>
       <footer>
        <p>&copy; 2025 Meu Site. Todos os direitos reservados.</p>
        <p>
            <a href="#">Política de Privacidade</a> |
            <a href="#">Termos de Uso</a> |
            <a href="#">Contato</a>
        </p>
    </footer>

</body>
</html>
