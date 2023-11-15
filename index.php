<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="//code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12">
                <div class="card">
                    <?php
                    include "koneksi.php";
                    $query = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY id ASC");
                    ?>
                    <div class="card-header bg-primary text-white">
                        Data Pelanggan
                    </div>
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <button href="tambah.php" type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                            Tambah Data
                        </button>
                        <form action="" method="post">
                            <table class="table table-striped" id="table-pelanggan">
                                <thead>
                                    <tr>
                                        <th>No ID</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nomor Telp</th>
                                        <th>Asal Kota</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php if (mysqli_num_rows($query) > 0) { ?>
                                    <?php
                                    // $no = 1;
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php echo $data["id"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data["nama"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data["jenis_kelamin"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data["telpon"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data["alamat"]; ?>
                                                </td>
                                                <td>
                                                    <a href="edit.php?id=<?php echo $data["id"] ?>" class="btn btn-warning btn-sm">Ubah</a>
                                                    <a href="proses_hapus.php?id=<?php echo $data["id"] ?>" class="btn btn-danger btn-sm">Hapus</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php } ?>
                                <?php } ?>
                            </table>
                        </form>

                        <!-- Modal Tambah Data-->
                        <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Pelanggan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="proses_tambah.php" method="post">
                                            <div class="mb-3">
                                                <label class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="n" name="nama" placeholder="Masukkan nama anda">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jenis Kelamin</label>
                                                <select id="j" name="jns" class="form-select">
                                                    <option value="" disabled selected hidden>Pilih</option>
                                                    <option value="pria">Pria</option>
                                                    <option value="wanita">Wanita</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">No Telpon</label>
                                                <input type="number" class="form-control" id="t" name="telp" placeholder="Masukkan no telpon anda">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Asal Kota</label>
                                                <input type="text" class="form-control" id="a" name="alamat" placeholder="Masukkan kota anda">
                                            </div>
                                            <!-- <input type="submit" name="Submit" value="simpan" class="btn btn-primary"> -->
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" id="simpanBtn" name="submit" class="btn btn-primary" value="simpan" disabled>Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Tambah Data end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        $('input').on('input', function() {
            var allFilled = true;
            $('input').each(function() {
                if ($(this).val() === '') {
                    allFilled = false;
                    return false;
                }
            });

            if (allFilled == true) {
                $('#simpanBtn').prop('disabled', false);
            } else {
                $('#simpanBtn').prop('disabled', true);
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#table-pelanggan').DataTable();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</html>