<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Inventory</title>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="fw-bolder">Data Produk</h3>
            </div>
            <div class="card-body">
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Produk</button>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($produk as $row) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= "PRD" . $row['id_produk']; ?></td>
                                <td><?= $row['nama_produk']; ?></td>
                                <td><?= "Rp. " . $row['harga']; ?></td>
                                <td>
                                    <button class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id_produk']; ?>">edit</button>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delModal<?= $row['id_produk']; ?>">hapus</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="/assets/js/bootstrap.min.js"></script>
</body>


<!-- Modal add produk -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="tambah_produk" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nama_produk" placeholder="Nama produk" required>
                        <label for="floatingInput">Nama Produk</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="keterangan" placeholder="Keterangan" id="floatingTextarea2" style="height: 100px" required></textarea>
                        <label for="floatingTextarea2">Keterangan</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="harga" placeholder="Harga" required>
                        <label for="floatingInput">Harga</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="jumlah" placeholder="Jumlah" required>
                        <label for="floatingInput">Jumlah</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal add produk -->

<?php foreach ($produk as $row) : ?>
    <!-- Modal add produk -->
    <div class="modal fade" id="editModal<?= $row['id_produk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="edit_produk" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="hidden" name="id" value="<?= $row['id_produk']; ?>">
                            <input type="text" class="form-control" name="nama_produk" placeholder="Nama produk" value="<?= $row['nama_produk']; ?>" required>
                            <label for="floatingInput">Nama Produk</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="keterangan" placeholder="Keterangan" id="floatingTextarea2" style="height: 100px" required><?= $row['keterangan']; ?></textarea>
                            <label for="floatingTextarea2">Keterangan</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="harga" placeholder="Harga" value="<?= $row['harga']; ?>" required>
                            <label for="floatingInput">Harga</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="jumlah" placeholder="Jumlah" value="<?= $row['jumlah']; ?>" required>
                            <label for="floatingInput">Jumlah</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal add produk -->

    <!-- Modal delete produk -->
    <div class="modal fade" id="delModal<?= $row['id_produk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/hapus_produk" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data <?= $row['nama_produk']; ?></p>
                        <input type="hidden" value="<?= $row['id_produk']; ?>" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Modal delete produk -->

</html>