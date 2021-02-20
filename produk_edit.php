<?php

require 'config.php';

if(isset($_POST['edit_produk'])){
$id_produk = $_GET['id_produk'];
$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga_produk = $_POST['harga_produk'];
$foto_produk = $_FILES['foto_produk']['name'];

if(!empty($foto_produk)){
$rand_produk = rand(1,99);
$ekstensi_diperbolehkan = array('png','jpg','jpeg');
$x = explode('.', $foto_produk);
$ekstensi = strtolower(end($x));
$file_tmp = $_FILES['foto_produk']['tmp_name'];
$foto_produk2 = $rand_produk.'-'.$foto_produk;



if(in_array($ekstensi,$ekstensi_diperbolehkan) === true){
        move_uploaded_file($file_tmp,'img/'.$foto_produk2);
            mysqli_query($config,"update tb_penjualan set nama_produk='$nama_produk', deskripsi='$deskripsi',
            harga_produk='$harga_produk', foto_produk='$foto_produk2' where id_produk='$id_produk' ");
            header ("location:.");
    }else{
        echo "<script>alert('File Harus berbentuk png/jpg/jpeg');window.location='.';</script>";
    }
        }else{
            mysqli_query($config,"update tb_penjualan set nama_produk='$nama_produk', deskripsi='$deskripsi',
            harga_produk='$harga_produk' where id_produk='$id_produk' ");
            header ("location:.");
      }
}
?>