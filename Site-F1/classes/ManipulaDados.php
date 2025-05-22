<?php

include_once("Conexao.php");

class ManipulaDados extends Conexao
{
    private $table;
    private $fields;
    private $dados;
    private $fieldPk;
    private $valuePk;

    public function getTable()
    {
        return $this->table;
    }

    public function setTable($table)
    {
        $this->table = $table;
    }

    public function getFields()
    {
        return $this->fields;
    }

    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    public function getDados()
    {
        return $this->dados;
    }

    public function setDados($dados)
    {
        $this->dados = $dados;
    }
    public function getFieldPk()
    {
        return $this->fieldPk;
    }
    public function setFieldPk($fieldPk)
    {
        $this->fieldPk = $fieldPk;
    }
    public function getValuePk()
    {
        return $this->valuePk;
    }
    public function setValuePk($valuePk)
    {
        $this->valuePk = $valuePk;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getAllDataTable()
    {
        $this->sql = "SELECT * FROM $this->table";
        $this->qr = self::execSQL($this->sql);

        $dados = array();

        while ($row = self::listQr($this->qr)) {
            array_push($dados, $row);
        }

        return $dados;
    }

    public function getData()
    {
        $this->sql = "SELECT * FROM $this->table WHERE $this->fieldPk = '$this->valuePk' LIMIT 1";
        $this->qr = self::execSQL($this->sql);

        return self::listQr($this->qr);
    }

    public function insert()
    {
        $this->sql = "INSERT INTO $this->table($this->fields) VALUES ('$this->dados')";

        if (self::execSQL($this->sql)) {
            $this->status = "Cadastrado com Sucesso!";
        } else {
            $this->status = "Error ao cadastrar " . mysqli_error($this->connect());
        }
    }

    public function update()
    {
        $this->sql = "UPDATE $this->table SET $this->fields WHERE $this->fieldPk = '$this->valuePk'";

        if (self::execSQL($this->sql)) {
            $this->status = "Alterado com Sucesso";
        } else {
            $this->status = "Erro ao alterar " . mysqli_error($this->connect());
        }
    }

    public function delete()
    {
        $this->sql = "DELETE FROM $this->table WHERE $this->fieldPk = '$this->valuePk'";

        if (self::execSQL($this->sql)) {
            $this->status = "Deletado com Sucesso";
        } else {
            $this->status = "Erro ao deletar " . mysqli_error($this->connect());
        }
    }

    public function validarLogin($login, $password)
    {
        $this->sql = "SELECT * FROM tb_usuarios WHERE usuario='$login' and senha='$password'";
        $this->qr = self::execSQL($this->sql);
        $linhas = self::countData($this->qr);
        return $linhas;
    }
}
