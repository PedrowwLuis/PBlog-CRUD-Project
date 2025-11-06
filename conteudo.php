<main>
    <h2>Últimos Posts</h2>
    <div class="posts">
        <?php
        $sql = "SELECT titulo, conteudo, data_publicacao FROM posts ORDER BY data_publicacao DESC";
        $resultado = $conn->query($sql);
        if ($resultado->num_rows > 0) {
            while($row = $resultado->fetch_assoc()) {
                echo "<div class='post'>";
                echo "<h3>" . htmlspecialchars($row['titulo']) . "</h3>";
                echo "<p>" . nl2br(htmlspecialchars($row['conteudo'])) . "</p>";
                echo "<small>Publicado em: " . date('d/m/Y H:i', strtotime($row['data_publicacao'])) . "</small>";
                echo "</div>";
            }
        } else {
            echo "<p>Nenhum post encontrado.</p>";
        }
        ?>
    </div>
</main>