<?php

class Book
{

    protected static $table = 'books';

    public static function getAllBooks($pdo = null)
    {
        return DB::request(self::$table, null, $pdo);
    }
    public static function getBooks($pdo = null)
    {
        $req['sql'] = "SELECT books.* , authors.name , authors.surrname , category.title as category FROM books JOIN authors ON books.author_id = authors.id 
         JOIN category ON books.category_id = category.id";
        return DB::request(self::$table, $req, $pdo);
    }
    public static function getBook($id,$pdo = null )
    {
        $req['sql'] = "SELECT books.*, authors.name, authors.surrname, category.title as category 
                       FROM books 
                       JOIN authors ON books.author_id = authors.id 
                       JOIN category ON books.category_id = category.id 
                       WHERE books.id = :id";
        $req['data'] = ["id" => $id];
        return DB::request(self::$table, $req, $pdo);
    }
    public static function filterBooks($selectedAuthors, $selectedCategories, $minPages, $maxPages, $minYear, $maxYear)
    {
        $sql = "SELECT books.*, authors.name, authors.surrname, category.title as category
                FROM books 
                JOIN authors ON books.author_id = authors.id 
                JOIN category ON books.category_id = category.id";

        $conditions = array();
        $data = array();

        if (!empty($selectedAuthors)) {
            $authorConditions = array();
            foreach ($selectedAuthors as $author) {
                $authorConditions[] = "author_id = :author_id_" . intval($author);
                $data[":author_id_" . intval($author)] = $author;
            }
            $conditions[] = "(" . implode(" OR ", $authorConditions) . ")";
        }

        if (!empty($selectedCategories)) {
            $categoryConditions = array();
            foreach ($selectedCategories as $category) {
                $categoryConditions[] = "category_id = :category_id_" . intval($category);
                $data[":category_id_" . intval($category)] = $category;
            }
            $conditions[] = "(" . implode(" OR ", $categoryConditions) . ")";
        }

        if ($minPages !== null) {
            $conditions[] = "pages_number >= :min_pages";
            $data[':min_pages'] = $minPages;
        }

        if ($maxPages !== null) {
            $conditions[] = "pages_number <= :max_pages";
            $data[':max_pages'] = $maxPages;
        }

        if ($minYear !== null) {
            $conditions[] = "publishing_year >= :min_year";
            $data[':min_year'] = $minYear;
        }

        if ($maxYear !== null) {
            $conditions[] = "publishing_year <= :max_year";
            $data[':max_year'] = $maxYear;
        }

        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        $req['sql'] = $sql;
        $req['data'] = $data;
        return DB::request(self::$table, $req);
    }
    public static function exists($title, $author_id, $category_id, $publishing_year, $pages_number, $img_url)
    {
        $req["sql"] = 'SELECT * FROM books WHERE title = :title AND author_id = :author_id AND category_id = :category_id AND publishing_year = :publishing_year AND pages_number = :pages_number AND image_url = :img_url';
        $req["data"] = ["title" => $title, "author_id" => $author_id, "category_id" => $category_id, "publishing_year" => $publishing_year, "pages_number" => $pages_number, "img_url" => $img_url];

        return DB::request(self::$table, $req);
    }
    public static function editRow($title, $author_id, $category_id, $publishing_year, $pages_number, $img_url, $id)
    {
        $req["sql"] = 'UPDATE `books` SET `title` = :title, `author_id` = :author_id, `category_id` = :category_id, `publishing_year` = :publishing_year, `pages_number` = :pages_number, `image_url` = :img_url WHERE `id` = :id';
        $req["data"] = ["title" => $title, "author_id" => $author_id, "category_id" => $category_id, "publishing_year" => $publishing_year, "pages_number" => $pages_number, "img_url" => $img_url, 'id' => $id];
        return DB::request(self::$table, $req);
    }
    
    public static function getFilteredBooks($pdo = null)
    {
        $req['sql'] = 'SELECT b.id , b.title, a.name AS author_name,a.surrname AS author_surrname, b.publishing_year, b.pages_number, b.image_url, c.title AS category_title FROM books b JOIN authors a ON b.author_id = a.id JOIN category c ON b.category_id = c.id';
        return DB::request(self::$table, $req, $pdo);
    }


    public static function addNew($title, $author_id, $category_id, $publishing_year, $pages_number, $img_url)
{
    $req["sql"] = 'INSERT INTO books (title, author_id, category_id, publishing_year, pages_number, image_url) VALUES (:title, :author_id, :category_id, :publishing_year, :pages_number, :img_url)';
    $req["data"] = ["title" => $title, "author_id" => $author_id, "category_id" => $category_id, "publishing_year" => $publishing_year, "pages_number" => $pages_number, 'img_url' => $img_url];
    return DB::request(self::$table, $req);
}

    public static function updateRow($id, $author_id, $category_id, $publishing_year, $pages_number, $img_url)
    {
        $req["sql"] = 'UPDATE TABLE books SET author_id = :author_id, category_id = :category_id, publishing_year = :publishing_year , pages_number = :pages_number , image_url = :image_url WHERE id = :id';
        $req["data"] = ["author_id" => $author_id, "category_id" => $category_id, "publishing_year" => $publishing_year, "pages_number" => $pages_number, 'img_url' => $img_url, 'id' => $id];
        return DB::request(self::$table, $req);
    }

   
    public static function deleteBook($id){
        $req['sql'] = 'DELETE FROM books WHERE id = :id';
        $req['data'] = ['id' => $id];
        return DB::request(self::$table, $req);
    }
}
