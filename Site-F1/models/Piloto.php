<?php

class Piloto {
    private $id;
    private $nome;
    private $pontos;
    private $vitorias;
    private $nacionalidade;
    private $url;
    private $equipe_id;

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

    public function setPontos($pontos) {
        $this->pontos = $pontos;
    }

    public function getPontos() {
        return $this->pontos;
    }

    public function setVitorias($vitorias) {
        $this->vitorias = $vitorias;
    }

    public function getVitorias() {
        return $this->vitorias;
    }

    public function setNacionalidade($nacionalidade) {
        $this->nacionalidade = $nacionalidade;
    }

    public function getNacionalidade() {
        return $this->nacionalidade;
    }

    public function setEquipeId($equipe_id) {
        $this->equipe_id = $equipe_id;
    }

    public function getEquipeId() {
        return $this->equipe_id;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function getUrl() {
        return $this->url;
    }
}


?>