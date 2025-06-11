<div class="container">
   <div class="row">
      <div class="col-md-12 border">
         <div class="card-group">

         <!-- card-Galeri -->
            <div class="card text-bg-primary rounded-lg mb-3 m-2" style="max-width: 18rem;">
                 <div class="card-body">
                  <?php
                  $sql_galeri = mysqli_query($koneksi, "SELECT * FROM tbl_galeri");
                  $jumlah_galeri = mysqli_num_rows($sql_galeri);
                  ?>
                   <h1 class="card-title"><?php echo $jumlah_galeri; ?></h1>
                   <p class="card-text">Total Data Galeri</p>
                 </div>
                 <div class="card-footer text-center "><a class="text-white text-decoration-none" href="dashboard.php?hal=galeri" >Lihat Data  <i class="bi bi-arrow-right-circle-fill"></i></a></div>
               </div>


               <!-- card-wisata -->
            <div class="card text-bg-success mb-3 m-2" style="max-width: 18rem;">
                 <div class="card-body">
                  <?php
                  $sql_wisata = mysqli_query($koneksi, "SELECT * FROM tbl_wisata");
                  $jumlah_wisata = mysqli_num_rows($sql_wisata);
                  ?>
                   <h1 class="card-title"><?php echo $jumlah_wisata?></h1>
                   <p class="card-text">Total Data Wisata</p>
                 </div>
                 <div class="card-footer text-center "><a class="text-white text-decoration-none" href="dashboard.php?hal=wisata" >Lihat Data  <i class="bi bi-arrow-right-circle-fill"></i></a></div>
               </div>


               <!-- card-kategori -->
            <div class="card text-bg-danger mb-3 m-2" style="max-width: 18rem;">
                 <div class="card-body">
                  <?php
                  $sql_kategori = mysqli_query($koneksi, "SELECT * FROM tbl_kategori");
                  $jumlah_kategori = mysqli_num_rows($sql_kategori);
                  ?>
                   <h1 class="card-title"><?php echo $jumlah_kategori?></h1>
                   <p class="card-text">Total Data Kategori</p>
                 </div>
                 <div class="card-footer text-center "><a class="text-white text-decoration-none" href="dashboard.php?hal=kategori" >Lihat Data  <i class="bi bi-arrow-right-circle-fill"></i></a></div>
               </div>


               <!-- card-berita -->
            <div class="card text-bg-info text-white mb-3 m-2" style="max-width: 18rem;">
                 <div class="card-body">
                  <?php
                  $sql_berita = mysqli_query($koneksi, "SELECT * FROM tbl_berita");
                  $jumlah_berita = mysqli_num_rows($sql_berita);
                  ?>
                   <h1 class="card-title"><?php echo $jumlah_berita?></h1>
                   <p class="card-text">Total Data Berita</p>
                 </div>
                 <div class="card-footer text-center "><a class="text-white text-decoration-none" href="dashboard.php?hal=berita" >Lihat Data  <i class="bi bi-arrow-right-circle-fill"></i></a></div>
               </div>
               
         </div>
      </div>
   </div>

  <div class="row border mt-2">
  <div class="col-md-6">
    <canvas id="grafikWisata" class="mt-3" style="width:100%; max-width:600px;"></canvas>
  </div>
  <div class="col-md-6">
    <canvas id="grafikGaleri" class="mt-3" style="width:100%; max-width:600px;"></canvas>
  </div>
</div>

<div class="row mt-4">
  <div class="col-md-6">
    <table class="table table-sm table-bordered mt-2z">
      <thead>
        <tr>
          <th>No</th>
          <th>Wisata</th>
          <th>Kategori</th>
          <th>Lokasi</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <?php 
        $query_wisata = mysqli_query($koneksi, "SELECT * FROM tbl_wisata, tbl_kategori WHERE tbl_wisata.id_kategori=tbl_kategori.id_kategori ORDER BY tbl_wisata.id_wisata DESC LIMIT 5");
        $no = 1;
        while($r = mysqli_fetch_array($query_wisata)) { ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $r['nama_wisata'] ?></td>
            <td><?php echo $r['nama_kategori'] ?></td>
            <td><?php echo $r['lokasi_wisata'] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <div class="col-md-6">
    <table class="table table-sm table-bordered mt-2z">
      <thead>
        <tr>
          <th>No</th>
          <th>Judul Berita</th>
          <th>Penulis Berita</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <?php 
        $query_berita = mysqli_query($koneksi, "SELECT * FROM tbl_berita, tbl_admin WHERE tbl_berita.id_admin_berita=tbl_admin.id_admin ORDER BY tbl_berita.id_berita DESC LIMIT 5");
        $no = 1;
        while($a = mysqli_fetch_array($query_berita)) { ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $a['judul_berita'] ?></td>
            <td><?php echo $a['nama_admin'] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

</div>
