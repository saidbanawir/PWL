<?php

require 'config.php';

$id_produk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga_produk = $_POST['harga_produk'];
$foto_produk = $_FILES['foto_produk']['name'];

$rand_produk = rand(1,99);
$ekstensi_diperbolehkan = array('png','jpg','jpeg');
$x = explode('.', $foto_produk);
$ekstensi = strtolower(end($x));
$file_tmp = $_FILES['foto_produk']['tmp_name'];
$foto_produk2 = $rand_produk.'-'.$foto_produk;



if(in_array($ekstensi,$ekstensi_diperbolehkan) === true){
        move_uploaded_file($file_tmp,'img/'.$foto_produk2);
    
        $qadd_produk =mysqli_query($config,"insert into tb_penjualan values('$id_produk','$nama_produk','$deskripsi',
        '$harga_produk','$foto_produk2')");
        header ("location:.");
    }else{
        echo "<script>alert('File Harus berbentuk png/jpg/jpeg');window.location='.';</script>";
    
}
?>