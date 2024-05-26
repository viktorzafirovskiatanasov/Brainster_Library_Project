<?php

class Note
{
    protected static $table = 'notes';
   
    public static function addNote($userId , $note , $bookId){
     $req['sql'] = 'INSERT INTO notes (user_id , book_id , note) VALUES (:user_id , :book_id , :note)';
     $req['data'] = ['user_id' => $userId , 'book_id' => $bookId , 'note'=> $note ];
     return DB::request(self::$table , $req);
    }
    public static function getNotes($userId, $bookId){
        $req['sql'] = 'SELECT * FROM notes WHERE user_id = :user_id AND book_id = :book_id';
        $req['data'] = ['user_id'=> $userId , 'book_id'=> $bookId ];
        return DB::request(self::$table , $req);
    }
    public static function updateNote($note_id ,$note){
        $req['sql'] = 'UPDATE notes SET note = :note WHERE id = :note_id';
        $req['data'] = ['note_id'=> $note_id  , 'note'=> $note ];
        return DB::request(self::$table , $req);
    }
    public static function deleteNoteById($noteId) {
        $req['sql'] = 'DELETE FROM notes WHERE id = :note_id';
        $req['data'] = ['note_id' => $noteId];
        return DB::request(self::$table, $req);
    }
    public static function deleteNoteByBookId($book_id) {
        $req['sql'] = 'DELETE FROM notes WHERE book_id = :book_id';
        $req['data'] = ['book_id' => $book_id];
        return DB::request(self::$table, $req);
    }
}