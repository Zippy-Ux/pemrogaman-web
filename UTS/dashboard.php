<?php
session_start();
require 'config/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<link rel="stylesheet" href="css/styleHome.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/script.js"></script>
<script>
    $(document).ready(function() {
    // Borrow book
    $('.borrow-btn').click(function() {
        var bookId = $(this).data('book-id');
        $.post('borrow.php', { book_id: bookId }, function(data) {
            if (data === 'success') {
                alert('Buku berhasil dipinjam!');
                location.reload(); // Refresh page to update book lists
            } else {
                alert('Buku sedang dipinjam!');
            }
        });
    });

    // Return book
    $('.return-btn').click(function() {
        var loanId = $(this).data('loan-id');
        $.post('return.php', { loan_id: loanId }, function(data) {
            if (data === 'success') {
                alert('Buku berhasil dikembalikan');
                location.reload(); // Refresh page to update book lists
            } else {
                alert('Error returning book!');
            }
        });
    });
});
</script>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Selamat Datang di Perpustakaan Infinite Insight</h1>
        <p>Welcome <?php echo htmlspecialchars($_SESSION['username']); ?> </p>
    </div>

    <div class="book-list">
    <h2>Available Books</h2>
    <?php
    $stmt = $pdo->query("SELECT * FROM books");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Check if the book is available
        $stmt_loan = $pdo->prepare("SELECT COUNT(*) AS borrowed FROM loans WHERE book_id = ? AND return_date IS NULL");
        $stmt_loan->execute([$row['id']]);
        $book_loan = $stmt_loan->fetch(PDO::FETCH_ASSOC);

        echo "<div>";
        echo "<p><strong>Title:</strong> " . htmlspecialchars($row['title']) . "</p>";
        echo "<p><strong>Author:</strong> " . htmlspecialchars($row['author']) . "</p>";
        if ($book_loan['borrowed'] > 0) {
            echo "<p><strong>Available:</strong> No</p>";
        } else {
            echo "<p><strong>Available:</strong> Yes</p>";
        }
        echo "<button class='borrow-btn' data-book-id='" . $row['id'] . "'>Borrow</button>";
        echo "</div>";
    }
    ?>
</div>

    <div class="borrowed-books">
        <h2>Your Borrowed Books</h2>
        <?php
        $stmt = $pdo->prepare("SELECT loans.id, books.title, books.author, loans.loan_date FROM loans JOIN books ON loans.book_id = books.id WHERE loans.user_id = ? AND loans.return_date IS NULL");
        $stmt->execute([$_SESSION['user_id']]);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div>";
            echo "<p><strong>Title:</strong> " . htmlspecialchars($row['title']) . "</p>";
            echo "<p><strong>Author:</strong> " . htmlspecialchars($row['author']) . "</p>";
            echo "<p><strong>Borrowed on:</strong> " . $row['loan_date'] . "</p>";
            echo "<button class='return-btn' data-loan-id='" . $row['id'] . "'>Return</button>";
            echo "</div>";
        }
        ?>
    </div>

    <a href="logout.php" class="button">Logout</a>
</div>
</body>
</html>
