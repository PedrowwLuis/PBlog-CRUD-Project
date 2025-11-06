<?php
session_start();
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $senha = hash("sha256", $_POST["senha"]);

    $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows === 1) {
        $_SESSION["logado"] = true;
        $_SESSION["email"] = $email;
        header("Location: admin.php");
        exit;
    } else {
        $erro = "Usuário ou senha incorretos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login</title>
<style>
            /* ======== GERAL ======== */
        body {
            font-family: Arial, sans-serif;
            background: #f0f3f8;
            margin: 0;
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
            padding: 0;
        }

        nav a {
            text-decoration: none;
            color: white;
            font-weight: 500;
            transition: 0.3s;
        }

        nav a:hover {
            color: #ffeb3b;
        }

        /* ======== FORMULÁRIO ======== */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 80px); /* altura total menos o header */
        }

        form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        input {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
        }

        button {
            background: #0077ff;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            cursor: pointer;
        }

        button:hover {
            background: #005ecc;
        }
        a{
            text-decoration: none;
        }

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

        <div class="container">
            <form method="post">
                <h2>Login</h2>
                <input type="email" name="email" placeholder="E-mail" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <button type="submit">Entrar</button>
                <p>Não tem conta? <a href="cadastro.php">Cadastre-se Aqui!</a></p>
                <?php if (!empty($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
            </form>
        </div>
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