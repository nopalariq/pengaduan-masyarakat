<?php 
include('../../assets/header.php');
include('../../config/config.php');
@session_start();
include('../../assets/navbar.php');
if($_SESSION['username']==''){
    @header('location:../../index.php');
}
?>

<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID Tanggapan</th>
      <th scope="col">ID Pengaduan</th>
      <th scope="col">Tgl Tanggapan</th>
      <th scope="col">Tanggapan</th>
      <th scope="col">id petugas</th>
    </tr>
  </thead>
  <tbody>
  <?php 
      $q = mysqli_query($con, "SELECT * FROM tanggapan");
      while ($o = mysqli_fetch_object($q)){
        ?> 
          <tr>
            <td><?= $o -> id_tanggapan ?></td>
            <td><?= $o -> id_pengaduan?></td>
            <td><?= $o -> tgl_tanggapan?></td>
            <td><?= $o -> tanggapan?></td>
            <td><?= $o -> id_petugas?></td>
          </tr>
        <?php
      }
    ?>
  </tbody>
</table>
</body>