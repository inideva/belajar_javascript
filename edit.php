<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <?php
    include "koneksi.php";
    $id = $_GET["id"];
    $data = mysqli_query($conn, "SELECT * FROM pelanggan where id='$_GET[id]'");

    while ($d = mysqli_fetch_array($data)) {
        $id = $d["id"];
        $nama = $d["nama"];
        $jns_klmn = $d["jenis_kelamin"];
        $no_tlp = $d["telpon"];
        $alamat = $d["alamat"];
    }
    ?>
    <div class="container mt-4">
        <div class="card col-sm-6">
            <div class="card-header bg-primary text-white">
                Edit Data
            </div>
            <div class="card-body">
                <form style="" action="proses_edit.php?id=<?php echo $id ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label">No Id</label>
                        <input type="text" class="form-control" name="id" disabled value="<?php echo $id ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $nama ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="jns" value="<?php echo $jns_klmn ?>">
                            <option value="" disabled selected hidden>Pilih</option>
                            <option value="pria">Pria</option>
                            <option value="wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Telpon</label>
                        <input type="number" class="form-control" name="telp" value="<?php echo $no_tlp ?>">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Asal Kota</label>
                        <input type="text" class="form-control" name="alamat" value="<?php echo $alamat ?>">
                    </div>
                    <!-- <input type="submit" name="Submit" value="simpan" class="btn btn-primary"> -->
                    <button type="button" name="tutup" class="btn btn-secondary me-2" onclick="history.back();">Tutup</button>
                    <button type="submit" name="Submit" class="btn btn-primary" value="simpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>