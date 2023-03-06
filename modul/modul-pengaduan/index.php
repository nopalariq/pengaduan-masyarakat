<?php 
include('../../assets/header.php');
include('../../config/config.php');
@session_start();
if($_SESSION['username']==''){
    @header('location:../../index.php');
}

if(isset($_POST['ngadu'])){
    $tgl = $_POST['tgl'];
    $nik = $_POST['nik'];
    $pengaduan = $_POST['pengaduan'];
    $foto = $_POST['foto'];

    $q = mysqli_query($con, "INSERT INTO pengaduan (tgl_pengaduan, nik, isi_laporan, foto, status) VALUES('$tgl', '$nik', '$pengaduan', '$foto', '0')");
}

if(isset($_POST['tanggap'])){
    $id_petugas = $_POST['id_petugas'];
    $id_pengaduan = $_POST['id_pengaduan'];
    $tgl = $_POST['tgl'];
    $tanggapan = $_POST['tanggapan'];
    $status = $_POST['status'];

    $q = mysqli_query($con, "INSERT INTO tanggapan (id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES ('$id_pengaduan', '$tgl', '$tanggapan', '$id_petugas')");

    $q1 = mysqli_query($con, "update pengaduan set status = '$status' where id_pengaduan = '$id_pengaduan'");
}

include('../../assets/navbar.php');
?>

<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id_pengaduan</th>
      <th scope="col">tgl_pengaduan</th>
      <th scope="col">nik</th>
      <th scope="col">pengaduan</th>
      <th scope="col">foto</th>
      <th scope="col">status</th>
    </tr>
  </thead>
  <tbody>
  <?php 
      $q = mysqli_query($con, "SELECT * FROM pengaduan");
      while ($o = mysqli_fetch_object($q)){
        ?> 
          <tr>
            <td><?= $o -> id_pengaduan ?></td>
            <td><?= $o -> tgl_pengaduan?></td>
            <td><?= $o -> nik?></td>
            <td><?= $o -> isi_laporan?></td>
            <td><?= $o -> foto?></td>
            <td><?= $o -> status ?></td>
          </tr>
        <?php
      }
    ?>
  </tbody>
</table>

<?php 
    if($_SESSION['level'] == 'masyarakat'){
        ?> 
            <div class="card">
                <div class="card-header">
                    <h4>Buat Pengaduan</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                    <div class="mb-3">
                        <label for="tgl" class="form-label">Tanggal Pengaduan</label>
                        <input type="date" class="form-control" id="tgl" name="tgl">
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" readonly class="form-control" id="nik" name="nik" value="<?= $_SESSION['nik'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="pengaduan" class="form-label">Pengaduan</label>
                        <textarea name="pengaduan" class="form-control" id="pengaduan" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <button name="ngadu" class="btn btn-success">Buat</button>
                    </form>
                </div>
            </div>
        <?php
    }else{
        ?> 
            <div class="card">
                <div class="card-header">
                    <h4>Buat Tanggapan</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="id_pengaduan" class="form-label">ID Petugas</label>
                            <input type="text" name="id_petugas" readonly class="form-control" value="<?= $_SESSION['id_petugas'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="id_pengaduan" class="form-label">ID pengaduan</label>
                            <select name="id_pengaduan" class="form-control" aria-label="Default select example">
                                <?php 
                                    $q = mysqli_query($con, "SELECT * FROM pengaduan");
                                    while($o = mysqli_fetch_object($q)){
                                        ?> 
                                            <option value="<?= $o -> id_pengaduan ?>"><?= $o -> id_pengaduan ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tgl" class="form-label">Tanggal Tanggapan</label>
                            <input name="tgl" type="date" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="tanggapan" class="form-label">Tanggapan</label>
                            <textarea name="tanggapan" id="tanggapan" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="proses">proses</option>
                                <option value="selesai">selesai</option>
                            </select>
                        </div>
                        <button class="btn btn-success" name="tanggap">Kirim</button>
                    </form>
                </div>
            </div>
        <?php
    }
?>
</body>