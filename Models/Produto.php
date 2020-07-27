<?php

include_once "Funcoes.php";

class Produto extends Conexao {

    private $con;
    private $obj;
    private $id_produto;
    private $nome;
    private $produto;
    private $descricao;
    private $imagem;
    private $dataCadastro;

    public function __construct() {
        $this->con = new Conexao();
        $this->obj = new Funcoes();
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }

	public function querySeleciona($dado){
        try{
            $this->id_produto = $this->obj->base64($dado, 2);
            $sql = $this->con->conectar()->prepare("SELECT * FROM produtos WHERE id_produto = :idFunc;");
            $sql->bindParam(":idFunc", $this->id_produto, PDO::PARAM_INT);
            $sql->execute();
            return $sql->fetch();
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }

    public function querySelect() {
        try {
            $sql = $this->con->conectar()->prepare("SELECT * FROM produtos ORDER BY nome;");
            $sql->execute();
            return $sql->fetchAll();
        } catch (PDOException $ex) {
            return 'erro '.$ex->getMessage();
        }
    }

	 public function queryCount() {
        try {
            $sql = $this->con->conectar()->prepare("SELECT COUNT(*) AS id_produto FROM produtos;");
            $sql->execute();
            return $sql->fetchAll();
        } catch (PDOException $ex) {
            return 'erro '.$ex->getMessage();
        }
    }

    public function queryInsert($dados) {
        try {
            $this->nome = $this->obj->trataCaracter($dados['nome'], 1);
            $this->produto = $this->obj->trataCaracter($dados['produto'], 1);
			$this->descricao = $this->obj->trataCaracter($dados['descricao'], 1);
            $this->imagem = $this->obj->trataCaracter($dados['imagem'], 1);
            $this->dataCadastro = $this->obj->dataAtual(2);
            $sql = $this->con->conectar()->prepare("INSERT INTO produtos (nome , produto , descricao , imagem , data_cadastro) VALUES (:nome , :produto , :descricao , :imagem , :dt);");
            $sql->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $sql->bindParam(":produto", $this->produto, PDO::PARAM_STR);
            $sql->bindParam(":descricao", $this->descricao, PDO::PARAM_STR);
            $sql->bindParam(":imagem", $this->imagem, PDO::PARAM_STR);
            $sql->bindParam(":dt", $this->dataCadastro, PDO::PARAM_STR);
            if($sql->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }

    public function queryUpdate($dados) {
        try {
            $this->id_produto = $this->obj->base64($dados['prod'], 2);
            $this->nome = $this->obj->trataCaracter($dados['nome'], 1);
            $this->produto = $this->obj->trataCaracter($dados['produto'], 1);
			$this->descricao = $this->obj->trataCaracter($dados['descricao'], 1);
			$this->imagem = $this->obj->trataCaracter($dados['imagem'], 1);
            $sql = $this->con->conectar()->prepare("UPDATE produtos SET  nome = :nome , produto = :produto , descricao = :descricao , imagem = :imagem WHERE id_produto = :idFunc;");
            $sql->bindParam(":idFunc", $this->id_produto, PDO::PARAM_INT);
            $sql->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $sql->bindParam(":produto", $this->produto, PDO::PARAM_STR);
			$sql->bindParam(":descricao", $this->descricao, PDO::PARAM_STR);
			$sql->bindParam(":imagem", $this->imagem, PDO::PARAM_STR);
            if($sql->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error '.$ex->getMessage();
        }
    }

    public function queryDelete($dado) {
        try {
            $this->id_produto = $this->obj->base64($dado, 2);
            $sql = $this->con->conectar()->prepare("DELETE FROM produtos WHERE id_produto = :idFunc;");
            $sql->bindParam(":idFunc", $this->id_produto, PDO::PARAM_INT);
            if($sql->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error'.$ex->getMessage();
        }
    }
}
