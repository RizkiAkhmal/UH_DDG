<?php
if (isset($_GET['edit'])) {
    $index = $_GET['edit'];
    $books = json_decode(file_get_contents('books.json'), true);
    $book = $books[$index];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($_GET['edit']) ? 'Edit Buku' : 'Tambah Buku Baru'; ?></title>
</head>
<body>
    <h1><?php echo isset($_GET['edit']) ? 'Edit Buku' : 'Tambah Buku Baru'; ?></h1>
    <form method="POST" action= "addBook.php">
        <input type="hidden" name="index" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">
        
        <label>Judul:</label>
        <input type="text" name="judul" value="<?php echo isset($book['judul']) ? $book['judul'] : ''; ?>" required><br>
        
        <label>Pengarang:</label>
        <input type="text" name="pengarang" value="<?php echo isset($book['pengarang']) ? $book['pengarang'] : ''; ?>" required><br>
        
        <label>Tahun Terbit:</label>
        <input type="date" name="tahun" value="<?php echo isset($book['tahun']) ? $book['tahun'] : ''; ?>" required><br>
        
        <label>nama peminjam:</label>
        <input type="text" name="peminjam" value="<?php echo isset($book['peminjam']) ? $book['peminjam'] : ''; ?>" required><br>

        <label>Tanggal peminjaman:</label>
        <input type="date" name="tanggal_peminjaman" value="<?php echo isset($book['tanggal_peminjaman']) ? $book['tanggal_peminjaman'] : ''; ?>" required><br>

        <label>Tanggal Pengembalian:</label>
        <input type="date" name="tanggal_pengembalian" value="<?php echo isset($book['tanggal_pengembalian']) ? $book['tanggal_pengembalian'] : ''; ?>" required><br>

        <input type="submit" name="<?php echo isset($_GET['edit']) ? 'update' : 'submit'; ?>" value="<?php echo isset($_GET['edit']) ? 'Update' : 'Tambah'; ?>">
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

    if (isset($_POST['update'])) {
        $index = $_POST['index'];
        $books = json_decode(file_get_contents('books.json'), true);
        $books[$index] = [
            'judul' => $_POST['judul'],
            'pengarang' => $_POST['pengarang'],
            'tahun' => $_POST['tahun'],
            'peminjam' => $_POST['peminjam'],
            'tanggal_peminjaman' => $_POST['tanggal_peminjaman'],
            'tanggal_pengembalian' => $_POST['tanggal_pengembalian']
        ];
        file_put_contents('books.json', json_encode($books));

        echo "Buku berhasil diperbarui!";
        header("Location: index.php");
    }

    ?>
</body>
</html>
