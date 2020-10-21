<?php

require_once '../database/Connection.php';

abstract class AbstractCrud extends Connection
{
  protected $connection;
  protected $tableName;
  protected $cdName;

  abstract public function insert();
  abstract public function update($id);

  public function __construct()
  {
    $this->connection = new Connection();
  }

  public function findOne($id)
  {
    $sql = "SELECT * FROM $this->tableName WHERE $this->cdName = :id";
    $stmt = $this->connection->getInstance()->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetch();
  }

  public function findAll()
  {
    $sql = "SELECT * FROM $this->tableName";
    $stmt = $this->connection->getInstance()->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll();
  }

  public function delete($id)
  {
    $sql = "DELETE FROM $this->tableName WHERE $this->cdName = :id";
    $stmt = $this->connection->getInstance()->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) : return true;
    else : return "Este dado não pode ser deletado...ele pode estar vinculado a outra consulta!";
    endif;
  }
}
