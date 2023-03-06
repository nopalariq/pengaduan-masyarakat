<?php 
  include('../../assets/header.php');
  include('../../config/config.php');

  if(isset($_POST['daftar'])){
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telp = $_POST['telp'];

    $q = mysqli_query($con, "INSERT INTO masyarakat (nik, nama, username, password, telp, level, verif) VALUES ('$nik', '$nama', '$username', '$password', '$telp', 'masyarakat', '0' )");
  }
?>
  
  <div class="container mx-auto h-full flex-1 justify-center items-center">
  <div class="card" style="width: 18rem;">
  <body class="text-center">
    <form class="form-signin" method="post" action="">
      
      <h1 class="h3 mb-3 font-weight-normal">Daftar sekarang</h1>
      <label for="nama" class="sr-only">Nama</label>
      <input type="text" id="nama" class="form-control" placeholder="Nama"  name="nama" required autofocus>

      <label for="username" class="sr-only">Username</label>
      <input type="text" id="Username" class="form-control" placeholder="Username." required name="username" autofocus>

      <label for="NIK" class="sr-only">NIK</label>
      <input type="text" id="NIK" class="form-control" placeholder="NIK"  name="nik"required autofocus>

      <label for="telephone" class="sr-only">Telp</label>
      <input type="text" id="telephone" class="form-control" placeholder="Telp" required name="telp" autofocus>

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="Password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
      
      <button class="btn btn-lg btn-success btn-block" type="Daftar" name="daftar">Daftar</button>
    
    </form>
      <p>Login <a href="index.php">Disini</a></p>
    </div>
    </div>
</body>
</html>
