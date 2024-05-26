<?php

   class Authors{

    protected static $table = 'authors';
    public static function getAllAuthors($pdo = null){
        return DB::request(self::$table, null, $pdo);
    }

    public static function getAuthorId($name , $surrname){
      $req['sql'] = 'SELECT id FROM authors WHERE name = :name AND surrname = :surrname';
      $req['data'] = ['name' => $name , 'surrname' => $surrname];
      return DB::request(self::$table, $req);
    }
    public static function exists($name , $surrname)
  {
    $req['sql'] = 'SELECT * FROM authors WHERE name = :name AND surrname = :surrname';
    $req['data'] = ['name' => $name , 'surrname' => $surrname ];
    return DB::request(self::$table, $req);
  }
    public static function addNew($name , $surrname , $bio , $is_deleted='false'){
        $req["sql"] = 'INSERT INTO authors (name, surrname,biography,is_deleted) VALUES (:name, :surrname,:bio , :is_deleted)';
        $req["data"] = ["name" => $name,"surrname" => $surrname,"bio" => $bio , 'is_deleted' => $is_deleted];
        return DB::request(self::$table, $req);
   }
   public static function editRow($name , $surrname , $bio , $id){
    $req['sql'] = 'UPDATE  authors SET name = :name , surrname = :surrname , biography = :bio WHERE id = :id';
    $req['data'] = ['name' => $name,'surrname'=> $surrname , 'bio' => $bio , 'id'=>$id];
    return DB::request(self::$table , $req);
   }
   public static function editStatus($newStatus , $id){
    $req['sql'] = 'UPDATE  authors SET is_deleted = :newStatus WHERE id = :id';
    $req['data'] = ['newStatus' => $newStatus,'id'=> $id ];
    return DB::request(self::$table , $req);
}
public static function getDeleted(){
    $req['sql'] = 'SELECT * FROM authors WHERE is_deleted = true';
   return DB::request(self::$table , $req); 
   }
}
?>