<?php

class Equipe {
    private $id;
    private $nome;
    private $formotor;
    private $nacionalidade;
    private $url;
    private $vitorias;
    private $pontos;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setFormotor($formotor) {
        $this->formotor = $formotor;
    }

    public function getFormotor() {
        return $this->formotor;
    }

    public function setNacionalidade($nacionalidade) {
        $this->nacionalidade = $nacionalidade;
    }

    public function getNacionalidade() {
        return $this->nacionalidade;
    }

    public function setUrl($url) {
        $this->url = $url;
    }
    
    public function getUrl() {
        return $this->url;
    }

    public function setVitorias($vitorias) {
        $this->vitorias = $vitorias;
    }

    public function getVitorias() {
        return $this->vitorias;
    }

    public function setPontos($pontos) {
        $this->pontos = $pontos;
    }

    public function getPontos() {
        return $this->pontos;
    }
}
    