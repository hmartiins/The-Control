<?php

require_once 'AbstractCrud.php';

class Produto extends AbstractCrud
{
  protected $tableName = "produto";
  protected $cdName = "cd";
  protected $nome;
  protected $preco;
  protected $idioma;
  protected $plataforma;
  protected $multiplayer;
  protected $ano_lancamento;
  protected $desenvolvedor;
  protected $quantidade;

  public function getNome()
  {
    return $this->nome;
  }

  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function getPreco()
  {
    return $this->preco;
  }

  public function setPreco($preco)
  {
    $this->preco = $preco;
  }

  public function getIdioma()
  {
    return $this->idioma;
  }

  public function setIdioma($idioma)
  {
    $this->idioma = $idioma;
  }

  public function getPlataforma()
  {
    return $this->plataforma;
  }

  public function setPlataforma($plataforma)
  {
    $this->plataforma = $plataforma;
  }

  public function getMultiplayer()
  {
    return $this->multiplayer;
  }

  public function setMultiplayer($multiplayer)
  {
    $this->multiplayer = $multiplayer;
  }

  public function getAnoLancamento()
  {
    return $this->ano_lancamento;
  }

  public function setAnoLancamento($anoLancamento)
  {
    $this->ano_lancamento = $anoLancamento;
  }

  public function getDesenvolvedor()
  {
    return $this->desenvolvedor;
  }

  public function setDesenvolvedor($desenvolvedor)
  {
    $this->desenvolvedor = $desenvolvedor;
  }

  public function getQuantidade()
  {
    return $this->quantidade;
  }

  public function setQuantidade($quantidade)
  {
    $this->quantidade = $quantidade;
  }

  public function insert()
  {
    try {
      $sql = "INSERT INTO $this->tableName VALUES (
        null,
        :nome,
        :preco,
        :idioma,
        :plataforma,
        :multiplayer,
        :anoLancamento,
        :desenvolvedor,
        :quantidade
      )";
      $stmt = Connection::getInstance()->prepare($sql);
      $stmt->bindParam(':nome', $this->nome);
      $stmt->bindParam(':preco', $this->preco);
      $stmt->bindParam(':idioma', $this->idioma);
      $stmt->bindParam(':plataforma', $this->plataforma);
      $stmt->bindParam(':multiplayer', $this->multiplayer);
      $stmt->bindParam(':anoLancamento', $this->ano_lancamento);
      $stmt->bindParam(':desenvolvedor', $this->desenvolvedor);
      $stmt->bindParam(':quantidade', $this->quantidade);

      return $stmt->execute();
    } catch (PDOException $error) {
      echo $error->getMessage();
    }
  }

  public function update($id)
  {
    try {
      $sql = "UPDATE $this->tableName SET
        nome = :nome,
        preco = :preco,
        idioma = :idioma,
        plataforma = :plataforma,
        multiplayer = :multiplayer,
        ano_lancamento = :anoLancamento,
        desenvolvedor = :desenvolvedor,
        quantidade = :quantidade
        WHERE $this->cdName = :id
      ";
      $stmt = Connection::getInstance()->prepare($sql);
      $stmt->bindParam(':nome', $this->nome);
      $stmt->bindParam(':preco', $this->preco);
      $stmt->bindParam(':idioma', $this->idioma);
      $stmt->bindParam(':plataforma', $this->plataforma);
      $stmt->bindParam(':multiplayer', $this->multiplayer);
      $stmt->bindParam(':anoLancamento', $this->ano_lancamento);
      $stmt->bindParam(':desenvolvedor', $this->desenvolvedor);
      $stmt->bindParam(':quantidade', $this->quantidade);
      $stmt->bindParam(':id', $id);

      return $stmt->execute();
    } catch (PDOException $error) {
      echo $error->getMessage();
    }
  }

  public function delete($id)
  {
    try {
      $sql = "DELETE FROM $this->tableName WHERE $this->cdName = :id";
      $stmt = Connection::getInstance()->prepare($sql);
      $stmt->bindParam(':id', $id);

      return $stmt->execute();
    } catch (PDOException $error) {
      echo $error->getMessage();
    }
  }
}
