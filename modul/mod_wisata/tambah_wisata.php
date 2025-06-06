<div class="container-flluid">
   <div class="card">
      <div class="card-header"></div>
         <div class="card-body">
            <form action="" method="POST">
                     <div class="form-group">
            <label>Nama wisata</label>
            <input type="text" class="form-control" name="nama_wisata" placeholder="masukkan nama wisata">
             </div>
             <div class="form-group">
               <label>Kategori Wisata</label>
                  <select class="form-control" name="id_kategori">
             <option value="0" selected>--Pilih Kategori Wisata--</option>
             <?php
             $sql =mysqli_query($koneksi, "SELECT * FROM tbl_kategori ORDER BY id_kategori ASC");
             while($r =mysqli_fetch_array($sql)){?>
              <option value="<?php echo$r['id_kategori']?>"><?php echo $r['nama_kategori'] ?></option>
             <?php
             }
             ?>
             </select>
            </div>
             <div class="form-group">
            <label>Lokasi wisata</label>
            <input type="text" class="form-control" name="lokasi_wisata" placeholder="masukkan lokasi wisata">
             </div>
             <div class="mb-3">
               <label >Link Peta</label>
               <textarea class="form-control" name="link_peta" rows="2" placeholder="Masukkan link Peta"></textarea>
             </div>
              <div class="mb-3">
               <label >Deskripsi</label>
               <textarea class="form-control" name="deskripsi" rows="3" placeholder="Masukkan Deskkripsi"></textarea>
             </div>
             <div class="form-group" >
               <button type="submmit" name="submit" class="btn btn-primary">Submit</button>
             </div>
                  </form>
                  <?php
                  if(isset($_POST['submit'])){
                     $nama_wisata = $_POST['nama_wisata'];
                     $id_kategori = $_POST['id_kategori'];
                     $lokasi_wisata = $_POST['lokasi_wisata'];
                     $link_peta = $_POST['link_peta'];
                     $deskripsi = $_POST['deskripsi'];

                     mysqli_query($koneksi, "INSERT INTO tbl_wisata (nama_wisata,id_kategori,lokasi_wisata,link_peta,deskripsi) VALUES ('$nama_wisata','$id_kategori','$lokasi_wisata','$link_peta','$deskripsi')");

                     echo"<script>alert('Wisata berhasil ditambahkan!'); window.location = 'dashboard.php?hal=wisata'</script>";

                  }
                  ?>
         </div>
      </div>
   </div>