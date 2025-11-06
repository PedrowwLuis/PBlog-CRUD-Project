<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $senha = $_POST["senha"];
    $confirmar = $_POST["confirmar"];

    // Verifica se as senhas são iguais
    if ($senha !== $confirmar) {
        $erro = "As senhas não coincidem!";
    } else {
        // Verifica se o e-mail já existe
        $sql = "SELECT id FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $erro = "Esse e-mail já está cadastrado!";
        } else {
            // Criptografa a senha
            $senha_hash = hash("sha256", $senha);

            $sql_insert = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("sss", $nome, $email, $senha_hash);

            if ($stmt_insert->execute()) {
                $sucesso = "Usuário cadastrado com sucesso! <a href='login.php'>Fazer login</a>";
            } else {
                $erro = "Erro ao cadastrar. Tente novamente.";
            }

            $stmt_insert->close();
        }

        $stmt->close();
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Cadastrar Usuário</title>
<style>
/* ======== GERAL ======== */
body {
    font-family: Arial, sans-serif;
    background: #eef3f8;
    margin: 0;
    padding: 0;
}

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
    gap: 25px;
    margin: 0;
}

nav a {
    color: white;
    text-decoration: none;
    font-weight: 500;
    transition: 0.3s;
}

nav a:hover {
    color: #ffeb3b;
}

/* ======== FORMULÁRIO ======== */
main {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 60px 0;
    min-height: calc(100vh - 100px);
}

form {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    width: 350px;
}

input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
}

button {
    width: 100%;
    padding: 10px;
    background: #0077ff;
    border: none;
    color: white;
    cursor: pointer;
    border-radius: 5px;
    font-weight: 600;
}

button:hover {
    background: #005fd4;
}

h2 { text-align: center; margin-bottom: 10px; }
p { text-align: center; }
a { color: #0077ff; text-decoration: none; }
a:hover { text-decoration: underline; }

.mensagem {
    text-align: center;
    padding: 10px;
    margin-top: 10px;
}
.sucesso { color: green; }
.erro { color: red; }

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
            <h1>PBlog</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="cadastro.php">Cadastro</a></li>
                </ul>
            </nav>
    </header>

    <main>
        <form method="post">
            <h2>Cadastrar Usuário</h2>
            <input type="text" name="nome" placeholder="Nome completo" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <input type="password" name="confirmar" placeholder="Confirmar senha" required>
            <button type="submit">Cadastrar</button>

            <?php 
            if (!empty($erro)) echo "<div class='mensagem erro'>$erro</div>"; 
            if (!empty($sucesso)) echo "<div class='mensagem sucesso'>$sucesso</div>"; 
            ?>

            <p>Já tem conta? <a href="login.php">Fazer login</a></p>
        </form>
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
