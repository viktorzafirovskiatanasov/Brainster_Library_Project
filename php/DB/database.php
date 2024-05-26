<?php

class DB
{
    protected static $instance = null;
    protected const  DB_HOST =  'localhost';
    protected const  DB_NAME =  'project2';
    protected const  DB_USER =  'root';
    protected const  DB_PASSWORD = '';


    private function __construct()
    {
        // $this->PDO = $connection::connect(); $connection
        try {
            self::$instance = new PDO('mysql:host=' . self::DB_HOST, self::DB_USER, self::DB_PASSWORD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            if (self::$instance->exec("CREATE DATABASE IF NOT EXISTS " . self::DB_NAME)) {

                self::$instance->exec("USE " . self::DB_NAME);
                $this->createTables();
            } else {
                self::$instance->exec("USE " . self::DB_NAME);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    private function createTables()
    {

        self::$instance->exec('CREATE TABLE users (
            id INT AUTO_INCREMENT ,
            email VARCHAR(255) NOT NULL ,
            username VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            role ENUM(\'admin\' , \'user\') NOT NULL,
            PRIMARY KEY(id)
        );');
        self::$instance->exec('CREATE TABLE category (
            id INT AUTO_INCREMENT NOT NULL,
            title VARCHAR(255) NOT NULL,
            is_deteled ENUM (\'true\' , \'false\'),
            PRIMARY KEY (id)
          );');
        self::$instance->exec('CREATE TABLE authors (
            id INT AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL,
            surrname VARCHAR(255) NOT NULL,
            biography VARCHAR(255) NOT NULL,
            is_deteled ENUM (\'true\' , \'false\'),
              PRIMARY KEY (id)
          );');
        self::$instance->exec('CREATE TABLE books (
            id INT AUTO_INCREMENT,
            title VARCHAR(255) NOT NULL,
            author_id INT NOT NULL,
            category_id INT NOT NULL,
            publishing_year INT NOT NULL,
            pages_number INT NOT NULL,
            image_url VARCHAR(255) NOT NULL,
             PRIMARY KEY (id),
              FOREIGN KEY (author_id) REFERENCES authors(id),
              FOREIGN KEY (category_id) REFERENCES category(id)
              
          );');
        self::$instance->exec('CREATE TABLE comments(
            id INT AUTO_INCREMENT,
            book_id INT NOT NULL, 
            user_id INT NOT NULL,
            content VARCHAR(255) NOT NULL,
            approval_status ENUM(\'PENDING\', \'APPROVED\', \'DENIED\'),
             PRIMARY KEY (id),
               FOREIGN KEY (book_id) REFERENCES books(id),
               FOREIGN KEY (user_id) REFERENCES users(id)
           );');
        self::$instance->exec('CREATE TABLE notes (
            id INT AUTO_INCREMENT,
            user_id INT NOT NULL,
            book_id INT NOT NULL,
            note VARCHAR(255) NOT NULL,
            PRIMARY KEY (id),
            FOREIGN KEY (user_id) REFERENCES users(id) ,
            FOREIGN KEY (book_id) REFERENCES books(id)
        );');

        self::$instance->exec("INSERT INTO users (email, username, password, role) VALUES ('admin1@gmail.com', 'admin1', '" . password_hash("admin123", PASSWORD_DEFAULT) . "', 'admin')");
    }
    public static function connect()
    {
        if (is_null(self::$instance)) {
            new self();
        }
        return self::$instance;
    }
    public static function request($table, $req = null, $pdo = null)
    {

        if (is_null($pdo)) {
            $pdo = self::connect();
        }

        $data = [];
        $sql = "SELECT * FROM {$table}";

        if (!is_null($req)) {
            if (isset($req['sql'])) {
                $sql = $req['sql'];
            }

            if (isset($req['data'])) {
                $data = $req['data'];
            }
        }

        $stmt = $pdo->prepare($sql);


        $success = $stmt->execute($data);

        if (strpos(strtoupper($sql), 'INSERT') === 0 || strpos(strtoupper($sql), 'UPDATE') === 0 || strpos(strtoupper($sql), 'DELETE') === 0) {

            return $success;
        } else {

            return $stmt->fetchAll();
        }
    }
}
