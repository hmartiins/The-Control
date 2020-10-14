<?php

class Connection
{
  public static $instance;

  public static function getInstance()
  {
    $connectionString = 'mysql:host=localhost;dbname=thecontrol;charset=utf8';
    $userName = 'root';
    $password = '';

    if (!isset(self::$instance)) {
      self::$instance = new PDO(
        $connectionString,
        $userName,
        $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
      );

      self::$instance->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::NULL_EMPTY_STRING,
        PDO::ATTR_ORACLE_NULLS
      );
    }

    return self::$instance;
  }
}
