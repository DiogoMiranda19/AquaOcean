<?php

require_once "conexao.php";
$conn = new Conexao();
$sql = "SELECT * FROM noticias";
$stmt = $conn->conexao->query($sql);


?>

<!doctype html>
<html lang="pt-br">

<head>
    <title>AquaTechnology</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="javascript/script.js"></script>
    <link rel="shortcut icon" type="image/png" href="imagem/favicon.png" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">




</head>

<body id="bodyIndex">
    <div id="sair">
        <div>
            <p>Aqua é um site que fornece informações sobre a conservação e o uso sustentável dos oceanos, dos mares e
                dos recursos marinhos. Nosso objetivo é conscientizar as pessoas sobre a importância da preservação dos
                oceanos.</p>
            <label>Clique abaixo para ver o site</label><br>
            <input type="button" value="Clique aqui" onclick="revelar()">
        </div>
    </div>
    <div id="site">
        <div class="box">
            <header id="headerIndex">
                <div class="row">
                    <div id="divHeader" class="col-7" style="margin: auto;"><a href="index.php"><img
                                src="imagem/aquasemfundo.png" alt="" id="imgAqua" class="img-fluid"></a></div>
                    <div id="divHeader" class="col-1" style="margin: auto;"><a href="index.php" id="text"
                            href="#"><span>Início</span></a></div>
                    <div id="divHeader" class="col-1" style="margin: auto;"><a href="sobre.html" id="text"
                            href="#"><span>Sobre</span></a></div>
                    <div id="divHeader" class="col-1" style="margin: auto;"><a href="contato.php" id="text"
                            href="#"><span>Contato</span></a></div>
                    <div id="divHeader" class="col-2" style="margin: auto;"><a href="login.php" id="text"
                            href="#"><span>


                                <div class="login">Login</div>
                            </span></a></div>
                </div>
            </header>
        </div>
        <div id="divpraia">
            <img src="imagem/imagempraia.svg" id="imgpraiaIndex">
        </div>

        <hr id="linha">
        <br>
        <div id="divi">
            <main id="mainIndex">
                <br>

                <div class="containerConsulta">
                    <div class="form-floating" id="formIndex">
                        <input type="text" id="consulta" class="form-control" placeholder="">
                        <label id="labelConsulta">Digite aqui o que deseja pesquisar</label>
                    </div>
                    <div class="divbotaoConsulta">
                        <button id="botaoConsulta" class="btn btn-primary botaoHover"
                            onclick="pesquisar()">Pesquisar</button>
                    </div>
                </div>

                <div class="containerIndex">
                    <div id="title">
                        <h1 id="tituloIndex" class="news"><span class="blue">|</span> Newsletter</h1>
                    </div>
                    <h6 class="h6"> - Acompanhe as principais notícias sobre a preservação dos oceanos!</h6>
                    <br>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <a id="click" href="<?php echo $row['link']; ?>">
                            <div class="noticia">
                                <img id="imgnoticia"
                                    src="data:image/jpeg;base64,<?php echo base64_encode($row['imagem']); ?>"
                                    alt="Imagem da notícia" height="180px" width="305px">

                                <div id="infoNoticia">
                                    <h1 class="titulonoticia" id="title1">
                                        <?php echo $row['titulo']; ?>
                                    </h1>
                                    <p id="paragrafo">
                                        <?php echo $row['conteudo']; ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>


            </main>
        </div>

        <footer id="footerIndex" class="fixed-bottom">
            <div class="text-center">
                Aqua Technology Ltda. © 2023 - All Rights Reserved. ©
            </div>
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
            </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
            integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
            </script>
    </div>
</body>


</html>