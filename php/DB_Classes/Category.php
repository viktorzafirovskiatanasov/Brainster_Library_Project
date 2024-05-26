<?php


class Category
{
  protected static $table = 'category';
  public static function getAllCategories($pdo = null)
  {
    return DB::request(self::$table, null, $pdo);
  }
  public static function addNew($title, $is_deleted = false)
  {
    $req['sql'] = 'INSERT INTO category (title , is_deleted) VALUES (:title , :is_deleted)';
    $req['data'] = ['title' => $title, 'is_deleted' => 'false'];
    return DB::request(self::$table, $req);
  }
  public static function exists($title)
  {
    $req['sql'] = 'SELECT * FROM category WHERE title = :title';
    $req['data'] = ['title' => $title];
    return DB::request(self::$table, $req);
  }
  public static function getCategoryId($title){
    $req['sql'] = 'SELECT id FROM category WHERE title = :title';
    $req['data'] = ['title'=> $title];
    return DB::request(self::$table, $req);
  }
  public static function editTitle($title, $id)
  {
    $req['sql'] = 'UPDATE category SET title = :title WHERE id = :id';
    $req['data'] = ['title' => $title, 'id' => $id];
    return DB::request(self::$table, $req);
  }
  public static function editStatus($newStatus, $id)
  {
    $req['sql'] = 'UPDATE category SET is_deleted = :newStatus WHERE id = :id';
    $req['data'] = ['newStatus' => $newStatus, 'id' => $id];
    return DB::request(self::$table, $req);
  }
  public static function getDeleted()
  {
    $req['sql'] = 'SELECT * FROM category WHERE is_deleted = true';
    return DB::request(self::$table, $req);
  }
}
