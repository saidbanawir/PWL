<!-- Modal Tambah Produk -->
<div class="modal fade" id="tambah_produk" tabindex="-1" aria-labelledby="tambah_produkLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal">Tambah Data Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form method="post" enctype="multipart/form-data"  action="produk_add.php">
              <div class="form-group">
              <label>Id Produk</label>
              <?php $id_produk = rand(1000,9999); ?>
              <input type="text" name="id_produk" id="id_produk" value="<?php echo $id_produk ;?>" readonly class="form-control" required="true">
              </div>
              <div class="form-group">
              <label>Nama Produk</label>
              <input type="text" name="nama_produk" id="nama_produk" class="form-control" required="true">
              </div>
              <div class="form-group">
              <label>Harga</label>
              <input type="text" name="harga_produk" id="harga_produk" class="form-control" required="true">
              <div class="form-group">
              <label>Deskripsi</label>
              <textarea name="deskripsi" id="deskripsi" style="height:150px;" class="form-control" required="true"></textarea>
              </div>
              <div class="form-group">
              <label>Foto Produk</label>
              <input type="file" name="foto_produk" id="foto_produk" class="form-control">
              <small style="color:red;">Ekstensi yang diperbolehkan .png | .jpg | .jpeg</small>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="add_produk" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
    </div>
  </div>
</div>
<!-- Modal Read Produk -->
<div class="modal fade" id="read_produk<?php echo $qpenjualan2['id_produk']; ?>" tabindex="-1" aria-labelledby="edit_produkLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal">Read Data Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <?php
              $produk_read = mysqli_query($config,"select * from tb_penjualan where id_produk='".$qpenjualan2['id_produk']."'");
              $produk_read2 = mysqli_fetch_array($produk_read);
            ?>
            <form method="post" enctype="multipart/form-data">
              <div class="form-group">
              <label>Id Produk</label>
              <input type="text" name="id_produk" id="id_produk" value="<?php echo $produk_read2['id_produk'] ;?>" readonly class="form-control" required="true">
              </div>
              <div class="form-group">
              <label>Nama Produk</label>
              <input type="text" name="nama_produk" id="nama_produk" value="<?php echo $produk_read2['nama_produk'] ;?>" readonly class="form-control" required="true">
              </div>
              <div class="form-group">
              <label>Harga</label>
              <input type="text" name="harga_produk" id="harga_produk" value="<?php echo $produk_read2['harga_produk'] ;?>" readonly class="form-control" required="true">
              <div class="form-group">
              <label>Deskripsi</label>
              <textarea name="deskripsi" id="deskripsi" style="height:150px;" class="form-control"  readonly required="true"><?php echo $produk_read2['deskripsi'] ;?></textarea>
              </div>
              <div class="form-group">
              <label>Foto Produk</label><br>
              <img src="img/<?php echo $produk_read2['foto_produk'] ?>" width="250" height="250">
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
  </div>
</div>
<!-- Modal Edit Produk -->
<div class="modal fade" id="edit_produk<?php echo $qpenjualan2['id_produk']; ?>" tabindex="-1" aria-labelledby="read_produkLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal">Edit Data Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php
        $produk_edit = mysqli_query($config,"select * from tb_penjualan where id_produk='".$qpenjualan2['id_produk']."'");
        $produk_edit2 = mysqli_fetch_array($produk_edit);
      ?>
            <form method="post" enctype="multipart/form-data" action="produk_edit.php?id_produk=<?php echo $produk_edit2['id_produk']; ?>">
              <div class="form-group">
              <label>Id Produk</label>
              <input type="text" name="id_produk" id="id_produk" value="<?php echo $produk_edit2['id_produk'] ;?>" readonly class="form-control" required="true">
              </div>
              <div class="form-group">
              <label>Nama Produk</label>
              <input type="text" name="nama_produk" id="nama_produk" value="<?php echo $produk_edit2['nama_produk'] ;?>"  class="form-control" required="true">
              </div>
              <div class="form-group">
              <label>Harga</label>
              <input type="text" name="harga_produk" id="harga_produk" value="<?php echo $produk_edit2['harga_produk'] ;?>"  class="form-control" required="true">
              <div class="form-group">
              <label>Deskripsi</label>
              <textarea name="deskripsi" id="deskripsi" style="height:150px;" class="form-control"  required="true"><?php echo $produk_edit2['deskripsi'] ;?></textarea>
              </div>
              <div class="form-group">
              <label>Foto Produk</label><br>
              <img src="img/<?php echo $produk_edit2['foto_produk'] ?>" width="250" height="250">
              
              <input type="file" name="foto_produk" id="foto_produk" class="form-control">
              <small style="color:red;">Abaikan foto jika tidak ingin dirubah</small><br>
              <small style="color:red;">Ekstensi yang diperbolehkan .png | .jpg | .jpeg</small>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="edit_produk" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
    </div>
  </div>
</div>
<!-- Modal Hapus Produk -->
<div class="modal fade" id="hapus_produk<?php echo $qpenjualan2['id_produk']; ?>" tabindex="-1" aria-labelledby="hapus_produkLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal">Hapus Data Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php
        $produk_del = mysqli_query($config,"select * from tb_penjualan where id_produk='".$qpenjualan2['id_produk']."'");
        $produk_del2 = mysqli_fetch_array($produk_del);
      ?>
            <div class="container-fluid">
					<h5><center>Anda yakin akan menghapus <strong><?php echo $produk_del2['nama_produk']; ?></strong> ?</center></h5> 
              </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="produk_delete.php?id_produk=<?php echo $qpenjualan2['id_produk']; ?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
    </div>
  </div>
</div>