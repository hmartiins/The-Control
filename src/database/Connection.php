<?php

class Connection
{
  public static $instance;

  public static function getInstance()
  {
    $connectionString = "pgsql:"
      . "host=ec2-52-73-199-211.compute-1.amazonaws.com;"
      . "port=5432;"
      . "dbname=d3bs6imcvlg6ue;"
      . "sslmode=require;";
    $userName = 'ophvormohnbclo';
    $password = '845e8b0be447ec1a25fe81f2cba3804b6ae7d06d57629846b9e54af4ac30af4d';

    if (!isset(self::$instance)) {
      self::$instance = new PDO(
        $connectionString,
        $userName,
        $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
      );

      self::$instance->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
      );
    }

    return self::$instance;
  }
}
