<?php
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['message'] = "Anda harus login terlebih dahulu";
    header("location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Halaman Setelah Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #86b8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 100px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 30px;
            color: #86b8ff;
        }

        a {
            color: #000;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        #message {
            font-size: 14px;
            margin-bottom: 20px;
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Selamat Datang, <?php echo htmlspecialchars($_SESSION['user'], ENT_QUOTES, 'UTF-8'); ?></h2>
        <?php if (isset($_SESSION['message']) && $_SESSION['message'] != ''): ?>
            <p id="message"><?php echo htmlspecialchars($_SESSION['message'], ENT_QUOTES, 'UTF-8'); ?></p>
            <?php $_SESSION['message'] = ''; ?>
        <?php endif; ?>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
