<?php

require_once 'AbstractCrud.php';

class Categoria extends AbstractCrud
{
  protected $tableName = "categoria";
  protected $cdName = "cd";
  protected $nome;

  public function getNome()
  {
    return $this->nome;
  }

  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function insert()
  {
    try {
      $sql = "INSERT INTO $this->tableName (nome) VALUES (
        :nome
      )";
      $stmt = Connection::getInstance()->prepare($sql);
      $stmt->bindParam(':nome', $this->nome);

      return $stmt->execute();
    } catch (PDOException $error) {
      echo $error->getMessage();
    }
  }

  public function update($id)
  {
    try {
      $sql = "UPDATE $this->tableName SET nome = :nome WHERE $this->cdName = :id";
      $stmt = Connection::getInstance()->prepare($sql);
      $stmt->bindParam(':nome', $this->nome);
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
