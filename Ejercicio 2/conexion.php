<?php

class Conexion
{
  protected $dbh;
  private $engine;
  private $ip;
  private $port;
  private $dbName;
  private $user;
  private $password;

  function __construct($engine, $ip, $port, $dbName, $user, $password)
  {
    $this->engine = $engine;
    $this->ip = $ip;
    $this->port = $port;
    $this->dbName = $dbName;
    $this->user = $user;
    $this->password = $password;
  }
  function getConnection()
  {
    try {
      $this->dbh = new PDO(''.$this->engine.':host='.$this->ip.';port='.$this->port.';dbname='.$this->dbName, $this->user, $this->password);
      return $this->dbh;
    } catch (Exception $e) {
      echo $e;
      return null;
    }
  }
}
