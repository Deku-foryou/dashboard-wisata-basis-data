<div class="container-fluid">
   <div class="card">
      <div class="card-header">
         <strong>Form Ubah Data</strong>
      </div>
      <div class="card-body">
         <?php
         $id = $_GET['id'];
         $sql = mysqli_query($koneksi, "SELECT * FROM tbl_wisata WHERE id_wisata='$id'");
         $r = mysqli_fetch_array($sql);
         ?>
         <form action="" method="POST">
            <div class="form-group">
               <label >Nama Wista</label>
               <input type="text" class="form-control" name="nama_wisata" value="<?php echo $r['nama_wisata']; ?>">
            </div>
            <div class="form-group">
               <label>Kategori Wisata</label>
               <select name="id_kategori" class="form-control">
                  <?php 
                  if($r['id_kategori'] == 0){?>
                     <option value="0"  selected>--Pilih Kategori Wisata--</option>
                  <?php
                  }

                  $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                  while($a = mysqli_fetch_array($tampil)){
                     if($r['id_kategori'] == $a['id_kategori']) {?>
                     <option value="<?php echo $a['id_kategori']?>" selected><?php echo $a['nama_kategori']?></option>
                     <?php
                  }else{ ?>
                     <option value="<?php echo $a['id_kategori']?>"><?php echo $a['nama_kategori']?></option>
                     <?php
                  }
                  }

                  ?>
                  
               </select>
            </div>
            <div class="form-group">
               <label >Lokasi Wista</label>
               <input type="text" class="form-control" name="lokasi_wisata" value="<?php echo $r['lokasi_wisata']; ?>">
            </div>
            <div class="form-group">
               <label>Link peta</label>
               <textarea name="link_peta" class="form-control" rows="4"><?php echo $r['link_peta']?></textarea>
            </div>
            <div class="form-group">
               <label>Deskripsi</label>
               <textarea name="deskripsi" class="form-control" rows="5" ><?php echo $r['deskripsi']?></textarea>
            </div>
            <div class="form-group mt-3">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
         </form>
         <?php
         if (isset($_POST['submit'])){
            $nama_wisata = $_POST['nama_wisata'];
            $id_kategori = $_POST['id_kategori'];
            $lokasi_wisata = $_POST['lokasi_wisata'];
            $link_peta = $_POST['link_peta'];
            $deskripsi = $_POST['deskripsi'];

            mysqli_query($koneksi, "UPDATE tbl_wisata SET nama_wisata= '$nama_wisata',
                                                          id_kategori= '$id_kategori',
                                                          lokasi_wisata= '$lokasi_wisata',
                                                          link_peta= '$link_peta',
                                                          deskripsi= '$deskripsi'
                                                      WHERE id_wisata = '$id'");
            
            echo "<script>alert('Wisata Berhasil Diubah!'); window.location='dashboard.php?hal=wisata'</script>";

         }
         
         ?>
      </div>
   </div>
</div>