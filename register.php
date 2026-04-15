<?php
require 'db.php';
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        try {
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->execute([$username, $hashed]);
            $message = "<div class='msg success'>Account created! <a href='login.php'>Login</a></div>";
        } catch (PDOException $e) {
            $message = "<div class='msg error'>Username already exists.</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="auth-box">
        <h2>Register</h2>
        <?php echo $message; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <p>Joined already? <a href="login.php">Login</a></p>
    </div>
</body>
</html>