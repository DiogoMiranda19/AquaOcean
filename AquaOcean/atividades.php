<?php
session_start();

require_once("conexao.php"); 

if (isset($_SESSION["login"]) && $_SESSION["login"] === "1" && isset($_SESSION["email"])) {
    $nomeUsuario = $_SESSION["email"];

    if (isset($_POST['pontuacao'])) {
        $pontuacao = filter_var($_POST['pontuacao'], FILTER_SANITIZE_NUMBER_INT);

        try {
            // Insere a pontuação no banco de dados
            $sql = "INSERT INTO tabela_pontuacoes (email, pontuacao) VALUES (?, ?)";
            $stmt = $conn->conexao->prepare($sql);
            $stmt->execute([$nomeUsuario, $pontuacao]);

            echo "Pontuação salva com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao salvar a pontuação: " . $e->getMessage();
        }
    }
}

                    
                    ?>

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>



<body>

    <body id="bodyPerfil">
        <div class="box">
            <header id="headerPerfil">
                <div class="row" id="existeno">
                    <div id="divHeader" class="col-7" style="margin: auto;"><a href="index2.php"><img
                                src="imagem/aquasemfundo.png" alt="" id="imgAqua"></a></div>
                    <div id="divHeader" class="col-1" style="margin: auto;"><a href="index2.php" id="text"
                            href="#"><span id="spanInicio">Início</span></a>
                    </div>
                    <div id="divHeader" class="col-1" style="margin: auto;"><a href="sobre2.html" id="text"
                            href="#"><span id="spanSobre">Sobre</span></a>
                    </div>
                    <div id="divHeader" class="col-1" style="margin: auto;"><a href="contato2.php" id="text"
                            href="#"><span id="Contato">Contato</span></a></div>
                    <div id="divHeader" class="col-2" style="margin: auto;"><a href="perfil.php" id="text"
                            href="#"><span>
                                <div class="login">Perfil</div>
                            </span></a></div>

                </div>
            </header>
        </div>

        <div id="perfil">
            <p id="textoPerfil"> <span class="blue">|</span> ATIVIDADES
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
                <form id="quizForm" method="POST" action="perfil.php" name="pontuacao">
                    <div id="question-container">
                        <h2 style="color: white;">Pergunta 1: Qual é a maior ameaça aos oceanos?</h2>
                        <label style="color: white;">
                            <input type="radio" name="resposta1" value="poluicao"> Poluição
                        </label>
                        <label style="color: white;">
                            <input type="radio" name="resposta1" value="pesca"> Pesca excessiva
                        </label>
                        <label style="color: white;">
                            <input type="radio" name="resposta1" value="aquecimento"> Aquecimento global
                        </label>
                    
                        <br><br>
                    
                        <h2 style="color: white;">Pergunta 2: Quanto da superfície da Terra é coberto pelos oceanos?</h2>
                        <label style="color: white;">
                            <input type="radio" name="resposta2" value="25"> 25%
                        </label>
                        <label style="color: white;">
                            <input type="radio" name="resposta2" value="50"> 50%
                        </label>
                        <label style="color: white;">
                            <input type="radio" name="resposta2" value="70"> 70%
                        </label>
                    
                        <br><br>
                    
                        <h2 style="color: white;">Pergunta 3: Qual é a importância dos recifes de coral para os oceanos?</h2>
                        <label style="color: white;">
                            <input type="radio" name="resposta3" value="habitat"> São habitats cruciais para muitas espécies marinhas
                        </label>
                        <br>
                        <label style="color: white;">
                            <input type="radio" name="resposta3" value="protecao"> Protegem as costas contra tempestades
                        </label>
                        <Br>
                        <label style="color: white;">
                            <input type="radio" name="resposta3" value="minerais"> São ricos em minerais valiosos
                        </label>
                    
                        <br><br>
                    
                        <h2 style="color: white;">Pergunta 4: Qual é o principal contribuinte para a poluição plástica nos oceanos?</h2>
                        <label style="color: white;">
                            <input type="radio" name="resposta4" value="embalagens"> Embalagens plásticas
                        </label>
                        
                        <br>
                        <label style="color: white;">
                            <input type="radio" name="resposta4" value="microplasticos"> Microplásticos de produtos de cuidado pessoal
                        </label>
                        <br>
                        <label style="color: white;">
                            <input type="radio" name="resposta4" value="canudinhos"> Canudinhos de plástico
                        </label>
                    
                        <br><br><br>
                    
                        <h2 style="color: white;">Pergunta 5: O que é a acidificação dos oceanos?</h2>
                        <label style="color: white;">
                            <input type="radio" name="resposta5" value="aumento"> Aumento da acidez dos oceanos devido à absorção de CO2
                        </label>
                        <br>
                        <label style="color: white;">
                            <input type="radio" name="resposta5" value="diminuicao"> Diminuição da acidez dos oceanos devido à absorção de CO2
                        </label>
                        <br>
                        <label style="color: white;">
                            <input type="radio" name="resposta5" value="contaminacao"> Contaminação dos oceanos por produtos químicos ácidos
                        </label>
                    
                        <br><br>
                    
                        <button type="button" onclick="verificarRespostas()" style="color: white; background-color: rgb(0, 0, 0);">Verificar Respostas</button>
                        <p id="resultado" style="color: white;"></p>
                        <p id="pontuacao" style="color: white;">Pontuação: <span id="pontuacao-valor" style="color: white;">0</span></p>
                    </div>
</form>


                </div>

        </main>

        <footer id="footerPerfil">
            <div class="text-center" id="divfooter">
                Aqua Technology Ltda. © 2023 - All Rights Reserved. ©
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>

var pontuacao = 0;
                    
function verificarRespostas() {
    var respostasCorretas = ["poluicao", "70", "habitat", "microplasticos", "aumento"];
    var pontuacaoElement = document.getElementById("pontuacao-valor");
    var resultadoElement = document.getElementById("resultado");

    for (var i = 1; i <= 5; i++) {
        var respostaSelecionada = document.querySelector('input[name="resposta' + i + '"]:checked');

        if (respostaSelecionada) {
            if (respostaSelecionada.value === respostasCorretas[i - 1]) {
                pontuacao++;
            }
        }
    }

    pontuacaoElement.textContent = pontuacao;
    exibirResultado();
}

function exibirResultado() {
    var resultadoElement = document.getElementById("resultado");

    if (pontuacao === 5) {
        resultadoElement.textContent = "Parabéns! Você acertou todas as perguntas!";
        resultadoElement.style.color = "green";
    } else {
        resultadoElement.textContent = "Você acertou " + pontuacao + " de 5 perguntas. Tente novamente!";
        resultadoElement.style.color = "red";
    }
}
</script>

        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
            </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
            integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
            </script>
       
        </script>

    </body>

</html>