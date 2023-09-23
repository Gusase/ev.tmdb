<?php

/**
 * User as profile?
 */
class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllUsers()
  {
    $query = "SELECT * FROM login";

    $this->db->query($query);
    $this->db->execute();

    return $this->db->getAll();

    $this->db->close();
  }

  public function getUser($username)
  {
    $query = "SELECT * FROM login where username = :username";

    $this->db->query($query);
    $this->db->bind('username', $username);
    $this->db->execute();

    return $this->db->get();
  }

  public function userExists($username)
  {
    $query = "SELECT username FROM login WHERE login.username = :username";
    $this->db->query($query);
    $this->db->bind('username', $username);
    $this->db->execute();


    return $this->db->changeRow();
  }

  public function register($credential)
  {
    $username = htmlspecialchars($credential['username']);
    $name = htmlspecialchars($credential['name']);
    $password = htmlspecialchars($credential['password']);

    $hash = password_hash($password, PASSWORD_BCRYPT);

    if (!empty($this->getUser($username))) {
      return 0;
    }

    $query = "INSERT INTO login VALUES (:username,:name,:password)";

    $this->db->query($query);
    $this->db->bind('username', $username);
    $this->db->bind('name', $name);
    $this->db->bind('password', $hash);
    $this->db->execute();

    return $this->db->changeRow();

    $this->db->close();
  }
}
