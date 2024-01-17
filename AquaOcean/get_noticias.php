<?php
require_once "conexao.php";

$conn = new Conexao();
$sql = "SELECT * FROM noticias";
$stmt = $conn->conexao->query($sql);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<a href="' . $row['link'] . '" class="noticia">';
    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagem']) . '" alt="Imagem da notícia" height="180px" width="305px">';
    echo '<div id="infoNoticia">';
    echo '<h1 class="titulonoticia" id="title1">' . $row['titulo'] . '</h1>';
    echo '<p id="paragrafo">' . $row['conteudo'] . '</p>';
    echo '</div>';
    echo '</a>';
}
?>