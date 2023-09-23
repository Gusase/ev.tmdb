<?php

/**
 * Database class
 * @return PDO query?
 */
class Database
{
  private string $dbHost = DB_HOST;
  private string $dbUser = DB_USER;
  private string $dbPass = DB_PASS;
  private string $dbName = DB_NAME;
  private $db;
  private $stmt;

  public function __construct()
  {
    try {
      $this->db = new PDO("mysql:host={$this->dbHost};dbname={$this->dbName}", $this->dbUser, $this->dbPass);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo 'koneksi Gagal ' . $e->getMessage();
    }
  }

  public function query(string $query)
  {
    $this->stmt = $this->db->prepare($query);
  }

  public function bind(string $param, string $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
      }
    }

    $this->stmt->bindValue($param, $value, $type);
  }

  public function execute()
  {
    $this->stmt->execute();
  }

  public function changeRow()
  {
    return $this->stmt->rowCount();
  }

  public function get()
  {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  public function getAll()
  {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function close()
  {
    $this->db = null;
    $this->stmt = null;
  }
}
