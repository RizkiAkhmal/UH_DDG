<?php
require_once "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $books = json_decode(file_get_contents('books.json'), true);
    array_splice($books, $id, 1);
    file_put_contents('books.json', json_encode($books));
}

header("Location: index.php");
?>