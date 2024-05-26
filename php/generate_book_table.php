<?php 

include_once './autoload.php';

header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $data = Book::getFilteredBooks();
    $html = ''; 

    foreach ($data as $book) {
        
            $html .= '<tr style="border-bottom : 2px solid black" data-id="' . $book['id'] . '" data-book-title="' . $book['title'] . '" data-book-author-name="' . $book['author_name'] .' '.  $book['author_surrname'].'" data-book-year="' . $book['publishing_year'] . '" data-book-pages="' . $book['pages_number'] . '" data-book-image-url="' . $book['image_url'] . '" data-book-category="' . $book['category_title'] . '">';
            $html .= '<td  style="border-right: 2px solid black">' . $book['title'] . '</td>';
            $html .= '<td  style="border-right: 2px solid black">' . $book['author_name'] . ' '.$book['author_surrname'].'</td>';
            $html .= '<td  style="border-right: 2px solid black">' . $book['publishing_year'] . '</td>';
            $html .= '<td  style="border-right: 2px solid black">' . $book['pages_number'] . '</td>';
            $html .= '<td  style="border-right: 2px solid black">' . $book['image_url'] . '</td>';
            $html .= '<td  style="border-right: 2px solid black">' . $book['category_title'] . '</td>';
            $html .= '<td><button data-id=' . $book['id'] . ' class="edit-button rounded-full py-2 px-5" style="margin-bottom : 10px; background-color:yellow">Edit</button>';
            $html .= '<button data-id=' . $book['id'] . ' class="delete-button rounded-full bg-red-500 py-2 px-5"> Delete</button></td>';
            $html .= "</tr>";
            
            
    }

    
    echo json_encode(['status' => 'success', 'data' => $html]);
}

?>