<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #86b8ff;
            display: flex;
            justify-content: right;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 150px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 50px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #86b8ff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #000;
        }

        a {
            color: #5cb85c;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        #message {
            font-size: 14px;
            margin-bottom: 20px;
        }

        .header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        padding: 3rem 9%;
        background-color: #86b8ff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        backdrop-filter: blur(10px);
        box-shadow: 0 0 10px 2px;
        z-index: 100;
        }

        .welcome {
            font-size: 40px;
            color: #000;
        }

        .image {
            size: 10px;
        }
    </style>
</head>
<body>
        <img class="image" src="pp-.png" alt="">
    <div class="header">
        <span class="welcome">Welcome</span>
    </div>
    <div class="container">
        <h2>Login Form</h2>
        <p id="message" style="<?= isset($_SESSION['message']) && $_SESSION['message'] == 'Akun berhasil dibuat' ? 'color:green;' : 'color:red;' ?>">
            <?= isset($_SESSION['message']) ? htmlspecialchars($_SESSION['message'], ENT_QUOTES, 'UTF-8') : '' ?>
        </p>
        <form method="post" id="login_form" action="login_process.php">
            <label for="nama_atau_email"><b>Nama atau email</b></label><br>
            <input type="text" id="nama_atau_email" size="30" placeholder="Masukkan nama atau email" name="username"><br>
            <label for="password"><b>Kata sandi</b></label><br>
            <input type="password" id="password" size="30" placeholder="Masukkan kata sandi" name="password"><br>
            <input type="submit" id="submit" value="Login">
        </form>
        <p>Belum Memiliki Akun Silahkan <a href="signup.php">Daftar</a></p>
    </div>
</body>
</html>
<?php $_SESSION['message'] = ''; ?>
