<?php
session_start();
if((empty($_SESSION['username'])) and (empty($_SESSION['password']))){

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=h, initial-scale=1.0">
   <title>Sistem Informasi wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<!--css style-->
<style>
   .posisitengah{
      margin: 0 auto;
   
   }
   .borderall{
      box-shadow: 4px 6px 0px black;
      border: 1px solid;
      border-radius: 15px;
   }
   .borderusr{
      box-shadow: 2px 4px 0px grey;
      border: 1px solid;
   }
   .borderpw{
       box-shadow: 2px 4px 0px grey;
       border: 1px solid;
   }
  
   /* style button login */ 
.btn-12,
.btn-12 *,
.btn-12 :after,
.btn-12 :before,
.btn-12:after,
.btn-12:before {
  border: 0 solid;
  box-sizing: border-box;
}

.btn-12 {
  -webkit-tap-highlight-color: transparent;
  -webkit-appearance: button;
  background-color: #000;
  background-image: none;
  color: #fff;
  cursor: pointer;
  font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
    Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif,
    Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
  font-size: 100%;
  font-weight: 900;
  line-height: 1.5;
  display: inline-block;
  -webkit-mask-image: -webkit-radial-gradient(#000, #fff);
  padding: 0;
  text-transform: uppercase;
}

.btn-12:disabled {
  cursor: default;
}

.btn-12:-moz-focusring {
  outline: auto;
}

.btn-12 svg {
  display: block;
  vertical-align: middle;
}

.btn-12 [hidden] {
  display: none;
}

.btn-12 {
  border-radius: 99rem;
  border-width: 2px;
  overflow: hidden;
  padding: 0.8rem 3rem;
  position: relative;
}

.btn-12 span {
  mix-blend-mode: difference;
}

.btn-12:after,
.btn-12:before {
  background: linear-gradient(
    90deg,
    #fff 25%,
    transparent 0,
    transparent 50%,
    #fff 0,
    #fff 75%,
    transparent 0
  );
  content: "";
  inset: 0;
  position: absolute;
  transform: translateY(var(--progress, 100%));
  transition: transform 0.2s ease;
}

.btn-12:after {
  --progress: -100%;
  background: linear-gradient(
    90deg,
    transparent 0,
    transparent 25%,
    #fff 0,
    #fff 50%,
    transparent 0,
    transparent 75%,
    #fff 0
  );
  z-index: -1;
}

.btn-12:hover:after,
.btn-12:hover:before {
  --progress: 0;
}
/* end style login btn*/
</style>

<body>

<!--login page-->
   <div class="container mt-5">
      <div class="col-md-4 posisitengah">
         <img src="image/icon.jpg" alt="icon" width="100" height="100" class="rounded mx-auto d-block ">
         <div class="card mt-3 borderall">
            <!--<div class="card-header bg-primary text-white"> form login </div>-->
            <div class="card-body ">
               <form action="cek_login.php" method="post">
             <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Username</label>
               <input type="text" name="username" class="form-control borderusr" placeholder="Enter Username" required value="<?php echo (isset($_COOKIE["username"])) ?$_COOKIE['username']:'' ?>">
                </div>
                <div class="mb-3 ">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password"class="form-control borderpw" placeholder="Enter Password" required value="<?php echo(isset($_COOKIE["password"])) ?$_COOKIE['password']:'' ?>">
                </div>
                <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember" 
                <?php echo ((isset($_COOKIE["username"])) and (isset($_COOKIE["password"]))) ? "checked":"" ?> >
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
               </div>
            <button type="submit" class="btn btn-primary btn-12"> <span>Login</span></button>
          </form>
        </div>
       </div>
      </div>
    </div>
 </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>

<?php
}else{
  echo "<script>window.history.go(-1)</script>";
}
?>