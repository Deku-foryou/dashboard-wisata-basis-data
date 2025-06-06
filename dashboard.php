<?php
require_once"koneksi.php";

date_default_timezone_set('asia/jakarta');

session_start();
if(empty($_SESSION['username']) and empty($_SESSION['password']) ){
   echo '
   <center>
   <br><br><br><br><br><br><br><br><br><br><br><br><br>
   <b>maaf, silahkan melakukan login!</b><br><br>
   <b> anda telah keluar dari sistem</b><br>
   <b> atau anda belum melakukan login!</b><br>
   <a href="index.php" title="Klik gambar ini untuk kembali ke halaman loogin"><img src="image/knc.png" height="100" widht="100"></a>
   </center>
   ';
}else{
?>


<!doctype html>
<html lang="en">
   <head>
      <title>.:Dashboard - <?php echo ucwords(str_replace('_',' ', $_GET['hal']))?></title>
      <!-- Required meta tags -->
      <meta charset="utf-8" />
      <meta
         name="viewport"
         content="width=device-width, initial-scale=1, shrink-to-fit=no"
      />

      <link
         href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
         rel="stylesheet"
         integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
         crossorigin="anonymous"/>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.css">
      <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/45.1.0/ckeditor5.css">

      <!-- Bootstrap CSS v5.2.1 -->
      <link rel="stylesheet" href="css/dashboard.css">
       
   </head>

   <body>
     <div class="container-fluid">
      <div
         class="row">
         <div class="col-lg-12 py-3 bg-primary fixed-top">
            <div class="dropdown d-flex justify-content-end" >
  <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i>
    User
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#"><div class="media">
  <img src="image/icon.jpg" height="30px" width="30px" class="img-fluid d-block mx-auto mr-3" alt="...">
  <div class="media-body">
    <h5 class="mt-0 d-flex flex-column align-items-center"> <?php echo $_SESSION['namaadmin'] ?></h5>
    <small><p class="mb-0"> <i class="bi bi-clock-history"></i> <?php echo date('H:i:s')?> WIB</p></small>
  </div>
</div>
</a></li>
    <li><a class="dropdown-item" href="dashboard.php?hal=user"> <i class="bi bi-gear-wide-connected" ></i>  Setting</a></li>
    <li><a class="dropdown-item" href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?')"> <i class="bi bi-box-arrow-left"></i>   Log Out</a></li>
  </ul>
</div>
         </div>
      </div>
      <div class="row nav ">
        <div class="col-2 position-fixed vh-100">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link <?php echo ($_GET['hal'] == 'home') ? "active":"" ?>"
      href="dashboard.php?hal=home">Home</a>
      <a class="nav-link <?php echo ($_GET['hal'] == 'profil') ? "active":"" ?>" 
      href="dashboard.php?hal=profil">Profile</a>
      <a class="nav-link <?php echo ($_GET['hal'] == 'galeri') ? "active":"" ?>" 
      href="dashboard.php?hal=galeri">Gallery</a>
      <a class="nav-link <?php echo (($_GET['hal'] == 'wisata') or ($_GET['hal'] == 'tambah_wisata')) ? "active":"" ?>"
      href="dashboard.php?hal=wisata">Wisata</a>
      <a class="nav-link <?php echo (($_GET['hal'] == 'kategori') or ($_GET['hal'] == 'tambah_kategori') or($_GET['hal'] == 'edit_kategori')) ? "active":"" ?>"
      href="dashboard.php?hal=kategori">Kategori</a>
      <a class="nav-link <?php echo (($_GET['hal'] == 'berita') or ($_GET['hal'] == 'tambah_berita')) ? "active":"" ?>" 
      href="dashboard.php?hal=berita">Berita</a>


    </div>
  </div>
         <div class="col-10 mt-5 offset-2">

         <?php
         if (isset($_GET['hal'])){

            switch($_GET['hal']){
               case 'home':
                  include 'modul/mod_home/home.php';
                  break;
               case 'profil':
                  include 'modul/mod_profil/profil.php';
                  break;
               case 'galeri':
                  include 'modul/mod_galeri/galeri.php';
                  break;
               case 'wisata':
                  include 'modul/mod_wisata/wisata.php';
                  break;
               case 'tambah_wisata':
                  include 'modul/mod_wisata/tambah_wisata.php';
                  break;
               case 'kategori':
                  include 'modul/mod_kategori/kategori.php';
                  break;
               case 'tambah_kategori':
                  include 'modul/mod_kategori/tambah_kategori.php';
                  break;
               case 'berita':
                  include 'modul/mod_berita/berita.php';
                  break;
               case 'tambah_berita':
                  include 'modul/mod_berita/tambah_berita.php';
                  break;
               case 'edit_kategori':
                  include 'modul/mod_kategori/edit_kategori.php';
                  break;
               case 'hapus_kategori':
                  include 'modul/mod_kategori/hapus_kategori.php';
                  break;
                case 'hapus_berita':
                  include 'modul/mod_berita/hapus_berita.php';
                  break;
               case 'user':
                  include 'modul/mod_user/user.php';
                  break;
               default:
                  echo "<h3>Halaman tidak ada kocakkk!</h3>";
            }
         }else{
            header("location:dashboard.php?hal=home");
         }
         ?>
            </div>
         </div>
      </div>
   </div>
      <!-- Bootstrap JavaScript Libraries -->
      <script
         src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
         integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
         crossorigin="anonymous"
      ></script>

      <script
         src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
         integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
         crossorigin="anonymous"
      ></script>

      <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
      <script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>
      <script src="https://cdn.ckeditor.com/ckeditor5/45.1.0/ckeditor5.umd.js"></script>
      <script>
               const table = new DataTable('#example', {
          columnDefs: [
               {
                  searchable: false,
                  orderable: false,
                  targets: 0
              }
          ],
          order: [[1, 'asc']]
      });
       
      table
          .on('order.dt search.dt', function () {
              let i = 1;
       
              table
                  .cells(null, 0, { search: 'applied', order: 'applied' })
                  .every(function (cell) {
                      this.data(i++);
                  });
          })
          .draw();
      </script>
   </body>
</html>

<!--penutup file html-->
<?php
}
?>