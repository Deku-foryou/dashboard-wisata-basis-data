<div class="container-fluid">
   <div class="card">
      <div class="card-header"><strong>Form tambah data</strong></div>
      <div class="card-body">
         <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
               <label>Judul Berita</label>
               <input
                  type="text"
                  class="form-control"
                  name="judul_berita"
                  placeholder="masukkan judul berita"
               />
            </div>
            <div class="form-group">
               <label>Konten Berita</label>
               <textarea class="form-control " name="konten_berita" id="" rows="3"></textarea>
            </div>
            <div class="form-group">
               <labe">Foto Berita</label>
              <br><input
                  type="file"
                  class="form-control-file"
                  name="foto_berita"
               />
             <br><small id="fileHelpId" class ="form-text text-muted">Upload file image (jpg,jpeg,png)</small>
            </div>
            <div class="form-group">
               <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
         </form>
      <?php
      if (isset($_POST['submit'])){
         $judul_berita = $_POST['judul_berita'];
         $konten_berita = $_POST['konten_berita'];

         $foto_berita = $_FILES['foto_berita']['name'];

         $file_extension = array('png','jpg','jpeg','gif');
         $extension = pathinfo($foto_berita, PATHINFO_EXTENSION);
         $size_foto_berita =$_FILES['foto_berita']['size'];
         $rand = rand();

         $penulis = $_SESSION['idadmin'];
         $tanggal = date('Y-m-d');

         if (!in_array($extension, $file_extension)){
            echo "<script>alert('file tidak didukung!'); window.location = 'dashboard.php?hal=tambah_berita</script>";
         }else{
            if ($size_foto_berita < 409600) {
               $nama_foto_berita = $rand.'_'.$foto_berita;

               move_uploaded_file($_FILES['foto_berita']['tmp_name'], '././img_berita/'.$nama_foto_berita);

               mysqli_query($koneksi, "INSERT INTO tbl_berita (judul_berita,id_admin_berita,tanggal_berita,konten_berita,foto_berita) VALUES ('$judul_berita','$penulis','$tanggal','$konten_berita','$nama_foto_berita')");

               echo "<script>alert('Berita berhasil di tambahkan!'); window.location = 'dashboard.php?hal=berita'</script>";
            }else{
               echo "<script>alert('ukuran File terlalu Besar!'); window.location = 'dashboard.php?hal=tambah_berita'</script>";
            }
         }
      }
      ?>
      </div>
   </div>
</div>