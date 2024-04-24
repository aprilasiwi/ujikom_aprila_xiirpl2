<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Login -->
<div class="login-container">
    <div class="login-form">
        <h2>Login Aplikasi</h2>
        <form action="config/aksi_login.php" method="POST">
            <div class="form-group">
                <input type="text" id="username" name="username" placeholder="Username" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password" class="form-control" required>
            </div>
            <button type="submit" class="btn" name="kirim">LOGIN</button>
        </form>
        <div class="login-form">
            Don't have an Account? <br><a href="register.php">Register Here</a>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="d-flex justify-content-center border-top mt-3 fixed-bottom">
    <p>&copy; Ujikom | Aprilasiwi XII RPL-2</p>
</footer>

<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
