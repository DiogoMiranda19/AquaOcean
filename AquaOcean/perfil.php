<!doctype html>
<html lang="pt-br">

<head>
    <title>Perfil</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel=stylesheet href="css/style.css">
    <script type="text/javascript" src="javascript/script.js"></script>
    <link rel="shortcut icon" type="image/png" href="imagem/favicon.png" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<?php
session_start();

if (isset($_SESSION["login"]) && $_SESSION["login"] === "1" && isset($_SESSION["email"])) {
    $emailUsuario = $_SESSION["email"];

    require_once "conexao.php";

    $conn = new Conexao();

    if (isset($_POST['operacao']) && $_POST['operacao'] === 'trocarFoto') {
        // Processa a nova imagem
        if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] == 0) {
            $imagem_temp = $_FILES["imagem"]["tmp_name"];
            $imagem_binario = file_get_contents($imagem_temp);

            $sqlUpdate = "UPDATE usuario SET imagem = ? WHERE email = ?";
            $stmtUpdate = $conn->conexao->prepare($sqlUpdate);
            $stmtUpdate->bindParam(1, $imagem_binario, PDO::PARAM_LOB);
            $stmtUpdate->bindParam(2, $emailUsuario);

            if ($stmtUpdate->execute()) {

                $imagem = base64_encode($imagem_binario);
                echo $imagem;
                exit();
            } else {

                echo "Erro ao atualizar a imagem no banco de dados.";
                exit();
            }
        }
    }

    $sql = "SELECT email, nome, imagem FROM usuario WHERE email = ?";
    $stmt = $conn->conexao->prepare($sql);
    $stmt->bindParam(1, $emailUsuario);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $emailUsuario = $result['email'];
        $nomeUsuario = $result['nome'];
        $imagem = base64_encode($result['imagem']);
    }
}
?>

<?php

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<?php

require_once("conexao.php");


if (isset($_POST['excluir'])) {
    $nomeUsuario = isset($_SESSION['email']) ? $_SESSION['email'] : null;

    if ($nomeUsuario) {
        try {
            $conexao = new Conexao();
            $conn = $conexao->conexao;

            if ($conn) {
                $sql = "DELETE FROM usuario WHERE email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$nomeUsuario]);
                session_destroy();

                header("Location: login.php");
                exit();
            } else {
                echo "Erro na conexão com o banco de dados.";
            }
        } catch (PDOException $e) {
            echo "Erro ao excluir a conta: " . $e->getMessage();
        }
    }
}
?>




<body>

    <body id="bodyPerfil">
        <div class="box">
            <header id="headerIndex">
                <div class="row">
                    <div id="divHeader" class="col-7" style="margin: auto;"><a href="index2.php"><img src="imagem/aquasemfundo.png" alt="" id="imgAqua" class="img-fluid"></a></div>
                    <div id="divHeader" class="col-1 linkatividade" style="margin: auto;"><a href="atividades.php" id="text" href="#"><span>Atividades</span></a></div>
                    <div id="divHeader" class="col-1" style="margin: auto;"><a href="sobre2.html" id="text" href="#"><span>Sobre</span></a></div>
                    <div id="divHeader" class="col-1" style="margin: auto;"><a href="contato2.php" id="text" href="#"><span>Contato</span></a></div>
                    <div id="divHeader" class="col-2" style="margin: auto;"><a href="perfil.php" id="text" href="#"><span>
                                <div class="login">Perfil</div>
                            </span></a></div>
                </div>
            </header>
        </div>

        <div id="perfil">
            <p id="textoPerfil"> <span class="blue">|</span> PERFIL
            </p>
        </div>

        <div id="divpraia">
            <img src="imagem/imagempraia.svg" id="imgpraiaperfil">
        </div>

        <hr id="linha">
        <br>

        <main id="mainPerfil">

            <div id="cardsPerfil">
                <div class="card2Perfil">
                    <div class="infoPerfil">
                        <div id="fotoPerfil">
                            <img src="data:image/jpeg;base64,<?php echo $imagem; ?>" alt="Foto do Perfil" id="fotoDiogoPerfil">



                            <div class="mb-3" id="escolherFoto">
                                <button type="button" id="inputEscolher" class="btn btn-primary">Trocar Foto</button>
                                <input type="file" name="imagem" id="imagem" style="display: none;">
                            </div>

                        </div>
                        <div id="informacaoPerfil">
                            <?php if (isset($nomeUsuario)) : ?>
                                <h2 id="nomeDiogo">
                                    <?php echo $nomeUsuario; ?>
                                </h2>
                            <?php endif; ?>
                            <h4 id="webDev">Usuário AquaTech</h4>
                        </div>
                    </div>


                    <div class="botoesPerfil">

                        <form action="" method="post">
                            <button type="submit" name="logout" id="logout" class="btn btn-primary">Logout</button>
                        </form>

                        <div id="divNoticia" style="<?php echo ($emailUsuario === 'admin@gmail.com') ? 'display:block;' : 'display:none;'; ?>">
                            <p id="paragrafoBotaoNoticia"> Se deseja criar uma nova notícia, clique no botão ao lado</p>
                            <a href="criarNoticia.php"><button class="btn btn-primary">Cadastrar Notícia</button></a>
                        </div>

                        <form action="" method="post">
                            <div id="divExcluir">
                                <p id="paragrafoBotaoExcluir"> Se deseja excluir sua conta, clique no botão abaixo</p>
                                <a href="index.php" id="linkExcluir"><button type="submit" name="excluir" id="excluir" class="btn btn-primary">Excluir conta</button></a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </main>

        <footer id="footerPerfil">
            <div class="text-center" id="divfooter">
                Aqua Technology Ltda. © 2023 - All Rights Reserved. ©
            </div>
        </footer>


        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
        <script>
            document.getElementById('inputEscolher').addEventListener('click', function() {
                document.getElementById('imagem').click();
            });

            document.getElementById('imagem').addEventListener('change', function() {
                var formData = new FormData();
                formData.append('operacao', 'trocarFoto');
                formData.append('imagem', this.files[0]);

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'perfil.php', true);

                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            var fotoPerfil = document.getElementById('fotoDiogoPerfil');
                            fotoPerfil.src = "data:image/jpeg;base64," + xhr.responseText;
                            location.reload();
                        } else {
                            console.error('Erro na requisição AJAX:', xhr.status, xhr.statusText);
                        }
                    }
                };

                xhr.send(formData);
            });
        </script>
    </body>

</html>