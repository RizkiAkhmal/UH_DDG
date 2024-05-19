<?php
require_once "koneksi.php";
$sql = "SELECT * FROM uhddg";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku Baru</title>
</head>
<body>
    <h1>Tambah Buku Baru</h1>
    <form method="POST" action="addBook.php">
        <label>Judul:</label>
        <input type="text" name="judul" required><br>
        
        <label>Pengarang:</label>
        <input type="text" name="pengarang" required><br>
        
        <label>Tahun Terbit:</label>
        <input type="date" name="tahun" required><br>

        <label>nama peminjam:</label>
        <input type="text" name="peminjam" required><br>

        <label>Tanggal peminjaman:</label>
        <input type="date" name="tanggal_peminjaman"><br>

        <label>Tanggal Pengembalian:</label>
        <input type="date" name="tanggal_pengembalian"><br>
        
        <input type="submit" name="submit" value="Tambah">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $newBook = [
            'judul' => $_POST['judul'],
            'pengarang' => $_POST['pengarang'],
            'tahun' => $_POST['tahun'],
            'peminjam' => $_POST['peminjam'],
            'tanggal_peminjaman' => $_POST['tanggal_peminjaman'],
            'tanggal_pengembalian' => $_POST['tanggal_pengembalian']
        ];

        $books = json_decode(file_get_contents('books.json'), true);
        $books[] = $newBook;
        file_put_contents('books.json', json_encode($books));

        echo "Buku berhasil ditambahkan!";
        header("Location: index.php");
    }
    ?>
</body>
</html>
