
<div class="container-fluid">
   <div class="card">
      <div class="card-header"><strong>Form Tambah Data Galeri</strong></div>
      <div class="card-body">
         <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
               <label>Keterangan Foto</label>
               <textarea name="keterangan_foto" rows="2" class="form-control" placeholder="Masukkan Keterangan Foto" required></textarea>
            </div>
            <div class="form-group">
               <label>Nama Wisata</label>
               <select name="id_wisata" class="form-control" required>
                  <option value="" disabled selected>-- Pilih Wisata --</option>
                  <?php
                  $sql = mysqli_query($koneksi, "SELECT * FROM tbl_wisata ORDER BY id_wisata ASC");
                  while ($r = mysqli_fetch_array($sql)) { ?>
                     <option value="<?php echo $r['id_wisata'] ?>"><?php echo $r['nama_wisata'] ?></option>
                  <?php } ?>
               </select>
            </div>
            <div class="form-group mt-2">
               <label>Foto</label>
               <br>
               <input type="file" name="nama_foto" class="form-control-file" accept=".jpg,.jpeg,.png,.gif" required>
            </div>
            <div class="form-group mt-3">
               <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
         </form>

         <?php
         if (isset($_POST['submit'])) {
            $keterangan_foto = $_POST['keterangan_foto'];
            $id_wisata = $_POST['id_wisata'];
            $file = $_FILES['nama_foto'];

            // Validasi wisata
            if (empty($id_wisata)) {
               echo "<script>alert('Silakan pilih wisata terlebih dahulu!'); window.location='dashboard.php?hal=tambah_galeri'</script>";
               exit;
            }

            // Validasi keberadaan wisata di DB (opsional tapi aman)
            $cek_wisata = mysqli_query($koneksi, "SELECT * FROM tbl_wisata WHERE id_wisata='$id_wisata'");
            if (mysqli_num_rows($cek_wisata) == 0) {
               echo "<script>alert('Data wisata tidak valid!'); window.location='dashboard.php?hal=tambah_galeri'</script>";
               exit;
            }

            // Validasi file
            $nama_foto = $file['name'];
            $tmp_foto = $file['tmp_name'];
            $ukuran_foto = $file['size'];
            $ext = strtolower(pathinfo($nama_foto, PATHINFO_EXTENSION));

            $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($ext, $allowed_ext)) {
               echo "<script>alert('Ekstensi file tidak didukung!'); window.location='dashboard.php?hal=tambah_galeri'</script>";
               exit;
            }

            if ($ukuran_foto > 409600) { // 400 KB
               echo "<script>alert('Ukuran file terlalu besar! Maksimal 400KB.'); window.location='dashboard.php?hal=tambah_galeri'</script>";
               exit;
            }

            // Upload file
            $nama_foto_baru = uniqid() . '_' . $nama_foto;
            $path_upload = './img_galeri/' . $nama_foto_baru;

            if (move_uploaded_file($tmp_foto, $path_upload)) {
               // Insert ke database
               $query = "INSERT INTO tbl_galeri (keterangan_foto, id_wisata, nama_foto)
                         VALUES ('$keterangan_foto', '$id_wisata', '$nama_foto_baru')";
               mysqli_query($koneksi, $query);

               echo "<script>alert('Galeri berhasil ditambahkan!'); window.location='dashboard.php?hal=galeri'</script>";
            } else {
               echo "<script>alert('Upload file gagal!'); window.location='dashboard.php?hal=tambah_galeri'</script>";
            }
         }
         ?>
      </div>
   </div>
</div>
