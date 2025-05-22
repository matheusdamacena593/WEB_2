<?php

class Equipe {
    private $id;
    private $nome;
    private $formotor;
    private $nacionalidade;

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
}
    