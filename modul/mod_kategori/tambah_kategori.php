<div class="container-fluid">
   <div class="card">
      <div class="card-header"><strong>Form Tambah Data</strong></div>
      <div class="card-body">
         <form action="" method="POST">
            <div class="form-group">
               <label>Kategori</label>
               <input
                  type="text"
                  class="form-control"
                  name="nama_kategori"
                  placeholder="Masukkan Kategori!"
               />
            </div>
            <div class="form-group">
               <label>Keterangan</label>
               <textarea class="form-control" name="keterangan" id="" rows="3" placeholder="masukkan keterangan"></textarea>
            </div>
            <div class="form-group mt-3">
               <button
                  type="submit"
                  class="btn btn-primary"
                  name="submit"
               >
                  Submit
               </button>
            </div>
         </form>
         <?php
         if (isset($_POST['submit'])) {
            $nama_kategori = $_POST['nama_kategori'];
            $keterangan = $_POST['keterangan'];

            mysqli_query($koneksi, "INSERT INTO tbl_kategori (nama_kategori, keterangan) VALUES ('$nama_kategori', '$keterangan')");

            echo"<script>alert('Kategori Berhasil ditambahkan!'); window.location = 'dashboard.php?hal=kategori'</script>";
         }
         ?>
      </div>
   </div>
</div>