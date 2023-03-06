<?php 
include('../../assets/header.php');
include('../../config/config.php');
@session_start();

include('../../assets/navbar.php');
if($_SESSION['username']==''){
  @header('location:../../index.php');
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
      <?php 
        if($_SESSION['level']=='admin' || $_SESSION['level']=='petugas'){
          ?><th scope="col">Tindakan</th><?php
        }
      ?>
    </tr>
  </thead>
  <tbody>
    <?php 
      $q = mysqli_query($con, "SELECT * FROM masyarakat WHERE verif = '1'");
      while ($o = mysqli_fetch_object($q)){
        ?> 
          <tr>
            <td><?= $o -> nik ?></td>
            <td><?= $o -> nama?></td>
            <td><?= $o -> username?></td>
            <td><?= $o -> telp?></td>
            <?php
              if($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'petugas'){
                ?> 
                  <td>
                    <form action="" method="post">
                      <input type="hidden" name="nik" value="<?= $o -> nik ?>">
                      <button class="btn btn-danger" name="hapus">HAPUS</button>
                    </form>
                  </td>
                <?php
              }
            ?>
          </tr>
        <?php
      }
    ?>
  </tbody>
</table>
</body>