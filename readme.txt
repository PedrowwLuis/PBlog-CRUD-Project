Descrição

Este projeto é um sistema simples de gerenciamento de posts com login de usuário e painel administrativo. O site permite que usuários se cadastrem, façam login, criem e visualizem posts, enquanto o administrador possui controle total sobre o conteúdo, incluindo a possibilidade de excluir posts já publicados.

O objetivo principal do sistema é demonstrar a integração entre PHP, MySQL e HTML/CSS, fornecendo uma base funcional para sistemas de blogs ou portais de conteúdo.

Funcionalidades
Para qualquer usuário

Cadastro de usuário: Criação de conta com nome, email e senha. As senhas são armazenadas de forma segura utilizando hash.

Login: Acesso ao sistema com validação de email e senha.

Visualização de posts: Após o login, os usuários podem ver todos os posts publicados na página inicial.

Para o administrador

Painel administrativo: Área restrita a usuários logados com funcionalidades de gerenciamento.

Criar novos posts: Inserir título e conteúdo de posts que serão exibidos na página inicial.

Listar posts existentes: Visualizar todos os posts publicados em uma tabela organizada.

Excluir posts: Remover posts específicos diretamente do painel, com confirmação para evitar exclusões acidentais.

Como Utilizar

Configurar o banco de dados MySQL:

Baixe o aqrquivo meubloq.sql e em seguida imoport ele no mysql para criar o banco de dados que sera usado como repositório

Configurar conexao.php:
Atualize as variáveis $servername, $username, $password e $dbname com suas credenciais do MySQL caso queira fazer alguma alteração, se não quiser fazer nenhuma alteração no BD apenas importe o arquivo e deixe tudo como esta.

Acessar o site:

Para registrar um novo usuário, abra a pagina via localhost e entre na index.php e clique em cadastro e preencha todos os campos.

Para entrar no sistema, abra login.php.

Usuários logados podem ver os posts em index.php.

Administradores podem acessar admin.php para criar, listar e excluir posts.

Intuito do Sistema

O sistema foi criado como uma base funcional de gerenciamento de conteúdo. Ele demonstra conceitos fundamentais de desenvolvimento web:

Autenticação de usuários com PHP e sessões.

CRUD básico de posts (Create, Read, Delete).

Integração com MySQL para armazenamento seguro de dados.

Interface simples e responsiva com HTML e CSS.
