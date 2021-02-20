<?php
require 'config.php';

$id_produk = $_GET['id_produk'];
mysqli_query($config,"delete from tb_penjualan where id_produk='$id_produk'");
header("location:.");

?>