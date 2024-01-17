
function contatoSubmit() {
  contato();  
  submitForm();  
}


function submitForm() {
  
  var formData = new FormData(document.getElementById('contatoForm'));
  
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
          alert('Contato realizado!');
      },
      error: function () {
          alert('Erro');
      }
  });
}



function contato() {
   
    
  var campoEmail = document.getElementById("email");
  var campoNome = document.getElementById("nome");
  var campoTelefone = document.getElementById("telefone");
  var alertaEmail = document.getElementById("alertaEmail");
  var alertaNome = document.getElementById("alertaNome");
  var alertaTelefone = document.getElementById("alertaTelefone");
  var alertaAmbos = document.getElementById("alertaAmbos");

  campoEmail.style.borderColor = "black";
  campoNome.style.borderColor = "black";
  campoTelefone.style.borderColor = "black";
  alertaEmail.style.display = "none";
  alertaNome.style.display = "none";
  alertaTelefone.style.display = "none";
  alertaAmbos.style.display = "none";
  
  
  
  if (campoEmail.value === "" && campoNome.value === "" && campoTelefone.value === "") {
    campoEmail.style.borderColor = "red";
    campoNome.style.borderColor = "red";
    campoTelefone.style.borderColor = "red";
    alertaAmbos.style.display = "block";
    return;
  }
  
  if (campoEmail.value === "") {
    campoEmail.style.borderColor = "red";
    alertaEmail.style.display = "block";
    return;
  }

  if (campoNome.value === "") {
    campoNome.style.borderColor = "red";
    alertaNome.style.display = "block";
    return;
  }

  if (campoTelefone.value === "") {
    campoTelefone.style.borderColor = "red";
    alertaTelefone.style.display = "block";
    return;
  }
 

}


function login(){
  
  var campoEmail = document.getElementById("email");
  var campoSenha = document.getElementById("senha");
  var alertaEmail = document.getElementById("alertaEmail");
  var alertaSenha = document.getElementById("alertaSenha");
  var alertaAmbos = document.getElementById("alertaAmbos");

  alertaEmail.style.display = "none";
  alertaSenha.style.display = "none";
  alertaAmbos.style.display = "none";
  campoEmail.style.borderColor = "black";
  campoSenha.style.borderColor = "black";
  
  
  if (campoEmail.value === "" && campoSenha.value === "") {
    campoEmail.style.borderColor = "red";
    campoSenha.style.borderColor = "red";
    alertaAmbos.style.display = "block";
    return;
  }
  
  if (campoEmail.value === "") {
    campoEmail.style.borderColor = "red";
    alertaEmail.style.display = "block";
    return;
  }

  if (campoSenha.value === "") {
    campoSenha.style.borderColor = "red";
    alertaSenha.style.display = "block";
    return;
  }else {
    window.location.href = "perfil.html";
}


}

function cadastrar() {
 
  var campoEmail = document.getElementById("email");
  var campoNome = document.getElementById("nome");
  var campoSenha = document.getElementById("senha");
  var campoConfirmacaoSenha = document.getElementById("confirmacaoSenha");
  var checkbox = document.getElementById("gridCheck");
  var alertaEmail = document.getElementById("alertaEmail");
  var alertaNome = document.getElementById("alertaNome");
  var alertaSenha = document.getElementById("alertaSenha");
  var alertaConfirmacaoSenha = document.getElementById("alertaConfirmacaoSenha");
  var alertaCheck = document.getElementById("alertaCheck");
  var alertaAmbos = document.getElementById("alertaAmbos");

  
  campoEmail.style.borderColor = "black";
  campoNome.style.borderColor = "black";
  campoSenha.style.borderColor = "black";
  campoConfirmacaoSenha.style.borderColor = "black";
  alertaEmail.style.display = "none";
  alertaNome.style.display = "none";
  alertaSenha.style.display = "none";
  alertaConfirmacaoSenha.style.display = "none";
  alertaAmbos.style.display = "none";


  if (campoEmail.value === "" && campoNome.value === "" && campoSenha.value === "" && campoConfirmacaoSenha.value === "" && checkbox.checked === false) {
    campoEmail.style.borderColor = "red";
    campoNome.style.borderColor = "red";
    campoSenha.style.borderColor = "red";
    campoConfirmacaoSenha.style.borderColor = "red";
    alertaCheck.style.borderColor = "red";
    alertaAmbos.style.display = "block";
    return;
  }

  if (campoEmail.value === "") {
    campoEmail.style.borderColor = "red";
    alertaEmail.style.display = "block";
    return;
  }

  if (campoNome.value === "") {
    campoNome.style.borderColor = "red";
    alertaNome.style.display = "block";
    return;
  }

  if (campoSenha.value === "") {
    campoSenha.style.borderColor = "red";
    alertaSenha.style.display = "block";
    return;
  }

  if (campoConfirmacaoSenha.value === "") {
    campoConfirmacaoSenha.style.borderColor = "red";
    alertaConfirmacaoSenha.style.display = "block";
    return;
  }

  if (checkbox.checked === false) {
    alertaCheck.style.borderColor = "red";
    alertaCheck.style.display = "block";
    return;
  }else {
      window.location.href = "login.php";
  }

}

function pesquisar() {
var termoPesquisa = document.getElementById("consulta").value.toLowerCase();

if (termoPesquisa !== "") {
  fetch('./get_noticias.php')
  .then(response => {
      if (!response.ok) {
          throw new Error('Erro na requisição: ' + response.statusText);
      }
      return response.text(); // Alterado de json() para text()
  })
  .then(data => exibirNoticiasFiltradas(data, termoPesquisa))
  .catch(error => console.error('Erro:', error));
}
}

function exibirNoticiasFiltradas(noticiasHTML, termoPesquisa) {
var todasAsNoticias = document.querySelectorAll(".noticia");

todasAsNoticias.forEach(function (noticia) {
    var tituloNoticia = noticia.querySelector('.titulonoticia').textContent.toLowerCase();

    if (tituloNoticia.includes(termoPesquisa)) {
        noticia.style.display = "block";
    } else {
        noticia.style.display = "none";
    }
});
}


function revelar(){
  var revelar = document.getElementById("site")
  var inf = document.getElementById("sair")
  revelar.style.display = "block"
  inf.style.display = "none"
}


