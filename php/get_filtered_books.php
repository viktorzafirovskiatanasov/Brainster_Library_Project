<?php

include_once './autoload.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedAuthors = $_POST['selectedAuthors'] ?? array();
    $selectedCategories = $_POST['selectedCategories'] ?? array();
    $minPages = $_POST['minPages'] !== '' ? $_POST['minPages'] : null;
    $maxPages = $_POST['maxPages'] !== '' ? $_POST['maxPages'] : null;
    $minYear = $_POST['minYear'] !== '' ? $_POST['minYear'] : null;
    $maxYear = $_POST['maxYear'] !== '' ? $_POST['maxYear'] : null;


    $Books = Book::filterBooks($selectedAuthors, $selectedCategories, $minPages, $maxPages, $minYear, $maxYear);
    if (empty($Books)) {
        echo json_encode(['status' => 'error', 'message' => 'nothing matching your search was found please try a differents filters']);
    } else {

        $html = '';

        $colors = ['red', 'blue', 'yellow', 'purple'];

        foreach ($Books as $book) {

            $random_color = $colors[array_rand($colors)];

            $html .= '<article class="flex flex-col shadow-xl mx-auto max-w-sm bg-' . $random_color . '-300 py-20 px-12 transform duration-500 hover:-translate-y-2 cursor-pointer max-h-190 rounded-md">';
            $html .= '<div class="min-h-62">';
            $html .= '<img class="mx-auto mix-blend-color-multiply" src="' . $book['image_url'] . '" alt="" />';
            $html .= '</div>';
            $html .= '<h1 class="font-extrabold text-6xl mt-28 mb-10 text-gray-800">' . $book['title'] . '</h1>';
            $html .= '<h2 class="font-bold mb-5 text-gray-800">By ' . $book['name'] . ' ' . $book['surrname'] . '</h2>';
            $html .= '<p class="text-sm leading-relaxed text-gray-700">';
            $html .= 'Publishing year: ' . $book['publishing_year'] . '<br>';
            $html .= 'Number of pages: ' . $book['pages_number'] . '<br>';
            $html .= 'Category: ' . $book['category'];
            $html .= '</p>';
            $html .= '<button class="mt-5 py-2 px-5 bg-emerald-400 rounded-lg">See More</button>';
            $html .= '</article>';
        }

        echo json_encode(['status' => 'success', 'data' => $html]);
    }
}
