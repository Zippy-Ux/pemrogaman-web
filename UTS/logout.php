<?php
session_start();
session_unset();
session_destroy();
setcookie("loggedIn", "", time() - 3600); // Menghapus cookie
header("Location: index.php");
exit;
?>
