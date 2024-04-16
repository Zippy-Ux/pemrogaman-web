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
<link rel="stylesheet" href="styleHome.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="dashboard_jquery.js"></script>
<script>
        $(document).ready(function() {
        // Kembalikan buku
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
        <h1>Sistem Manajemen Peminjaman dan Pengembalian Buku Perpustakaan</h1>
        <p>Welcome <?php echo htmlspecialchars($_SESSION['username']); ?> </p>
    </div>

    <div class="book-list">
    <h2>Available Books</h2>
    <?php
    $stmt = $pdo->query("SELECT * FROM books");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Mengecek buku yang masih ada
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
        echo "</div>";
    }
    ?>
    
    <div class="loan-form">
    <h2>Borrow Book</h2>
    <form action="borrow.php" method="post">
        <label for="borrow-date">Borrow Date:</label>
        <input type="date" id="borrow-date" name="borrow_date" required>

        <label for="return-date">Return Date:</label>
        <input type="date" id="return-date" name="return_date" required>

        <select name="book_id">
            <?php
            $stmt = $pdo->query("SELECT * FROM books WHERE available = 1");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['title']) . "</option>";
            }
            ?>
        </select>

        <button type="submit" name="borrow">Borrow</button>
    </form>
</div>

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
