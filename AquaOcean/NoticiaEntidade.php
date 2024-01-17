<?php

class NoticiaEntidade {

    private $titulo;
    private $conteudo;

    public function getTitulo() {
        return $this->titulo;
    }
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getConteudo() {
        return $this->conteudo;
    }
    public function setConteudo($conteudo) {
        $this->conteudo= $conteudo;
    }
}
?>