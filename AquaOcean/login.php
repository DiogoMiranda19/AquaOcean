<?php
session_start();
if (isset($_POST["email"]) && isset($_POST["senha"])) {
    require_once "conexao.php";
    require_once "UsuarioEntidade.php";

    $conn = new Conexao();

    $sql = "SELECT * FROM usuario WHERE email = ? and senha = ?";
    $stmt = $conn->conexao->prepare($sql);

    $stmt->bindParam(1, $_POST["email"]);
    $hashedPassword = md5($_POST["senha"]);
    $stmt->bindParam(2, $hashedPassword);

    $resultado = $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $usuario = new UsuarioEntidade();

        while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
            $usuario->setNome($rs->nome);
            $usuario->setEmail($rs->email);
        }

        $_SESSION["login"] = "1";
        $_SESSION["email"] = $usuario->getEmail();

        if ($usuario->getEmail() == 'admin@gmail.com') {
            header("Location: criarNoticia.php");
        } else {
            header("Location: index2.php");
        }

    } else {
        echo "Usuário ou senha inválidos";
    }
}
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Login</title>
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

<body id="bodyLogin">
    <div class="box">
        <header id="headerLogin">
            <div class="row">
                <div id="divHeader" class="col-7" style="margin: auto;"><a href="index.php"><img
                            src="imagem/aquasemfundo.png" alt="" id="imgAqua"></a></div>
                <div id="divHeader" class="col-1" style="margin: auto;"><a href="index.php" id="text"
                        href="#"><span>Início</span></a>
                </div>
                <div id="divHeader" class="col-1" style="margin: auto;"><a href="sobre.html" id="text"
                        href="#"><span>Sobre</span></a>
                </div>
                <div id="divHeader" class="col-1" style="margin: auto;"><a href="contato.php" id="text" href="#"><span
                            id="Contato">Contato</span></a></div>
                <div id="divHeader" class="col-2" style="margin: auto;"><a href="login.php" id="text" href="#"><span>
                            <div class="login">Login</div>
                        </span></a></div>
            </div>
        </header>
    </div>

    <div id="divpraia">
        <img src="imagem/imagempraia.svg" id="imgpraialogin">
    </div>

    <hr id="linha">
    <br>

    <main id="mainLogin">

        <br>


        <div class="containerLogin" action="" method="POST">
            <div class="logincont">
                <div class="col-md-9">
                    <p id="txtlogin">LOGIN</p>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <div class="form-floating mb-3" id="inputLogin">
                                <input type="email" class="form-control" id="email" name="email" placeholder="">
                                <label id="labels">Digite seu Email</label>
                            </div>

                        </div>
                        <div class="mb-3">
                            <div class="form-floating mb-3" id="inputLogin">
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="">
                                <label id="labels">Digite sua Senha</label>
                            </div>
                        </div>
                        <div class="classeLogar">
                            <button id="logar" class="btn btn-primary botaoHover" onclick="login()">Logar</button>
                        </div>
                        <div class="classeCadastrar">
                            <p id="cadastreAqui">Caso não tenha cadastro, cadastre-se aqui!</p>
                            <a href="cadastro.php"><input type="button" value="Cadastrar"
                                    class="btn btn-primary botaoHover" id="cadastro"></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="alert alert-danger" role="alert" id="alertaEmail" style="display: none;">
            Prencha o campo E-mail!!!
        </div>

        <div class="alert alert-danger" role="alert" id="alertaSenha" style="display: none;">
            Prencha o campo Senha!!!
        </div>

        <div class="alert alert-danger" role="alert" id="alertaAmbos" style="display: none;">
            Prencha todos os Campos!!!
        </div>
        <footer id="footerCadastro" class="fixed-bottom">
            <div class="text-center">
                Aqua Technology Ltda. © 2023 - All Rights Reserved. ©
            </div>
        </footer>


    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>


</body>

</html>