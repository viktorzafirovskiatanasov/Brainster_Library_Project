<?php

class Comment
{
    protected static $table = 'comments';
   
    public static function addComment($userId , $content , $bookId , $approval_status = 'PENDING'){
     $req['sql'] = 'INSERT INTO comments (user_id , book_id , content , approval_status) VALUES (:user_id , :book_id , :content , :approval_status)';
     $req['data'] = ['user_id' => $userId , 'book_id' => $bookId , 'content'=> $content , 'approval_status'=> $approval_status ];
     return DB::request(self::$table , $req);
    }
    public static function getCurrentUserComment($userId, $bookId){
        $req['sql'] = 'SELECT comments.*, users.username AS username
        FROM comments
        JOIN users ON comments.user_id = users.id
        WHERE user_id = :user_id AND book_id = :book_id';
        $req['data'] = ['user_id'=> $userId , 'book_id'=> $bookId ];
        return DB::request(self::$table , $req);
    }
    public static function getAllComments($bookId = null){
        $req['sql'] = 'SELECT comments.*, users.username AS username
        FROM comments
        JOIN users ON comments.user_id = users.id';
    
        if ($bookId !== null) {
            $req['sql'] .= ' WHERE book_id = :book_id';
            $req['data'] = ['book_id'=> $bookId];
        }
        return DB::request(self::$table , $req);
    }
    public static function deleteCommentById($comment_id) {
        $req['sql'] = 'DELETE FROM comments WHERE id = :comment_id';
        $req['data'] = ['comment_id' => $comment_id];
        return DB::request(self::$table, $req);
    }
    public static function deleteCommentByBookId($book_id) {
        $req['sql'] = 'DELETE FROM comments WHERE book_id = :book_id';
        $req['data'] = ['book_id' => $book_id];
        return DB::request(self::$table, $req);
    }
    public static function doesExist($user_id, $bookId) {
        $req['sql'] = 'SELECT * FROM comments WHERE user_id = :user_id AND book_id = :book_id';
        $req['data'] = ['user_id' => $user_id, 'book_id' => $bookId];
        return DB::request(self::$table, $req);
    }
    public static function updateCommentStatus($newStatus,$comment_id) {
        $req['sql'] = 'UPDATE comments SET approval_status = :newStatus WHERE id = :comment_id';
        $req['data'] = ['newStatus'=> $newStatus,'comment_id'=> $comment_id ];
        return DB::request(self::$table, $req);
    }
}
