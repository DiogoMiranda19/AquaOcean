
<?php
    if (isset($_POST["botaoContato"])) {
        require_once "conexao.php";

        // Recupere os dados do formulário
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["telefone"]);

        if (empty($nome) || empty($email) || empty($senha)) {
            echo "Por favor, preencha todos os campos.";
        } else {
            $conn = new Conexao();

            $sql = "INSERT INTO contato (nome, email, telefone) VALUES (?, ?, ?)";
            $stmt = $conn->conexao->prepare($sql);
            $stmt->bindParam(1, $nome);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $senha);

            if ($stmt->execute()) {
                echo "Contato realizado!";
            } else {
                echo "Erro ao realizar contato.";
            }
        }
    }
    ?>

<!doctype html>
<html lang="pt-br">

<head>
    <title>Contato</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="javascript/script.js"></script>
    <link rel="shortcut icon" type="image/png" href="imagem/favicon.png"/>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body id="bodyContato">
    <div class="box">
        <header id="headerContato">
            <div class="row">
                <div id="divHeader" class="col-7" style="margin: auto;"><a href="index.php"><img
                            src="imagem/aquasemfundo.png" alt="" id="imgAqua" class="img-fluid"></a></div>
                <div id="divHeader" class="col-1" style="margin: auto;"><a href="atividades.php" id="text"
                        href="#"><span>Atividades</span></a></div>
                <div id="divHeader" class="col-1" style="margin: auto;"><a href="sobre.html" id="text"
                        href="#"><span>Sobre</span></a></div>
                <div id="divHeader" class="col-1" style="margin: auto;"><a href="contato2.php" id="text"
                        href="#"><span>Contato</span></a></div>
                <div id="divHeader" class="col-2" style="margin: auto;"><a href="login.php" id="text" href="#"><span>
                            <div class="login">Login</div>
                        </span></a></div>
            </div>
        </header>
    </div>

    <div id="divpraia">
        <img src="imagem/imagempraia.svg" id="imgpraiaContato">
    </div>

    <hr id="linha">
    <br>

    <main id="mainContato">

        <div class="containerContato">
            <div class="col-md-10">
                <div id="divtitulocontato">
                    <p id="tituloContato">CONTATO</p>
                    <p id="textoContato">- Preencha o formulario para entrar em contato com a nossa equipe!</p>
                </div>
                <form action="" method="post">
                <div id="containerContato">
                    <div class="mb-3">
                        <div class="form-floating mb-3" id="redimensionando">
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="">
                            <label id="labels">Digite seu Nome</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating mb-3" id="redimensionando">
                            <input type="email" class="form-control" id="email" name="email" placeholder="">
                            <label  id="labels">Digite seu Email</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating mb-3" id="redimensionando">
                            <input type="text" class="form-control" id="telefone" name="telefone"placeholder="">
                            <label id="labels">Digite seu Telefone</label>
                        </div>
                    </div>
                    <div id="divbotaoContato">
                        <button name="botaoContato" type="submit "id="botaoContato" class="btn btn-primary botaoHover" onclick="contato()">Enviar</button>
                    </div>
                </div>
                </form>
            </div>
        </div>





        <div class="alert alert-danger" role="alert" id="alertaEmail" style="display: none;">
            Prencha o campo E-mail!!!
        </div>

        <div class="alert alert-danger" role="alert" id="alertaNome" style="display: none;">
            Prencha o campo Nome!!!
        </div>

        <div class="alert alert-danger" role="alert" id="alertaTelefone" style="display: none;">
            Prencha o campo Telefone!!!
        </div>

        <div class="alert alert-danger" role="alert" id="alertaAmbos" style="display: none;">
            Prencha todos os Campos!!!
        </div>




    </main>

    <footer id="footerContato" class="fixed-bottom">
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
</body>

</html>