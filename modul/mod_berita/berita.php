<div class="container-fluid">
   <div class="card">
      <div class="card-header">
        <a href="dashboard.php?hal=tambah_berita" class="btn  btn-primary"><i class="bi bi-plus-circle-fill"></i> Update</a>
      </div>
         <div class="card-body">
            <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>Judul berita</th>
                <th>Penulis</th>
                <th>Tanggal Upload</th>
                <th>Gambar</th>
               <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
         <?php
         $sql = mysqli_query($koneksi, "SELECT * FROM tbl_berita, tbl_admin WHERE tbl_berita.id_admin_berita=tbl_admin.id_admin ");
         while($r = mysqli_fetch_array($sql)){
         
         ?>
            <tr>
                <td></td>
                <td><?php echo $r['judul_berita']?></td>
                <td><?php echo $r['nama_admin']?></td>
                <td><?php echo date('d-m-Y', strtotime($r['tanggal_berita']))?></td>
                <td><img src="././img_berita/<?php echo $r['foto_berita']?>" height="100" widht=""></td>
                <td><a class="btn btn-danger" title="hapus" href="dashboard.php?hal=hapus_berita&id=<?php echo $r['id_berita'] ?>"><i class="bi bi-trash-fill"></i></a></td>
            </tr>

           <?php
         }
           ?>


        </tbody>
    </table>
            </table>
         
      </div>
   </div>
</div>