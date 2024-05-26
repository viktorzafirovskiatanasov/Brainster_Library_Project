<?php
session_start();
class Users
{

  protected static $table = 'users';
  public static function getAllUsers($pdo = null)
  {
    return DB::request(self::$table, null, $pdo);
  }
  public static function getLogIn($username)
  {
    $req['sql'] = 'SELECT role ,username, password FROM users WHERE username = :username';
    $req['data'] = ['username' => $username];
    return DB::request(self::$table, $req);
  }
  public static function addUser($email, $username, $password,  $role)
  {
    $req['sql'] = 'INSERT INTO users ( email,username, password, role) VALUES (:email,:username, :password, :role)';
    $req['data'] = ['username' => $username, 'password' => $password, 'email' => $email, 'role' => $role];
    DB::request(self::$table, $req);
  }
  public static function getUsername($username)
  {
    $req['sql'] = 'SELECT * FROM users WHERE username = :username';
    $req['data'] = ['username' => $username];
    return DB::request(self::$table, $req);
  }
  public static function getEmail($email)
  {
    $req['sql'] = 'SELECT * FROM users WHERE email = :email';
    $req['data'] = ['email' => $email];
    return DB::request(self::$table, $req);
  }
  public static function setSessionLogin($username)
  {
    $user = self::getUsername($username);
    $id = $user[0]['id'];
    $_SESSION['userID'] = $id;
    $_SESSION['login'] = true;
  }
  public static function unsetSession()
  {
    session_unset();
    session_destroy();
  }
  public static function getUserID(){
    $id = $_SESSION['userID'];
    return $id;
  }
  public static function getSessionLogin()
  {
    if (isset($_SESSION['login'])) {
      return true;
    } else {
      return false;
    }
  }
  public static function setUserRole($role)
  {
    $_SESSION['role'] = $role;
  }

  public static function getUserRole()
  {
    if(isset($_SESSION['role'])){
      return $_SESSION['role'];
    }
    else return "guest";
  }
}
