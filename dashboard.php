<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="auth-box" style="width: 500px;">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>You are successfully authenticated using PostgreSQL.</p>
        <hr>
        <p><a href="logout.php" style="color:red;">Logout</a></p>
    </div>
</body>
</html>