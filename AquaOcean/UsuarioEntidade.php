<?php
class UsuarioEntidade {
    private $nome;
    private $email;

    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email= $email;
    }
}
?>