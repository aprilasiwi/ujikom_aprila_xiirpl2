<?php
session_start();
$user_id = $_SESSION['user_id'];
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda belum Login!');
    location.href='../index.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg" style="background-color : #3498db;">
        <div class="container mt-2 mb-2">
            <a class="navbar-brand text-light" href="index.php"><i class="fas fa-moon" style="margin-right : 10px;"></i><strong>Galeri Foto</strong>
            <button class="navbar-toggler" type="button" data-bs-theme="dark" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
            <div class="navbar-nav me-auto">
            <a href="home.php" class="nav-link text-light">Home</a>
            <a href="foto.php" class="nav-link text-light">Foto</a>
            </div>
            <a href="../config/aksi_logout.php" class="btn btn-danger m-1">Logout</a>
    </div>
  </div>
</nav>

<!-- Tambah Foto -->
      <div class="container">
        <div class="row">
          <div class="col-ms-4">
            <div class="card mt-2">
              <div class="card-header text-light" style="background-color : #3498db;">Tambah Foto</div>
              <div class="card-body" style="background-color : #daecff">
                <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                  <label class="form-label">Judul Foto</label>
                  <input type="text" name="judul_foto" class="form-control" required>
                  <label class="form-label">Deskripsi</label>
                  <textarea class="form-control" name="deskripsi_foto" required></textarea>

                  </select>
                  <label class="form-label">File</label>
                  <input type="file" class="form-control" name="lokasi_file" required>
                  <button type="submit" class="btn btn-info mt-2" name="tambah">Tambah Data</button>
                </form>
              </div>
            </div>
          </div>

<!-- Data Galeri Foto -->
          <div class="col-ms-8">
            <div class="card mt-2">
                <div class="card-header text-light" style="background-color : #3498db;">Data Galeri Foto</div>
                <div class="card-body" style="background-color : #daecff">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Judul Foto</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            $user_id = $_SESSION['user_id'];
                            $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE user_id = '$user_id'");
                            while($data = mysqli_fetch_array($sql)){
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><img src="../assets/img/<?php echo $data['lokasi_file'] ?>" width="100"></td>
                                <td><?php echo $data['judul_foto'] ?></td>
                                <td><?php echo $data['deskripsi_foto'] ?></td>
                                <td><?php echo $data['tanggal_unggah'] ?></td>
                                <td> 
                                  <button type="button" class="btn btn-info"  data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['foto_id'] ?>">
                                    Edit
                                  </button>

                                  <div class="modal fade" id="edit<?php echo $data['foto_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="foto_id" value="<?php echo $data['foto_id'] ?>">
                                            <label class="form-label">Judul Foto</label>
                                            <input type="text" name="judul_foto" value="<?php echo $data['judul_foto'] ?>" class="form-control" required>
                                            <label class="form-label">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi_foto" required><?php echo $data['deskripsi_foto'] ?></textarea>
                                            
                                          
                                            </select>
                                            <label class="form-label">Foto</label>
                                            <div class="row">
                                              <div class="col-md-4">
                                                <img src="../assets/img/<?php echo $data['lokasi_file'] ?>" width="100">
                                              </div>
                                              <div class="col-md-8">
                                                <label class="form-label">Ganti File</label>
                                                <input type="file" class="form-control" name="lokasi_file">
                                              </div>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" name="edit" class="btn btn-info">Edit Data</button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['foto_id'] ?>">
                                    Hapus
                                  </button>

                                  <div class="modal fade" id="hapus<?php echo $data['foto_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <form action="../config/aksi_foto.php" method="POST">
                                            <input type="hidden" name="foto_id" value="<?php echo $data['foto_id'] ?>">
                                            Apakah anda yakin akan menghapus data <strong>  <?php echo $data['judul_foto'] ?> </strong> ?

                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" name="hapus" class="btn btn-info">Hapus Data</button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                </td>
                            </tr>
                               <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>

