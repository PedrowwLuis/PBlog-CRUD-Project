<?php include("conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Site Bonito</title>
    <style>
        /* ======== GERAL ======== */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f6f9;
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
            gap: 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }
    /* ======== CONTEUDOS ======== */
        main {
            padding: 50px;
        }

        .posts {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .post {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            padding: 20px;
            transition: transform 0.2s ease;
        }

        .post:hover {
            transform: translateY(-5px);
        }

        .post h3 {
            color: #0077ff;
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
    