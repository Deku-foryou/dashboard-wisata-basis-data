<div class="container-fluid">
   <div class=""card>
      <div class="card-header mt-5"><strong>Pengaturan Akun</strong>
      <div class="card-body">
         <form action="" method="POST">
  <div class="form-group mt-2 w-50">
    <label>Username</label>
    <input type="text" class="form-control" name="username" placeholder="Masukkan Username" autocomplete="off" required>
    <small class="form-text text-muted"> <i>We'll never share your email with anyone else.</i></small>
  </div>
  <div class="form-group mt-2 w-50">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" placeholder="Masukkan Password" name="password" required>
  </div>
  <div class="form-group mt-2 w-50">
     <label >Konfirmasi Password</label>
    <input type="password" class="form-control" placeholder="Masukkan Kembali Password" name="konfirmasi_password" required>
  </div>
  <button type="submit" name="submit" class="btn btn-primary mt-3">Update</button>
</form>

<?php
if (isset($_POST['submit'])){
   $username                  = $_POST['username'];
   $password                  = $_POST['password'];
   $konfirmasi_password       = $_POST['konfirmasi_password'];
   $id_user_login             = $_SESSION['idadmin'];

   if ($password == $konfirmasi_password) {

      $password_md5 = md5($password);
    
      mysqli_query($koneksi, "UPDATE tbl_admin SET username='$username', password='$password_md5' WHERE id_admin='$id_user_login'");

      echo "<script>alert('Berhasil Diubah'); window.location = 'dashboard.php?hal=user' </script>";


   }else{
      echo "<script> alert('padssword Tidak Sama!'); window.location ='dashboard.php?hal=user'</script>";
      
   }
}

?>

      </div>
   </div>
   </div>
</div>