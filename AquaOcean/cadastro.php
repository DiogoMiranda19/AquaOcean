<?php
session_start();

if (isset($_POST["cadastrar"])) {
    require_once "conexao.php";

    $nomeUsuario = $_POST["nome"];
    $emailUsuario = $_POST["email"];
    $senhaUsuario = $_POST["senha"];

    if (empty($nomeUsuario) || empty($emailUsuario) || empty($senhaUsuario)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] == 0) {
            $imagem_temp = $_FILES["imagem"]["tmp_name"];
            $imagem_binario = file_get_contents($imagem_temp);

            $conn = new Conexao();
            $sql = "INSERT INTO usuario (nome, email, senha, imagem) VALUES (?, ?, ?, ?)";
            $stmt = $conn->conexao->prepare($sql);
            $stmt->bindParam(1, $nomeUsuario);
            $stmt->bindParam(2, $emailUsuario);

            $senha_md5 = md5($senhaUsuario);
            $stmt->bindParam(3, $senha_md5);
            
            $stmt->bindParam(4, $imagem_binario, PDO::PARAM_LOB);

            if ($stmt->execute()) {
                echo "Usuário cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar o usuário. Por favor, tente novamente.";
            }
        } else {
            echo "Por favor, escolha uma imagem.";
        }
    }
}
?>

<!doctype html>
<html lang="pt-br">

<head>
    <title>Cadastro</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="javascript/script.js"></script>
    <link rel="shortcut icon" type="image/png" href="imagem/favicon.png" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        

</head>

<body id="bodyCadastro">

    <div class="box">
        <header id="headerCadastro">
            <div class="row">
                <div id="divHeader" class="col-7" style="margin: auto;"><a href="index.php"><img
                            src="imagem/aquasemfundo.png" alt="" id="imgAqua"></a></div>
                <div id="divHeader" class="col-1" style="margin: auto;"><a href="index.php" id="text"
                        href="#"><span>Início</span></a>
                </div>
                <div id="divHeader" class="col-1" style="margin: auto;"><a href="sobre.html" id="text"
                        href="#"><span>Sobre</span></a>
                </div>
                <div id="divHeader" class="col-1" style="margin: auto;"><a href="contato.php" id="text"
                        href="#"><span>Contato</span></a></div>
                <div id="divHeader" class="col-2" style="margin: auto;"><a href="login.php" id="text" href="#"><span>
                            <div class="login">Login</div>
                        </span></a></div>
            </div>
        </header>
    </div>

    <div id="divpraia">
        <img src="imagem/imagempraia.svg" id="imgpraiaCadastro">
    </div>

    <hr id="linha">
    <br>

    <main id="mainCadastro">

        <br>
        <div class="containerCadastro">
            <div class="col-md-10">
                <div id="divtitulocadastro">
                    <p id="tituloCadastro">CADASTRO</p>
                </div>

                <form id="cadastroForm" action="" method="POST" enctype="multipart/form-data">

<div class="mb-3">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nome" name="nome" placeholder="">
        <label id="labels">Digite seu nome</label>
    </div>
</div>
<div class="mb-3">
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="email" name="email" placeholder="">
        <label id="labels">Digite seu email</label>
    </div>
</div>
<div class="mb-3">
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="senha" name="senha" placeholder="">
        <label id="labels">Digite sua senha</label>
    </div>
</div>
<div class="mb-3">
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="confirmacaoSenha" name="confirmacaodeSenha" placeholder="">
        <label id="labels">Confirme a senha</label>
    </div>
</div>
<div class="mb-3" id="escolherFoto">
    <button type="button" id="trocarFotoBtn" class="btn btn-primary" onclick="document.getElementById('imagem').click();">Adicionar Foto</button>
    <input type="file" name="imagem" id="imagem" style="display: none;">
</div>
<input type="submit" onclick="submitForm(); cadastrar();;" value="Cadastrar" name="cadastrar">
</form>

            </div>
        </div>



        <div class="alert alert-danger" role="alert" id="alertaNome" style="display: none;">
            Prencha o campo E-mail!!!
        </div>

        <div class="alert alert-danger" role="alert" id="alertaEmail" style="display: none;">
            Prencha o campo Nome!!!
        </div>

        <div class="alert alert-danger" role="alert" id="alertaSenha" style="display: none;">
            Prencha o campo Senha!!!
        </div>

        <div class="alert alert-danger" role="alert" id="alertaAmbos" style="display: none;">
            Prencha todos os Campos!!!
        </div>


    </main>

    <footer id="footerCadastro" class="fixed-bottom">
        <div class="text-center">
            Aqua Technology Ltda. © 2023 - All Rights Reserved.
        </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>

<script>
function submitForm() {
    var formData = new FormData(document.getElementById('cadastroForm'));
    
    // Log FormData content
    for (var pair of formData.entries()) {
        console.log(pair[0] + ', ' + pair[1]);
    }

    $.ajax({
        url: 'cadastro.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function () {
            alert('Cadastrado!');
        },
        error: function () {
            alert('Erro');
        }
    });
}

</script>


</body>

</html>