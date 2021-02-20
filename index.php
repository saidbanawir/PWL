<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <title>18.11.2343 | Remedi</title>
</head>
<body>  
<?php session_start();
error_reporting(0);
       if($_SESSION['status']=='login'){ 
?>
<nav class="navbar justify-content-end navbar-light" style="background-color: #00B5ED;">
  <a href="logout.php" id="btn_logout" class="btn btn-danger">Logout</a>
</nav>
<?php }else{ ?>
    <nav class="navbar justify-content-end navbar-light" style="background-color: #00B5ED;">
  <a href="login.php" id="btn_login" class="btn btn-danger">Login</a>
</nav>
<?php } ?>

<?php if($_SESSION['status']=='login'){?>
    <div>
    <button type="button" class="btn btn-success" id="btn_tambah" title="Tambah Produk" data-bs-toggle="modal" data-bs-target="#tambah_produk">
    <span class="fas fa-plus-circle"></span>Tambah</button>
    </div>
    <?php }?>
 
<div class="container-fluid">

<div class="table-responsive">
<table class="table table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>ID Produk</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Deskripsi</th>
        <th>Foto</th>
        <th colspan="3">Aksi</th>
    </tr>
    </thead>
    <?php
        $no = 1;
        $num_char = 50;
        $qpenjualan = mysqli_query($config,"select * from tb_penjualan");
        while($qpenjualan2 = mysqli_fetch_array($qpenjualan)){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $qpenjualan2['id_produk']; ?></td>
        <td><?php echo $qpenjualan2['nama_produk']; ?></td>
        <td>Rp. <?php echo number_format($qpenjualan2['harga_produk'],0, ".","."); ?></td>
        <td><?php echo substr($qpenjualan2['deskripsi'],0,$num_char) .'...'; ?></td>
        <td><img src="img/<?php echo $qpenjualan2['foto_produk'] ?>" width="50" height="50"></td>
        <td>
            <a href="#read_produk<?php echo $qpenjualan2['id_produk']; ?>" data-bs-toggle="modal" class="btn btn-info btn-sm" title="Read"><span class="fas fa-eye"></span></a>
            <?php if($_SESSION['status']=='login'){?>
            <a href="#edit_produk<?php echo $qpenjualan2['id_produk']; ?>" data-bs-toggle="modal" class="btn btn-warning btn-sm" title="Edit"><span class="fas fa-edit"></span></a>
            <a href="#hapus_produk<?php echo $qpenjualan2['id_produk']; ?>" data-bs-toggle="modal" class="btn btn-danger btn-sm" title="Hapus"><span class="fas fa-trash-alt"></span></a>
           <?php } ?>
        </td>
    </tr>
    <?php include('modal.php'); } ?>
</table>
</div>
</div>
</body>

</html>
