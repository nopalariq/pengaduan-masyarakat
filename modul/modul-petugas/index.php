<?php 
include('../../assets/header.php');
include('../../config/config.php');
@session_start();
include('../../assets/navbar.php');
if($_SESSION['username']==''){
    @header('location:../../index.php');
}

if(isset($_POST['verif'])){
    $nik = $_POST['nik'];
    $q = mysqli_query($con, "UPDATE masyarakat SET verif = '1' WHERE nik = '$nik'");
}

if(isset($_POST['hapus'])){
    $nik = $_POST['nik'];
    $q = mysqli_query($con, "DELETE FROM masyarakat WHERE nik = '$nik'");
}
?>

<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">NIK</th>
      <th scope="col">Nama</th>
      <th scope="col">Username</th>
      <th scope="col">No. Telpon</th>
      <th colspan="2">Tindakan</th>
    </tr>
  </thead>
  <tbody>
  <?php 
      $q = mysqli_query($con, "SELECT * FROM masyarakat WHERE verif = '0'");
      while ($o = mysqli_fetch_object($q)){
        ?> 
          <tr>
            <td><?= $o -> nik ?></td>
            <td><?= $o -> nama?></td>
            <td><?= $o -> username?></td>
            <td><?= $o -> telp?></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" value="<?= $o -> nik ?>" name="nik">
                    <button name="verif" class="btn btn-success">Verifikasi</button>
                </form>
            </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" value="<?= $o -> nik ?>" name="nik">
                    <button name="hapus" class="btn btn-danger">HAPUS</button>
                </form>
            </td>
          </tr>
        <?php
      }
    ?>
  </tbody>
</table>
</body>