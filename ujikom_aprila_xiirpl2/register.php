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

<!-- Register -->
<div class="login-container">
    <div class="login-form">
        <h3>Register New Account</h3>
        <form action="config/aksi_register.php" method="POST">
            <div class="form-group">
                <input type="text" id="username" name="username" placeholder="Username" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" id="email" name="email" placeholder="Email" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" id="alamat" name="alamat" placeholder="Alamat" class="form-control" required>
            </div>
            <div class="d-grid mt-2">
                <button type="submit" class="btn" name="kirim">REGISTRASI</button>
            </div>
        </form>
        <div class="login-form">
            <p class="text-left">Have an Account? <a href="login.php">Login Here</a></p>
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
