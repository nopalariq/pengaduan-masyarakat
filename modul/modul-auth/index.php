<?php
include('../../assets/header.php') ;
include('../../config/config.php');


  if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pilihan = $_POST['pilihan'];

    if($pilihan == 'masyarakat'){
      $q = mysqli_query($con, "SELECT * FROM masyarakat WHERE username = '$username' AND verif = '1'");
      $r = mysqli_num_rows($q);
      if($r == 1){
        @session_start();
        $o = mysqli_fetch_object($q);
        $_SESSION['nik'] = $o -> nik;
        $_SESSION['nama'] = $o -> nama;
        $_SESSION['username'] = $o -> username;
        $_SESSION['password'] = $o -> password;
        $_SESSION['telp'] = $o -> telp;
        $_SESSION['level'] = $o -> level;
        $_SESSION['verif'] = $o -> verif;
        @header('location:../modul-masyarakat/');
      }
    }else{
      $q = mysqli_query($con, "SELECT * FROM petugas WHERE username = '$username'");
      $r = mysqli_num_rows($q);
      if($r == 1){
        @session_start();
        $o = mysqli_fetch_object($q);
        $_SESSION['id_petugas'] = $o -> id_petugas;
        $_SESSION['nama_petugas'] = $o -> nama_petugas;
        $_SESSION['username'] = $o -> username;
        $_SESSION['password'] = $o -> password;
        $_SESSION['telp'] = $o -> telp;
        $_SESSION['level'] = $o -> level;
        @header('location:../modul-petugas/');
      }
    }
  }

?>
  <body class="text-center">
    <div class="row justify-content-center">
    <div class="card" style="width: 25rem; margin-top: 100px;">
    <form class="form-signin" method="post" action="">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="username" class="sr-only">username</label>
      <input type="text" id="username"  class="form-control mb-3" placeholder="username"   name="username" autofocus>

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control mb-3" placeholder="Password" name="password" >

      <select class="form-control mb-3" name="pilihan" id="pilihan">
        <option value="masyarakat">masyarakat</option>
        <option value="petugas">petugas</option>
      </select>

    <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
    <p>Belum punya akun? Daftar <a href="registrasi.php">disini</a></p>
    </form>
    </div>
    </div>
</body>
</html>
