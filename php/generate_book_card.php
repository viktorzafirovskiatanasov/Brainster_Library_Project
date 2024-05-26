<?php


include_once './autoload.php';
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookId = $_POST['bookId'];
    $book = Book::getBook($bookId);
    $html = '';
   

    $html .= '<div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-0 mx-auto text-gray-800 relative md:text-left">';
    $html .= '<div class="md:flex items-center -mx-10">';
    $html .= '<div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">';
    $html .= '<div class="relative">';
    $html .= '<img src="' . $book[0]['image_url'] . '" class="w-full relative z-10" style="height : 500px; width: 500px" alt="">';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '<div class="w-full md:w-1/2 px-10">';
    $html .= '<div class="mb-10">';
    $html .= '<h1 class="font-bold uppercase text-2xl mb-5">' . $book[0]['title'] . '</h1>';
    $html .= '<p class="text-sm">Author: ' . $book[0]['name'] . ' ' . $book[0]['surrname'] . '</p>';
    $html .= '<p class="text-sm">Category: ' . $book[0]['category'] . '</p>';
    $html .= '<p class="text-sm">Pages: ' . $book[0]['pages_number'] . '</p>';
    $html .= '<p class="text-sm">Year: ' . $book[0]['publishing_year'] . '</p>';
    $html .= '</div>';
    $html .= '<div>';
    $html .= '<div class="inline-block align-bottom mr-5">';
    $html .= '</div>';
    $html .= '<div class="inline-block align-bottom">';
    $html .= '<button disabled class="bg-yellow-300  mr-2 hover:opacity-100 text-gray-900 rounded-full px-10 py-2 font-semibold"><i class="mdi mdi-cart -ml-2 mr-2"></i>READ BOOK </button>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    
 
    


    echo json_encode(['status' => 'success', 'data' => $html]);
}
